<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Exam;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function home()
    {
        $categories=Category::whereNull('parent_id')->latest()->get();
      
        $now = Carbon::now()->toDateString();
        $liveExams=Exam::latest()->whereDate('from', $now)->orWhereDate('to',$now)->get();
        $upcommingTests=Exam::latest()->where('from', '>', $now)->where('to','>',$now)->get();
        // dd($upcommingTests);
        // $liveExams=Exam::latest()->get();
        return view('frontEnd/home',compact('categories','liveExams','upcommingTests'));
    }
    public function question(Exam $exam)
    {
        $exams=Exam::whereNotIn('id',[$exam->id])->get();
        
        return view('frontEnd/questions',compact('exam','exams'));
    }
}
