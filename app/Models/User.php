<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'otp',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    public function information(){
        return $this->hasOne(UserMeta::class,'user_id');
    }

   
    public function scopeCustomer($query)
    {
        $ids = UserMeta::select('user_id')->get()->pluck('user_id')->toArray();
        return $query->where('active', 1)->where('role_id',2)->whereNotIn('id',$ids);
    }
    
 

    public function exams(){
        return $this->belongsToMany(Exam::class)->withPivot(['answers','total','wrong_answers','empty_answers','expire_at'])->withTimestamps();
    }

    public function verify($otp){
        //check if otp is valid
        if(!$this->otp_sent_at > now()->addMinutes(-2)) throw new Exception('Otp is expired request new otp');
        //match the otp with user otp
        if($this->otp != $otp) throw new Exception('Otp do not match');
        //if nothing happen then update the phone verrified at
        $this->update([
            'phone_verified_at' => now()
        ]);
     } 

    public function verified():bool
    {
       return $this->phone_verified_at != null ? true : false;
    
    }

    public function ownThisPackage(Package $package){
        
      $information = $this->information()->updateOrCreate(
        [
            'id'=>$this->information->id??null
        ]  
        ,[
            'id'=>now()->format('Y').now()->format('m').now()->format('d').rand(9999,99999),
            'package_id' => $package->id,
            'is_paid'=> $package->paid,
            'infinite_duration'=> $package->infinite_duration,
            'expired_at'=> Carbon::now()->addDays($package->duration)
        ]);
     
    }

    public function ownThisExam(Exam $exam){
       if(DB::table('exam_user')->where('user_id',$this->id)->where('exam_id',$exam->id)->count() || $exam->is_paid == 0  || auth()->user()->information->is_paid ){
           
           
                if(!DB::table('exam_user')->where('user_id',$this->id)->where('exam_id',$exam->id)->count()){
                    $this->exams()->attach($exam);
                }
                return true;
            

        }
        return false;
   
    }
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }
    
     
}
