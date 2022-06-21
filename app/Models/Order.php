<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const STATUS = ['DECLINED' => '0','ACCEPTED' => '1','PENDING' => '2'];
    public const METHOD = ['BKASH' => '0','ROCKET'=>'1','NAGAD'=>'2'];
    public function orderable()
    {
        return $this->morphTo();
    }
    // public function types()
    // {
    //     return $this->hasMany(Order::class, 'orderable_id');
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
