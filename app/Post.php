<?php

namespace App;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
