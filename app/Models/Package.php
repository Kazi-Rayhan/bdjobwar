<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function information(){
        return [
            'title'=> $this->title,
            'type'=> 'প্যাকেজ',
            'price'=> $this->price
        ];
    }

    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
    
}
