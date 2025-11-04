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
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use MPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;

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

        // Create Excel export - better Bengali text support than PDF
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Main title - formatted nicely
        $sheet->setCellValue('B1', 'মেধাতালিকা');
        $sheet->mergeCells('B1:E1');
        $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(18);
        $sheet->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Exam title
        $sheet->setCellValue('B2', $exam->title);
        $sheet->mergeCells('B2:E2');
        $sheet->getStyle('C2')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('B2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Exam subtitle
        if ($exam->sub_title) {
            $sheet->setCellValue('B3', $exam->sub_title);
            $sheet->mergeCells('B3:E3');
            $sheet->getStyle('B3')->getFont()->setSize(12);
            $sheet->getStyle('B3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        // Summary section
        $passedCount = $results->filter(function ($result) use ($exam) {
            return $result->total >= $exam->minimum_to_pass;
        })->count();
        $failedCount = $results->filter(function ($result) use ($exam) {
            return $result->total < $exam->minimum_to_pass;
        })->count();

        $sheet->setCellValue('A5', 'মোট উত্তীর্ণ: ' . $passedCount);
        $sheet->setCellValue('F5', 'মোট অনুত্তীর্ণ: ' . $failedCount);
        $sheet->getStyle('A5')->getFont()->setSize(11);
        $sheet->getStyle('F5')->getFont()->setSize(11);

        // Table headers
        $headers = ['স্থান', 'নাম', 'রোল', 'সঠিক উত্তর', 'ভুল উত্তর', 'মোট'];
        $col = 'A';
        $row = 7;
        
        foreach ($headers as $header) {
            $sheet->setCellValue($col . $row, $header);
            $sheet->getStyle($col . $row)->getFont()->setBold(true)->setSize(11);
            $sheet->getStyle($col . $row)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FF4e73df');
            $sheet->getStyle($col . $row)->getFont()->getColor()->setARGB('FFFFFFFF');
            $sheet->getStyle($col . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($col . $row)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            $col++;
        }

        // Set header row height
        $sheet->getRowDimension($row)->setRowHeight(25);

        // Data rows
        $row = 8;
        foreach ($results as $result) {
            $correctAnswers = count((array) json_decode($result->answers)) - $result->wrong_answers;
            $status = ($result->total >= $exam->minimum_to_pass) ? ' (P)' : ' (F)';
            
            $sheet->setCellValue('A' . $row, $result->exam->getRanking($result->user));
            $sheet->setCellValue('B' . $row, $result->user->name);
            $sheet->setCellValue('C' . $row, @$result->user->information->id);
            $sheet->setCellValue('D' . $row, $correctAnswers);
            $sheet->setCellValue('E' . $row, $result->wrong_answers);
            $sheet->setCellValue('F' . $row, $result->total . $status);
            
            // Center align all cells
            foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $col) {
                $sheet->getStyle($col . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($col . $row)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            }
            
            // Add borders to data row
            $sheet->getStyle('A' . $row . ':F' . $row)->getBorders()->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);
            
            $row++;
        }

        // Add borders to header row
        $sheet->getStyle('A7:F7')->getBorders()->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Auto-size columns
        foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set optimized column widths for print (adjusted to fit A4 portrait)
        $sheet->getColumnDimension('A')->setWidth(8);   // Rank
        $sheet->getColumnDimension('B')->setWidth(25);  // Name
        $sheet->getColumnDimension('C')->setWidth(10);  // Roll
        $sheet->getColumnDimension('D')->setWidth(12);  // Correct
        $sheet->getColumnDimension('E')->setWidth(12);  // Wrong
        $sheet->getColumnDimension('F')->setWidth(12);  // Total

        // Configure print settings for better print preview
        $lastRow = $row - 1;
        
        // Set page orientation and size
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        
        // Scale to fit page - fit to width (1 page wide)
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);
        
        // Center content horizontally
        $sheet->getPageSetup()->setHorizontalCentered(true);
        $sheet->getPageSetup()->setVerticalCentered(false);
        
        // Set print margins (in inches) - smaller margins for more space
        $sheet->getPageMargins()->setTop(0.3);
        $sheet->getPageMargins()->setRight(0.3);
        $sheet->getPageMargins()->setLeft(0.3);
        $sheet->getPageMargins()->setBottom(0.3);
        $sheet->getPageMargins()->setHeader(0.2);
        $sheet->getPageMargins()->setFooter(0.2);
        
        // Set print area - include all data
        $sheet->getPageSetup()->setPrintArea('A1:F' . $lastRow);
        
        // Repeat header row on each page (row 7 is the table header)
        $sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(7, 7);
        
        // Enable gridlines for print
        $sheet->setShowGridlines(true);
        
        // Set row heights for better spacing and print
        $sheet->getRowDimension(1)->setRowHeight(22);
        $sheet->getRowDimension(2)->setRowHeight(18);
        if ($exam->sub_title) {
            $sheet->getRowDimension(3)->setRowHeight(16);
        }
        $sheet->getRowDimension(5)->setRowHeight(16);
        $sheet->getRowDimension(7)->setRowHeight(22); // Header row
        
        // Set data row heights - smaller for print
        for ($i = 8; $i <= $lastRow; $i++) {
            $sheet->getRowDimension($i)->setRowHeight(16);
        }

        // Create writer and download
        $writer = new Xlsx($spreadsheet);
        $filename = 'results_' . $exam->uuid . '.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
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
