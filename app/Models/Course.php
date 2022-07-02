<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Course extends Model
{
    use HasFactory;

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function exams(){
        return $this->hasManyThrough(Exam::class,Batch::class);
    }

    public function link(){
        return route('course',[Str::slug($this->title),$this]);
    }
}
