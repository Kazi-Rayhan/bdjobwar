<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Exam;
use App\Models\Question;
use App\Models\UserExam;
use App\Services\Revaluation;
use Carbon\Carbon;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use MPDF;

class ExamController extends Controller
{
    public function answerSheet($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->with('questions')->first();

        if (!Auth::user()->exams()->find($exam->id)->pivot->answers) {
            return \redirect()->route('start-exam', $exam->uuid);
        }

        return view('frontEnd.exam.answer_sheet', compact('exam'));
    }

    public function practiceAnswerSheet($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->with('questions')->first();

        if (!Auth::user()->exams()->find($exam->id)->pivot->practice_answers) {
            return \redirect()->route('start-exam', $exam->uuid);
        }

        return view('frontEnd.exam.answer_sheet', compact('exam'));
    }

    public function read($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");

        $exam = Exam::where('uuid', $uuid)->with('questions')->first();

        return view('frontEnd.exam.read', compact('exam'));
    }

    public function exam_start($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->first();
        
        if (auth()->check() && @is_numeric(Auth::user()->exams()->find($exam->id)->pivot->total)) {

            return redirect()->route('result-exam', $exam->uuid);
        }

        return view('frontEnd.exam_start', compact('exam'));
    }

    public function exam_result($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->first();
        $count = UserExam::where('exam_id', $exam->id)->whereNotNull('total')->orderBy('total', 'desc')->count();
        $result = Auth::user()->exams()->find($exam->id);
        return view('frontEnd.result', compact('result', 'count'));
    }

    public function exam_all_results($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        // dd(UserExam::filter(request(['search'])));

        $exam = Exam::where('uuid', $uuid)->first();

        if ($exam->to > now()) {
            return view('frontEnd.exam.not_published', compact('exam'));
        }

        $results = UserExam::filter(request(['search', 'roll']))->where('exam_id', $exam->id)->whereNotNull('total')->orderByRaw('total DESC')->orderByRaw('created_at DESC')->paginate(50);

        if (UserExam::where('exam_id', $exam->id)->whereNotNull('total')->count()) {
            return view('frontEnd.exam.results', compact('exam', 'results'));
        } else {
            return redirect()->back()->with('error', "You didn't attend this exam");
        }
    }

