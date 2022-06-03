<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Notice extends Model
{
    use HasFactory;
    
    public function getFileLinkAttribute()
    {
        return Voyager::image(json_decode( $this->attributes['file'])[0]->download_link);
        

    }
    public function getFileNameAttribute()
    {
        return json_decode( $this->attributes['file'])[0]->original_name;

    }
}
