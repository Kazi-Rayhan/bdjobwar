<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rakibhstu\Banglanumber\NumberToBangla;

class Exam extends Model
{
    use HasFactory;

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
    ];




    public function priceFormat()
    {

        if (@$this->batch->price > 0) {
            return 'পেইড';
        } else {
            return   'ফ্রি';
        }
    }

    public function getParticipantsAttribute()
    {
        return (new NumberToBangla)->bnNum($this->users()->wherePivotNotNull('total')->count());
    }


    public function getFullMarkAttribute()
    {
        return  $this->point * $this->questions()->active()->count();
    }

    public function getPassMarkAttribute()
    {
        return  $this->minimum_to_pass;
    }



    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }


    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }





    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot([
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
        ])->withTimestamps();
    }

    public function getRanking(User $user)
    {
        $collection = collect($this->users()->orderBy('pivot_total', 'DESC')->orderBy('pivot_created_at', 'DESC')->get());

        $data       = $collection->where('id', $user->id);

        $value      = $data->keys()->first() + 1;
        return $value;
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopePaid($query)
    {
        return $query->whereHas('batch', function ($q) {
            $q->where('price', '>', 0);
        });
    }

    public function scopeFree($query)
    {
        return $query->whereHas('batch', function ($q) {
            $q->where('price', '<=', 0);
        });
    }

    public function userChoice(User $user, $index, $isPractice = false)
    {

        if (request()->practice || $isPractice) {
            return json_decode($this->users()->find($user->id)->pivot->practice_answers, true)[$index] ?? '';
        }
        return json_decode($this->users()->find($user->id)->pivot->answers, true)[$index] ?? '';
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function scopeActiveBatch($query)
    {
        return $query->whereHas('batch', function ($query) {
            $query->where('active', 1);
        });
    }

    public function course()
    {
        return $this->hasOneThrough(Course::class, Batch::class, 'id', 'id', 'batch_id', 'course_id');
    }

    public function scopeFilter($query)
    {
        return $query->when(request()->filled('batch'), fn($query) => $query->where('batch_id', request()->batch))->when(request()->filled('course'), function ($query) {
            return $query->whereHas('course', fn($q) => $q->where('id', request()->course));
        });
    }
}
