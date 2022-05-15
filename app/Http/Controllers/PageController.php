<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Exam;

class PageController extends Controller
{
    public function home()
    {
        $categories=Category::whereNull('parent_id')->latest()->get();
        $exams=Exam::latest()->get();
        return view('frontEnd/home',compact('categories','exams'));
    }
    public function question(Exam $exam)
    {
        $exams=Exam::whereNotIn('id',[$exam->id])->get();
        
        return view('frontEnd/questions',compact('exam','exams'));
    }
}
