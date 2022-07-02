<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Batch extends Model
{
    use HasFactory;

    public $additional_attributes = ['batch_name'];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }
    public function link(){
        return route('batch',[Str::slug($this->title),$this]);
    }

    public function getBatchNameAttribute(){
        return "{$this->course->title} - {$this->title}";
    }

    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }

    public function information()
    {
        return [
            'title' => $this->title,
            'type' => 'Batch',
            'price' => $this->price 
        ];
    }
}
