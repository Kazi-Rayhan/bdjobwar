<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public const LABEL = [
        1 =>"ক",
        2 =>"খ",
        3 =>"গ",
        4 =>"ঘ",
    ];

    public function getLabelAttribute(){
        return $this::LABEL[$this->index];
    }
    protected $guarded = [];
    use HasFactory;
}
