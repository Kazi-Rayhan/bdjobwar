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

    public $additional_attributes = ['batch_name'];
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

    public function getBatchNameAttribute()
    {
        return "{$this->name} - {$this->phone}";
    }

    public function information()
    {
        return $this->hasOne(UserMeta::class, 'user_id');
    }


    public function scopeCustomer($query)
    {
        $ids = UserMeta::select('user_id')->get()->pluck('user_id')->toArray();

        return $query->where('active', 1)->where('role_id', 2)->whereNotIn('id', $ids);
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }


    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withPivot(
            [
                'answers',
                'total',
                'wrong_answers',
                'empty_answers',
                'expire_at',
                'answers',
                'practice_total',
                'practice_answers',
                'practice_wrong_answers',
                'practice_empty_answers',
                'practice_expire_at'
            ]
        )->withTimestamps();
    }

    public function verify($otp)
    {
        //check if otp is valid
        if (!$this->otp_sent_at > now()->addMinutes(-2)) throw new Exception('Otp is expired request new otp');
        //match the otp with user otp
        if ($this->otp != $otp) throw new Exception('Otp do not match');
        //if nothing happen then update the phone verrified at
        $this->update([
            'phone_verified_at' => now()
        ]);
    }


    public function verified(): bool
    {
        return $this->phone_verified_at != null ? true : false;
    }

    public function ownThisPackage(Package $package)
    {

        $information = $this->information()->updateOrCreate(
            [
                'id' => $this->information->id ?? null
            ],
            [
                'id' =>  rand(999999, 99999),
                'package_id' => $package->id,
                'is_paid' => $package->paid,
                'infinite_duration' => $package->infinite_duration,
                'expired_at' => Carbon::now()->addDays($package->duration)
            ]
        );
    }

    public function ownThisExam(Exam $exam)
    {
        if (DB::table('exam_user')->where('user_id', $this->id)->where('exam_id', $exam->id)->count() || auth()->user()->information->is_paid) {


            if (!DB::table('exam_user')->where('user_id', $this->id)->where('exam_id', $exam->id)->count()) {
                $this->exams()->attach($exam);
            }
            return true;
        }
        return false;
    }

    public function attachExam($exam)
    {
        return  $this->exams()->attach($exam->id);
    }

    protected function own(Exam $exam)
    {
        //if user already own this exam
        if ($this->exams->contains($exam->id)) {

            return true;
        }
        //If user is paid user can particapate 
        if (@$this->information->is_paid) {
            $this->attachExam($exam);
            return true;
        }
        //if batch is free then user own the exam
        if ($exam->batch->price <= 0) {
            $this->attachExam($exam);
            return true;
        }
        //if user own the exam batch
        if ($this->batches->contains($exam->batch->id)) {
            $this->attachExam($exam);
            return true;
        }

        return false;
    }

    public function participateToThisExam(Exam $exam)
    {
        if (!$this->own($exam)) return false;
        return true;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    public function bought(int $batchId): bool
    {
        if ($this->batches->contains($batchId) || @$this->information->is_paid) {
            return true;
        }
        return false;
    }

    public function favourites(){
        return $this->belongsToMany(Question::class,'question_user');     
    }

    public function isFavourite(Question $question){
        return $this->favourites()->find($question->id);
    }
}
