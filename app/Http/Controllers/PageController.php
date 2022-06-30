<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Package;
use App\Models\Exam;
use App\Models\Notice;
use App\Models\UserExam;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::whereNull('parent_id')->latest()->get();

        $sliderExams = Exam::whereNotNull('image')->latest()->limit(5)->get();

        $finishedExams = Exam::active()->where('to', '<', now())->latest()->limit(5)->get();
        $finishedPaidExams = Exam::where('to', '<', now())->where('is_paid',1)->latest()->limit(5)->get();
        $liveExams = Exam::active()->where('from', '<', now())->where('to', '>', now())->latest()->limit(5)->get();
        $livePaidExams = Exam::where('from', '<', now())->where('to', '>', now())->where('is_paid',1)->latest()->limit(5)->get();
        // dd($finishedPaidExams);

    

        $liveExaminees = DB::table('exam_user')->whereBetween('updated_at', [now()->addMinutes(-120), now()->addMinutes(120)])->latest()->limit(5)->get();
        $upcomingExams = Exam::active()->where('from', '>', now())->limit(5)->latest()->get();
        $topStudents = UserExam::whereNotNull('total')->whereBetween('created_at',[now()->subWeeks(1),now()])->select('user_id', DB::raw('SUM(total) as total'))
            ->groupBy('user_id')
            ->orderBy('total','desc')
            ->limit(5)
            ->get();
        


        $packages = Package::all();
        $notices = Notice::latest()->get();

        return view('frontEnd/home', compact('sliderExams','finishedExams','categories', 'liveExams','upcomingExams', 'liveExaminees','topStudents', 'packages', 'notices','livePaidExams','finishedPaidExams'));
    }
    public function question($uuid)
    {

        $exam = Exam::active()->where('uuid', $uuid)->first();
        $exams = Exam::active()->whereNotIn('id', [$exam->id])->get();
        $questions = $exam->questions;

        return view('frontEnd/questions', compact('exam', 'exams', 'questions'));
    }
    public function exams(Request $request)
    {
        $categories = Category::all();
        // dd($categories->exams);
        $exams = Exam::active()->latest()->paginate(10);


        return view('frontEnd/exams', compact('categories', 'exams'));
    }
    public function categoryExam(Category $cat)
    {
        $categories = Category::all();

        return view('frontEnd/category_exam', compact('cat', 'categories'));
    }

    public function packageDetails($slug,Package $package){
        return view('frontEnd/packageDetails',compact('package'));
    }
}
