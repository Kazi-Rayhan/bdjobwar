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
use App\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class PageController extends Controller
{
    public function home()
    {
        $videos = Video::orderBy('order','asc')->get();
        $sliderExams = Exam::whereNotNull('image')
            ->active()
            // ->where('to', '>', now())
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
    
        // dd($yesterday);
        $latestResults = Exam::free()
            ->active()
            ->where('to', '<=', now())
            ->latest()
            ->limit(3)
            ->get();
            // dd($latestResults);
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
            ->where('from', '>=', now())
            ->orderBy('from','asc')
            ->limit(10)
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
                'courses',
                'latestResults',
                'videos'
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
       $batches =  Batch::active()->where('course_id',$course->id)->get();
       return view('frontEnd/course',compact('course','batches'));
    }

    public function batch($slug,Batch $batch,Request $request){
        
        $exams = Exam::active()->where('batch_id',$batch->id);

        if($request->filter == 'upcoming'){
            $exams = $exams->where('from', '>', now());
            // $exam;
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

     public function batchRoutine(Batch $batch){
        $exams = $batch->exams()->latest()->get();
        $pdf = Mpdf::loadView('frontEnd.routines', ['exams' => $exams],[
            'title' => $batch->title.' Routine',
            'Author' => 'BD Job War'
          ]);
        return $pdf->download('routines.pdf');
     }

    //  public function batchResults(Batch $batch){
    //     dd(UserExam::where('exam_id',$batch->exams->pluck('id')->toArray())->get()->groupBy(function($data){
    //         return $data->user_id;
    //     }))->map(function($data){
    //         return $data->id;
    //     });
    //     // $exam = Exam::where('uuid',$uuid)->first();
    //     // if($exam->to > now()){
    //     //   return view('frontEnd.exam.not_published',compact('exam'));
    //     // }
    //     // $results = UserExam::filter(request(['search','roll']))->where('exam_id',$exam->id)->whereNotNull('answers')->orderBy('total','desc')->get();
     
    // }

    public function packageDetails($slug,Package $package){
        return view('frontEnd.packageDetails',compact('package'));
    }

    public function batchDetails(Batch $batch){
        return view('frontEnd.batch-details',compact('batch'));
    }
}
