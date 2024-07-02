<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsBanFromBatch');
    }
    public function routine($slug, Batch $batch)
    {
        $exams = Exam::active()->where('batch_id', $batch->id)->orderBy('from', 'asc')->get();

        return view('frontend.batchDetails.routine', compact('batch', 'exams','slug'));
    }

    public function runningExam($slug, Batch $batch)
    {

        $exams = Exam::active()->where('batch_id', $batch->id);

            $exams = $exams->where('from', '<', now())
                ->where('to', '>', now())->paginate(20);

        return view('frontend.batchDetails.runningexam', compact('exams', 'batch','slug'));
    }

    public function upcommingExam($slug, Batch $batch)
    {
        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('from', '>', now())->orderBy('from', 'asc')->get();
        return view('frontend.batchDetails.upcommingexam', compact('exams', 'batch','slug'));
    }

    public function archive($slug, Batch $batch)
    {

        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('to', '<', now())->paginate(10);
        return view('frontend.batchDetails.archive', compact('exams', 'batch','slug'));
    }

    public function result($slug, Batch $batch)
    {
        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('to', '<', now())->paginate(10);
        return view('frontend.batchDetails.result', compact('exams', 'batch','slug'));
    }

    public function statics($slug, Batch $batch)
    {
        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('to', '<', now())->paginate(10);
        return view('frontend.batchDetails.statics',compact('exams','batch','slug'));
    }

    public function missedExam($slug, Batch $batch)
    {
        $completed = User::find(auth()->id())->exams()->active()->where('batch_id', $batch->id)->where('to', '<', now())->wherePivotNotNull('total')->get()->pluck('id');
        $exams = Exam::active()->where('batch_id', $batch->id)->where('to', '<', now())->whereNotIn('id',$completed)->paginate(10);
        return view('frontend.batchDetails.missed', compact('exams', 'batch','slug'));
    }
    public function materials($slug, Batch $batch)
    {
        return view('frontend.batchDetails.materials', compact('batch','slug'));
    }
}
