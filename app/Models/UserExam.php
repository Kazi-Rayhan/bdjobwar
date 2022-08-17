<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    use HasFactory;
    protected $table = 'exam_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->whereExists(
                fn ($query) =>
                $query->from('users')
                    ->whereColumn('users.id', 'exam_user.user_id')
                    ->where('users.name', $search)
            )

        );
        $query->when(
            $filters['roll'] ?? false,
            fn ($query, $roll) =>
            $query->whereExists(
                fn ($query) =>
                $query->from('user_metas')
                    ->whereColumn('user_metas.user_id', 'exam_user.user_id')
                    ->where('user_metas.id', $roll)
            )
        );
    }

    public function timeLeft()
    {
       return Carbon::parse($this->expire_at)->diffInSeconds(now());
    }
 
}
