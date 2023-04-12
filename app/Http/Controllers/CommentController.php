<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request)
    {

        $request->validate([
            'post_id' => ['required'],
            'comment' => ['required'],


        ]);

        Comment::create([
            "post_id" => $request->post_id,
            "comment" => $request->comment,
            "user_id" => auth()->id()
        ]);
        return back()->with('success', 'Thanks for your comment');
    }
}
