<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Exam;
use Illuminate\Http\Request;

class BatchDetailsController extends Controller
{
    public function routine($slug, Batch $batch)
    {

        return view('frontEnd.batchDetails.routine', compact('batch'));
    }

    public function runningExam($slug, Batch $batch)
    {

        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('from', '<', now())
            ->where('to', '>', now())->get();

        return view('frontEnd.batchDetails.runningexam', compact('exams','batch'));
    }

    public function upcommingExam($slug, Batch $batch)
    {
        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('from', '>', now())->get();
        return view('frontEnd.batchDetails.upcommingexam', compact('exams','batch'));
    }

    public function archive($slug, Batch $batch)
    {

        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('to', '<', now())->get();
        return view('frontEnd.batchDetails.archive', compact('exams','batch'));
    }

    public function result($slug, Batch $batch)
    {
        $exams = Exam::active()->where('batch_id', $batch->id);

        $exams = $exams->where('to', '<', now())->get();
        return view('frontEnd.batchDetails.result',compact('exams','batch'));
    }

    public function statics($slug, Batch $batch)
    {

        return view('frontEnd.batchDetails.statics');
    }
}
