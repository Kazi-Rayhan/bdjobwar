<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }

    public function exam(){
        return $this->exams()->find(auth()->id());
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    
    public function choices()
    {
        return $this->hasMany(Choice::class,'question_id');
    }
}