    public function start($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $retry = false;
        $exam = Exam::where('uuid', $uuid)->first();
        if (request()->practice) {
            
            auth()->user()->exams()->updateExistingPivot($exam->id, ['practice_expire_at' => now()->addMinutes($exam->duration)]);
        } else {

            if (!auth()->user()->exams()->find($exam->id)->pivot->expire_at || Carbon::parse(auth()->user()->exams()->find($exam->id)->pivot->expire_at)->addMinutes(10)->toDateTime() < now()) {

                if (Carbon::parse(auth()->user()->exams()->find($exam->id)->pivot->expire_at)->addMinutes(10)->toDateTime() < now()) {

                    $retry = true;
                }
                auth()->user()->exams()->updateExistingPivot($exam->id, ['expire_at' => now()->addMinutes($exam->duration)]);
            }
        }

        if ($retry) {

            return redirect()->route('question', [$uuid, 'practice' => request()->practice, 'retry' => 1]);
        } else {

            return redirect()->route('question', [$uuid, 'practice' => request()->practice]);
        }
    }
    public function exam($uuid)
    {

        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->first();
        $extraTime = UserExam::where('user_id', auth()->id())->where('exam_id', $exam->id)->first()->lastTenMin();
        $timeLeft = UserExam::where('user_id', auth()->id())->where('exam_id', $exam->id)->first()->timeLeft();
        if (request()->practice) {

            if (!$exam->isJobSolution && !UserExam::where('user_id', auth()->id())->where('exam_id', $exam->id)->first()->answers) {
                
                return redirect()->route('start-exam', $exam->uuid)->with('success','প্রাকটিস পরীক্ষা দিতে আপনাকে মূল পরীক্ষায় অংশগ্রহণ করতে হবে।');
            };
        }

        $questions = $exam->questions()->active()->inRandomOrder()->get();


        return view('frontEnd.questions', compact('exam', 'questions', 'timeLeft', 'extraTime'));
    }
    public function store($uuid, Request $request)
    {
        $uuid =  trim($uuid, "\u{2069}");

        $exam = Exam::where('uuid', $uuid)->first();


        $correct_answers = [];
        $student_answers = $request->choice;
        foreach ($exam->questions as $question) {
            $correct_answers[$question->id] = $question->answer;
        }
        if ($student_answers) {
            $emptyAnswers = count(array_diff_key($correct_answers, $student_answers));
            $wrongAnswers = count(array_diff_assoc($correct_answers, $student_answers)) - $emptyAnswers;
            $correctAnswers = count($student_answers) - $wrongAnswers;
            $total_point = $correctAnswers - ($wrongAnswers * $exam->minius_mark);
        } else {
            $emptyAnswers = count($correct_answers);
            $wrongAnswers = 0;
            $correctAnswers = 0;
            $total_point = 0;
        }
        if ($request->practice) {
            $data = ['practice_answers' => json_encode($student_answers), 'practice_total' => $total_point, 'practice_wrong_answers' => $wrongAnswers, 'practice_empty_answers' => $emptyAnswers];
        } else {
            $data =  ['answers' => json_encode($student_answers), 'total' => $total_point, 'wrong_answers' => $wrongAnswers, 'empty_answers' => $emptyAnswers];
        }
        $exam = auth()->user()->exams()->updateExistingPivot($exam->id, $data);
        if ($request->practice)   return redirect()->route('result-exam', [$uuid, 'practice' => $request->practice]);
        return redirect()->route('result-exam', $uuid);
    }
    public function exam_all_results_pdf($uuid)
    {
        $exam = Exam::where('uuid', $uuid)->first();
        $results = UserExam::where('exam_id', $exam->id)->whereNotNull('answers')->orderBy('total', 'desc')->orderBy('created_at', 'DESC')->get();

        // Find font directory - check multiple locations (server-friendly)
        $possibleDirs = [
            base_path('resources/fonts'),
            public_path(),
            storage_path('fonts'),
        ];

        $fontDir = null;
        $fontData = [];
        
        // Try to find Nikosh.ttf in any of the possible directories
        foreach ($possibleDirs as $dir) {
            $nikoshPath = rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Nikosh.ttf';
            if (file_exists($nikoshPath) && is_readable($nikoshPath)) {
                $fontDir = rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
                break;
            }
        }

        // If font directory found, build font data
        if ($fontDir) {
            $fontFiles = [
                'R' => 'Nikosh.ttf',
                'B' => 'Nikosh.ttf',
                'I' => 'Nikoshc.ttf', // fallback to Nikosh.ttf if not found
                'BI' => 'Nikosh.ttf'
            ];

            foreach ($fontFiles as $variant => $filename) {
                $fontPath = $fontDir . $filename;
                if (file_exists($fontPath) && is_readable($fontPath)) {
                    $fontData[$variant] = $filename;
                } elseif ($variant === 'I' && !file_exists($fontPath)) {
                    // Fallback italic to regular font if italic variant doesn't exist
                    $fontData[$variant] = 'Nikosh.ttf';
                }
            }
        }

        // Build PDF configuration
        $pdfConfig = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'default_font_size' => 12,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 0,
            'margin_footer' => 0,
            'show_watermark' => false,
            'tempDir' => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
        ];

        // Add font configuration if fonts are available
        if ($fontDir && !empty($fontData)) {
            $pdfConfig['default_font'] = 'Nikosh';
            $pdfConfig['custom_font_dir'] = $fontDir;
            $pdfConfig['custom_font_data'] = [
                'Nikosh' => $fontData
            ];
        } else {
            // Use dejavusans as fallback (built-in mPDF font with all variants)
            // This ensures we don't try to use dejavusanscondensed which may not have all variants
            $pdfConfig['default_font'] = 'dejavusans';
            // Explicitly disable font subsetting to avoid font variant issues
            $pdfConfig['useSubstitutions'] = false;
        }

        try {
            $pdf = MPDF::loadView('frontEnd.exam.pdf_results', ['results' => $results, 'exam' => $exam], $pdfConfig);
        } catch (\Exception $e) {
            // If font error occurs, retry with minimal config using dejavusans
            $pdfConfig = [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'default_font' => 'dejavusans',
                'default_font_size' => 12,
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
                'margin_header' => 0,
                'margin_footer' => 0,
                'show_watermark' => false,
                'tempDir' => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
                'useSubstitutions' => false,
            ];
            $pdf = MPDF::loadView('frontEnd.exam.pdf_results', ['results' => $results, 'exam' => $exam], $pdfConfig);
        }

