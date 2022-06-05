<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public const STATUS = ['DECLINED','ACCEPTED','PENDING'];
    public const METHOD = ['BKASH'];
    public function orderable()
    {
        return $this->morphTo();
    }
}
