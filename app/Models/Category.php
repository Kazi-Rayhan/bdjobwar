<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    
    public function exams()
    {
        return $this->morphedByMany(Exam::class, 'categoriable');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'categoriable');
    }
}
