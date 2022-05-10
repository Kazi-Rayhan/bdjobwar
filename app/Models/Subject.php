<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->morphedByMany(Exam::class, 'subjectalbe');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'subjectable');
    }
  
}
