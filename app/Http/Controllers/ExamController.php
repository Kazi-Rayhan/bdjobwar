<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\UserExam;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use MPDF;

class ExamController extends Controller
{
    public function answerSheet($uuid){
        $exam = Exam::where('uuid',$uuid)->with('questions')->first();
        
        if(!Auth::user()->exams()->find($exam->id)->pivot->answers){
            return \redirect()->route('start-exam',$exam->uuid);
        }
        
        return view('frontEnd.exam.answer_sheet',compact('exam'));
    }

    public function read($uuid){
    
        $exam = Exam::where('uuid',$uuid)->with('questions')->first();
    
        return view('frontEnd.exam.read',compact('exam'));
    }

    public function exam_start($uuid){
        $exam = Exam::where('uuid',$uuid)->first();
        return view('frontEnd.exam_start',compact('exam'));
    }
    
    public function exam_result($uuid){
        $exam = Exam::where('uuid',$uuid)->first();
        $count = UserExam::where('exam_id',$exam->id)->whereNotNull('total')->orderBy('total','desc')->count();
        $result = Auth::user()->exams()->find($exam->id);
        return view('frontEnd.result',compact('result','count'));
    }

    public function exam_all_results($uuid){
        // dd(UserExam::filter(request(['search'])));
        
        $exam = Exam::where('uuid',$uuid)->first();
        
        if($exam->to > now()){
          return view('frontEnd.exam.not_published',compact('exam'));
        
        }
      
        $results = UserExam::filter(request(['search','roll']))->where('exam_id',$exam->id)->whereNotNull('total')->orderByRaw('total DESC')->orderByRaw('created_at DESC')->paginate(50);
        
        if(UserExam::where('exam_id',$exam->id)->whereNotNull('total')->count()){
            return view('frontEnd.exam.results',compact('exam','results'));
        }else{
            return redirect()->back()->with('error',"You didn't attend this exam");
        }
        
    }

    public function start($uuid){
        
        $exam = Exam::where('uuid',$uuid)->first();
        auth()->user()->exams()->updateExistingPivot($exam->id,['expire_at'=>now()->addMinutes($exam->duration)]);
        return redirect()->route('question',$uuid);
    }
    public function exam($uuid)
    {
        $exam = Exam::where('uuid',$uuid)->first();
        
        $questions= $exam->questions()->active()->inRandomOrder()->get();
        return view('frontEnd.questions',compact('exam','questions'));
    }
    public function store($uuid, Request $request)
    {

        $exam = Exam::where('uuid', $uuid)->first();
        
        
        $correct_answers = [];
        $student_answers = $request->choice;
        foreach($exam->questions as $question){
            $correct_answers[$question->id] = $question->answer;  
        }
        if($student_answers){
            $emptyAnswers = count(array_diff_key($correct_answers,$student_answers)) ;
            $wrongAnswers = count(array_diff_assoc($correct_answers,$student_answers)) - $emptyAnswers ;
            $correctAnswers = count($student_answers) - $wrongAnswers ;
        }else{
            $emptyAnswers = count($correct_answers) ;
            $wrongAnswers = 0 ;
            $correctAnswers = 0;
            
        }
      $total_point = $correctAnswers - ($wrongAnswers*$exam->minius_mark) ;
      $exam = auth()->user()->exams()->updateExistingPivot($exam->id,['answers'=>json_encode($student_answers),'total'=>$total_point,'wrong_answers'=>$wrongAnswers,'empty_answers'=>$emptyAnswers]);
        return redirect()->route('result-exam',$uuid);
    
    }
    public function exam_all_results_pdf($uuid)
    {
        $exam = Exam::where('uuid',$uuid)->first();
        $results = UserExam::where('exam_id',$exam->id)->whereNotNull('answers')->orderBy('total','desc')->orderBy('created_at','DESC')->get();
        $pdf = MPDF::loadView('frontEnd.exam.pdf_results', ['results' => $results,'exam'=>$exam]);

        return $pdf->download('results.pdf');
    }
    public function answerSheetPdf($uuid)
    {
        $exam = Exam::where('uuid',$uuid)->first();

        $questions= $exam->questions()->active()->get();
        $pdf = MPDF::loadView('frontEnd.exam.answer_sheet_pdf', ['questions'=>$questions,'exam'=>$exam], [
            'title' => $exam->title.' Answer Sheet',
            'Author' => 'BD Job War'
          ]);
   
        return $pdf->download('answer_sheet.pdf');
 
      }
    public function answerSheetPdfWithOutMarking($uuid)
    {
        $exam = Exam::where('uuid',$uuid)->first();

        $questions= $exam->questions()->active()->get();
        $pdf = MPDF::loadView('frontEnd.exam.answer_sheet_without_marking', ['questions'=>$questions,'exam'=>$exam], [
            'title' => $exam->title.' Answer Sheet',
            'Author' => 'BD Job War'
          ]);
   
        return $pdf->download('questions.pdf');
 
      }
}
