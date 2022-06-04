<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
    
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
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
}
