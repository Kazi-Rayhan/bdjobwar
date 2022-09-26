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
use App\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class PageController extends Controller
{
    public function home()
    {
        $videos = Video::orderBy('order', 'asc')->get();
        $sliderExams = Slider::latest()->get();

        $finishedExams = Exam::free()
            ->active()
            ->with('users')
            ->where('to', '<', now())
            ->orderBy('from', 'desc')
            ->latest()
            ->limit(3)
            ->get();
        $finishedPaidExams = Exam::paid()
            ->with('users')
            ->where('to', '<', now())
            ->orderBy('from', 'desc')
            ->latest()
            ->limit(3)
            ->get();

        $liveExams = Exam::free()
            ->with('users')
            ->active()
            ->where('from', '<', now())
            ->where('to', '>', now())
            ->orderBy('from', 'asc')
            ->latest()
            ->limit(3)
            ->get();
        $latestResults = Exam::active()
            ->with('users')
            ->whereBetween('to', [now()->subDays(3), now()])
            ->latest()
            ->get();

        $livePaidExams = Exam::paid()
            ->with('users')
            ->where('from', '<', now())
            ->where('to', '>', now())
            ->orderBy('from', 'asc')
            ->latest()
            ->limit(5)
            ->get();

        $courses = Course::with('batches')->where('job_solutions', 0)->latest()->get();
        $upcomingExams = Exam::active()

            ->where('from', '>=', now())
            ->orderBy('from', 'asc')
            ->limit(5)
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
        dd($exam);
        $questions = $exam->questions;

        return view('frontEnd/questions', compact('exam', 'exams', 'questions'));
    }

    public function course($slug, Course $course)
    {
        $batches =  Batch::active()->where('course_id', $course->id)->get();
        return view('frontEnd/course', compact('course', 'batches'));
    }

    public function batch($slug, Batch $batch, Request $request)
    {

        $exams = Exam::active()->where('batch_id', $batch->id);

        if ($request->filter == 'upcoming') {
            $exams = $exams->where('from', '>', now());
            // $exam;
        } elseif ($request->filter == 'archived') {
            $exams = $exams->where('to', '<', now());
        } else {
            $exams = $exams->where('from', '<', now())
                ->where('to', '>', now());
        }

        $exams = $exams->get();
        return view('frontEnd/batch', compact('batch', 'exams'));
    }

    public function batchRoutine(Batch $batch)
    {
        $exams = $batch->exams()->latest()->get();
        $pdf = Mpdf::loadView('frontEnd.routines', ['exams' => $exams], [
            'title' => $batch->title . ' Routine',
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

    public function packageDetails($slug, Package $package)
    {
        return view('frontEnd.packageDetails', compact('package'));
    }

    public function batchDetails(Batch $batch)
    {
        return view('frontEnd.batch-details', compact('batch'));
    }
    public function jobSolutionsBatchDetails(Batch $batch)
    {
        if(request()->has('year')){
            $exams = Exam::active()->where('batch_id',$batch->id)->where('isJobSolution', 1)->where('year',request()->year)->paginate(20);
        }
        elseif(request()->has('search')){
            $exams = Exam::active()->where('batch_id',$batch->id)->where('isJobSolution', 1)->where('title','like','%'.request()->search.'%')->paginate(20);
        }
        else{
            $exams = Exam::active()->where('batch_id',$batch->id)->where('isJobSolution', 1)->paginate(20);
        }
        return view('frontEnd.job-solutions-batch-details', compact('batch', 'exams'));
    }

    public function jobsolutions()
    {

        if (!auth()->user()) return redirect()->route('login');
        // if (!auth()->user()->information->is_paid) return redirect(route('home_page') . '#package')->with('error', 'জব সলিউশন দেখার জন্য প্যাকেজ সাবস্ক্রাইব করুন');
        if (!auth()->user()) return redirect()->route('login');
        
        $course = Course::with('batches')->where('job_solutions', 1)->first();
        if (!$course) return back() ;
        $batches = $course->batches;
       
        return view('frontEnd.jobsolutions', compact( 'course', 'batches'));
    }
}
