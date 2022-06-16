<?php

namespace App\Models;
use App\Models\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
    ];

    public function information(){
        return [
            'title'=> $this->title,
            'type'=> 'Exam',
            'price'=> $this->price.' BDT'
        ];
    }

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
    function scopeFilter($query, array $filter)
    {
        $query->when($filter['categories'] ?? false, function ($query, $category) {
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.slug', $category);
            });
        });
    }

    
    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot(['answers','total','wrong_answers','empty_answers','expire_at'])->withTimestamps();
    }

    public function getRanking(User $user){
        $collection = collect($this->users()->orderBy('pivot_total', 'DESC')->get());
        $data       = $collection->where('user_id', $user->id);
        $value      = $data->keys()->first() + 1;
        return $value;
     }
    
    

}
