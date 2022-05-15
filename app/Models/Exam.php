<?php

namespace App\Models;
use App\Models\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->morphToMany(Subject::class,'subjectable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class,'categoriable');
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

}
