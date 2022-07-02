<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
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

        $sliderExams = Exam::whereNotNull('image')
            ->active()
            ->where('to', '>', now())
            ->latest()
            ->limit(3)
            ->get();

        $finishedExams = Exam::free()
            ->active()
            ->where('to', '<', now())
            ->latest()
            ->limit(3)
            ->get();
        $finishedPaidExams = Exam::paid()
            ->where('to', '<', now())
            ->latest()
            ->limit(3)
            ->get();
        $liveExams = Exam::free()
            ->active()
            ->where('from', '<', now())
            ->where('to', '>', now())
            ->latest()
            ->limit(3)
            ->get();
        $livePaidExams = Exam::paid()
            ->where('from', '<', now())
            ->where('to', '>', now())
            ->latest()
            ->limit(3)
            ->get();

        $courses = Course::latest()->get();
        $liveExaminees = DB::table('exam_user')
            ->whereBetween(
                'updated_at',
                [
                    now()->addMinutes(-120),
                    now()->addMinutes(120)
                ]
            )
            ->latest()
            ->limit(5)
            ->get();
        $upcomingExams = Exam::active()
            ->where('from', '>', now())
            ->limit(5)
            ->latest()
            ->get();

       


        $packages = Package::all();

        $notices = Notice::latest()->limit(5)->get();

        return view(
            'frontEnd/home',
            compact(
                'sliderExams',
                'finishedExams',
                'liveExams',
                'upcomingExams',
                'liveExaminees',
                'packages',
                'notices',
                'livePaidExams',
                'finishedPaidExams',
                'courses'
            )
        );
    }
    public function question($uuid)
    {

        $exam = Exam::active()->where('uuid', $uuid)->first();
        $exams = Exam::active()->whereNotIn('id', [$exam->id])->get();
        $questions = $exam->questions;

        return view('frontEnd/questions', compact('exam', 'exams', 'questions'));
    }

    public function course($slug,Course $course){
       $course->load('batches');
       return view('frontEnd/course',compact('course'));
    }

    public function batch($slug,Batch $batch,Request $request){
        
        $exams = Exam::active()->where('batch_id',$batch->id);

        if($request->filter == 'upcoming'){
            $exams = $exams->where('from', '>', now());
        }
        elseif($request->filter == 'archived'){
            $exams = $exams->where('to', '<', now());

        }
        else{
            $exams = $exams->where('from', '<', now())
            ->where('to', '>', now());
        }
        
        $exams = $exams->get();
        return view('frontEnd/batch',compact('batch','exams'));
     }
}
