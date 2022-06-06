<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const STATUS = ['DECLINED' => 0,'ACCEPTED' => 1,'PENDING' => 2];
    public const METHOD = ['BKASH' => 0];
    public function orderable()
    {
        return $this->morphTo();
    }
}
