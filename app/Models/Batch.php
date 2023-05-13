<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Batch extends Model
{
    use HasFactory;

    public $additional_attributes = ['batch_name'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function files()
    {
        return json_decode($this->materials);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function link()
    {
        return route('batch', [Str::slug($this->title), $this]);
    }

    public function getBatchNameAttribute()
    {
        return "{$this->course->title} - {$this->title}";
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }


    public function information()
    {
        return [
            'title' => $this->title,
            'type' => 'কোর্স',
            'price' => $this->price
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', 1);
        });
    }
    public function scopeRemoveScope($query)
    {
        return  $query->withoutGlobalScope('active');
    }
}
