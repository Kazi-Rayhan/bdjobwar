<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public const LABEL = [
        1 =>"A",
        2 =>"B",
        3 =>"C",
        4 =>"D",
    ];

    public function getLabelAttribute(){
        return $this::LABEL[$this->index];
    }
    protected $guarded = [];
    use HasFactory;
}
