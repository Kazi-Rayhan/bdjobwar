<?php

namespace App\Models;

use App\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function exam()
    {
        return $this->exams()->find(auth()->id());
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class, 'question_id');
    }

    public function scopeFilter($query)
    {
        return $query->when(request()->filled('category'), fn($query) => $query->where('category_id', request()->category));
    }
}