        return $pdf->download('results.pdf');
    }
    public function answerSheetPdf($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->first();


        $questions = $exam->questions()->active()->get();

        if (request()->pracitce) {

            $pdf = MPDF::loadView('frontEnd.exam.answer_sheet_pdf2', ['questions' => $questions, 'exam' => $exam], [
                'title' => $exam->title . ' Answer Sheet',
                'Author' => 'BD Job War'
            ]);
        } else {
            $pdf = MPDF::loadView('frontEnd.exam.answer_sheet_pdf', ['questions' => $questions, 'exam' => $exam], [
                'title' => $exam->title . ' Answer Sheet',
                'Author' => 'BD Job War'
            ]);
        }
        return $pdf->stream('answer_sheet.pdf');
        // return $pdf->download('answer_sheet.pdf');
    }
    public function answerSheetPdfWithOutMarking($uuid)
    {
        $uuid =  trim($uuid, "\u{2069}");
        $exam = Exam::where('uuid', $uuid)->first();


        $questions = $exam->questions()->active()->get();
        $pdf = MPDF::loadView('frontEnd.exam.answer_sheet_without_marking', ['questions' => $questions, 'exam' => $exam], [
            'title' => $exam->title . ' Answer Sheet',
            'Author' => 'BD Job War'
        ]);

        return $pdf->stream('questions.pdf');
        // return $pdf->download('questions.pdf');
    }

    public function duplicate(Exam $exam)
    {
        try {

            DB::beginTransaction();
            $clone = $exam->replicate();
            $clone->uuid = 'EXM' . now()->format('y') . rand(99999, 999999);
            $clone->created_at = now();
            $clone->save();
            foreach ($exam->subjects as $subject) {
                $clone->subjects()->attach($subject);
            }
            foreach ($exam->questions as $question) {
                $clone->questions()->attach($question);
            }
            DB::commit();
            return redirect()->route('voyager.exams.edit', $clone->id)->with([
                'message'    => 'duplicate created',
                'alert-type' => 'success',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('voyager.exams.index')->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->route('voyager.exams.index')->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }
    }
    public function batchDuplicate(Batch $batch)
    {
        try {

            DB::beginTransaction();

            $clone = $batch->replicate();
            $clone->created_at = now();
            $clone->routine = null;
            $clone->save();

            foreach ($batch->exams as $exam) {
                $this->clone($exam, $clone);
            }
            DB::commit();

            return redirect()->route('voyager.batches.edit', $clone->id)->with([
                'message'    => 'duplicate created',
                'alert-type' => 'success',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('voyager.batches.index')->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->route('voyager.batches.index')->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }
    }

    protected function clone(Exam $exam, Batch $batch)
    {

        $clone = $exam->replicate();
        $clone->uuid = 'EXM' . now()->format('y') . rand(99999, 999999);
        $clone->batch_id = $batch->id;

        $clone->created_at = now();
        $clone->save();

        foreach ($exam->subjects as $subject) {
            $clone->subjects()->attach($subject);
        }
        foreach ($exam->questions as $question) {
            $clone->questions()->attach($question);
        }
        return $clone;
    }

    public function recheck(Exam $exam)
    {
        try {
            DB::beginTransaction();
            $results = UserExam::whereNotNull('answers')->where('exam_id', $exam->id)->get();
            foreach ($results as $result) {
                Revaluation::evaluate($exam, $result);
            }
            DB::commit();
            return redirect()->route('voyager.exams.index')->with([
                'message'    => 'revalutain completed',
                'alert-type' => 'success',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('voyager.exams.index')->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->route('voyager.exams.index')->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }
    }

    public function results(Exam $exam, Request $request)
    {
       
        $results = UserExam::filter(request(['search', 'roll']))->where('exam_id', $exam->id)->whereNotNull('total')->orderByRaw('total DESC')->orderByRaw('created_at DESC')->paginate(50);


        return view('vendor.voyager.exams.results', compact('exam', 'results'));
    }
    public function resultsDestroy(UserExam $userExam)
    {
 
        $userExam->delete();

        return redirect()->back()->with([
            'message'    => 'Result Removed',
            'alert-type' => 'success',
        ]);;
    }
}
