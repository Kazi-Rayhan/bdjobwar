<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Package;
use App\Models\Exam;
use App\Models\Notice;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function home()
    {
        $categories=Category::whereNull('parent_id')->latest()->get();
      
        $now = Carbon::now()->toDateString();
        $liveExams=Exam::latest()->whereDate('from', $now)->orWhereDate('to',$now)->paginate(5);
        $upcommingTests=Exam::latest()->where('from', '>', $now)->where('to','>',$now)->paginate(5);
        $packages=Package::all();
        $notices=Notice::latest()->get();
        // dd($upcommingTests);
        // $liveExams=Exam::latest()->get();
        return view('frontEnd/home',compact('categories','liveExams','upcommingTests','packages','notices'));
    }
    public function question(Exam $exam)
    {
        $exams=Exam::whereNotIn('id',[$exam->id])->get();
        $questions=$exam->questions()->paginate(10);
        
        return view('frontEnd/questions',compact('exam','exams','questions'));
    }
    public function exams(Request $request)
    {
        $categories=Category::all();
        // dd($categories->exams);
        $exams = Exam::latest()->paginate(10);
      
 
        return view('frontEnd/exams',compact('categories','exams'));
    }
    public function categoryExam(Category $cat)
    {
        $categories=Category::all();
        // return $category->exams;
        return view('frontEnd/category_exam',compact('cat','categories'));
    }
}
