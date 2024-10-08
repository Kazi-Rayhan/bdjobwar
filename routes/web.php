<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BatchDetailsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionsVoyagerController;
use App\Http\Controllers\SuccessController;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Package;
use App\Models\Question;
use App\Models\User;
use App\Models\UserExam;
use App\Models\UserMeta;
use App\Services\Revaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
// Route::post('/login', [AuthenticateController::class, 'login'])->name('login');

Route::get('/', [PageController::class, 'home'])->name('home_page');
Route::get('/post', [PageController::class, 'post'])->name('post');
Route::get('/single_post/{post:slug}', [PageController::class, 'single_post'])->name('single_post');
Route::post('/comment', [CommentController::class, 'comment'])->name('comment')->middleware('auth');


Route::get('notices', [PageController::class, 'notices'])->name('notices');
// Route::get('download/{notice}', [HomeController::class, 'download'])->name('download');

Route::get('/verify/otp/send', [AuthenticateController::class, 'otpSend'])->name('otpSend');
Route::post('/verify/otp/check', [AuthenticateController::class, 'checkOtp'])->name('checkOtp');
Route::get('/verify', [AuthenticateController::class, 'otp'])->name('otp');
Route::get('/course/{slug}/{course}', [PageController::class, 'course'])->name('course');
Route::get('/batch/{slug}/{batch}', [PageController::class, 'batch'])->name('batch');
Route::post('/reset-password', [AuthenticateController::class, 'resetPassword'])->name('resetPassword');
Route::get('/reset-password/verify', [AuthenticateController::class, 'resetPasswordVerify'])->name('resetPasswordVerify');
Route::post('/reset/otp/check', [AuthenticateController::class, 'resetOtpCheck'])->name('resetOtpCheck');
Route::get('/password/set', [AuthenticateController::class, 'setPassword'])->name('setPassword');
Route::post('/password/confirm', [AuthenticateController::class, 'confirmPassword'])->name('confirmPassword');
Route::get('/live-exams', [PageController::class, 'liveexams'])->name('liveexams');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('/exams/{exam}/results', [ExamController::class, 'results'])->name('exam.results');
        Route::get('/exams/{userExam}/remove', [ExamController::class, 'resultsDestroy'])->name('exam.results.destroy');
        Route::get('/exam/{exam}/recheck', [ExamController::class, 'recheck'])->name('exam.recheck');
        Route::get('/exams/{exam}/duplicate', [ExamController::class, 'duplicate'])->name('exam.duplicate');
        Route::get('/batches/{batch}/duplicate', [ExamController::class, 'batchDuplicate'])->name('batches.duplicate');
        Route::get('/order/accept/{order}', [OrderController::class, 'accept'])->name('order.accept');
        Route::get('/order/declined/{order}', [OrderController::class, 'declined'])->name('order.decline');
        Route::post('/question/{question}/disable', [QuestionsVoyagerController::class, 'disable'])->name('question-disable');
        Route::post('/question/{question}/active', [QuestionsVoyagerController::class, 'active'])->name('question-active');
        Route::delete('/question/{question}/{exam}/detach', [QuestionsVoyagerController::class, 'detach'])->name('question-detach');
        Route::get('/batches/{batch}/users', [AdminController::class, 'batch_students'])->name('batch.students');
        Route::get('/batches/{batch}/users/pdf', [AdminController::class, 'batch_students_pdf'])->name('batch.students.pdf');
        Route::get('/batches/{batch}/users/{user}/ban', [AdminController::class, 'batch_ban'])->name('batch.students.ban');
        Route::get('/batches/{batch}/users/{user}/unban', [AdminController::class, 'batch_unban'])->name('batch.students.unban');
        Route::get('/packages/{batch}/users/{user}/remove', [AdminController::class, 'batch_remove'])->name('batch.students.remove');
        Route::get('/packages/{package}/users', [AdminController::class, 'package_students'])->name('package.students');
        Route::get('/packages/{package}/users/pdf', [AdminController::class, 'package_students_pdf'])->name('package.students.pdf');
        Route::get('/packages/{package}/users/{user}/cancel', [AdminController::class, 'package_remove'])->name('package.students.remove');
    });
});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [DashboardController::class, 'courses'])->name('courses');
    Route::get('/favourites', [DashboardController::class, 'favourites'])->name('favourites');
    Route::get('/package', [DashboardController::class, 'package'])->name('package');
    Route::get('/edit/profile', [DashboardController::class, 'editProfile'])->name('editprofile');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/invoice/{order}', [DashboardController::class, 'invoice'])->name('invoice');
    Route::get('/exams', [DashboardController::class, 'exams'])->name('exams');
    Route::post('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/changepass', [DashboardController::class, 'changePassword'])->name('dashboard.changepass');
    Route::get('/test-history', [DashboardController::class, 'testHistory'])->name('testHistory');
});




Route::get('/package/{slug}/{package}', [PageController::class, 'packageDetails'])->name('package-details');

Route::get('/jobsolutions', [PageController::class, 'jobsolutions'])->name('jobsolutions');
Route::get('exam/{uuid}/read', [ExamController::class, 'read'])->name('exam.read');

Route::group(['middleware' => ['auth', 'pin', 'canAttendThisExam']], function () {
    Route::get('exam/{uuid}/answer-sheet', [ExamController::class, 'answerSheet'])->name('answerSheet');
    Route::get('exam/{uuid}/practice-answer-sheet', [ExamController::class, 'practiceAnswerSheet'])->name('practiceAnswerSheet');
    Route::get('exam/{uuid}/answer-sheet-pdf', [ExamController::class, 'answerSheetPdf'])->name('answerSheetPdf');
    Route::get('exam/{uuid}/questions-sheet-pdf', [ExamController::class, 'answerSheetPdfWithOutMarking'])->name('answerSheetPdfWithOutMarking');
});

Route::get('start/{uuid}', [ExamController::class, 'exam_start'])->name('start-exam')->middleware(['auth', 'canAttendThisExam']);
Route::get('e/{uuid}', [ExamController::class, 'exam_start'])->name('share.exam');
Route::get('batch-details/{batch}', [PageController::class, 'batchDetails'])->name('batch.details');
Route::get('job-solutions-batch-details/{batch}', [PageController::class, 'jobSolutionsBatchDetails'])->name('job.solutions.batch.details');


Route::post('/{uuid}', function (Request $request) {
    $exam = Exam::where('uuid', $request->uuid)->first();
    if ($exam->pin == $request->pin) {
        session()->put('exam', [$request->uuid => true]);
        //gewl
        return redirect(session()->get('from'));
    }
    return redirect()->back()->withErrors('wrong pin');
})->name('givepin');

Route::group(['prefix' => 'exam', 'controller' => ExamController::class, 'middleware' => ['auth']], function () {

    Route::get('all/results/{uuid}', 'exam_all_results')->name('all-results-exam');
    Route::get('all/results/pdf/{uuid}', 'exam_all_results_pdf')->name('all-results-exam-pdf');

    Route::get('{uuid}', 'exam')->name('question')->middleware(['canAttendThisExam', 'pin', 'exam']);
    Route::get('result/{uuid}', 'exam_result')->name('result-exam')->middleware(['canAttendThisExam', 'pin']);
    Route::get('start/2/{uuid}', 'start')->name('start')->middleware(['canAttendThisExam', 'pin']);
    Route::post('{uuid}/store', 'store')->name('exam.store')->middleware(['canAttendThisExam', 'exam', 'pin']);
});

Route::get('{batch}/batch/routine', [PageController::class, 'batchRoutine'])->name('batch.routines');
// Route::get('{batch}/batch/results',[PageController::class,'batchResults']);


Route::group(['prefix' => 'order', 'middleware' => ['auth']], function () {

    Route::get('/create/{type}/{id}', [OrderController::class, 'create'])->name('orderCreate');
    Route::post('/store', [OrderController::class, 'store'])->name('orderStore');
});

Route::group(['prefix' => 'success', 'controller' => SuccessController::class, 'middleware' => 'auth', 'as' => 'success.'], function () {
    Route::get('/registration', 'registration')->name('registraion');
    Route::get('/order/{order}', 'order')->name('order');
});

Route::get('add-to-fav/{question}', function (Question $question) {
    if (auth()->user()->favourites()->find($question)) {
        auth()->user()->favourites()->detach($question);
        $msg = 'এই প্রশ্নটি Favourite থেকে বাদ দেওয়া  হয়েছে';
    } else {
        $msg = 'এই প্রশ্নটি Favourite এ যোগ করা  হয়েছে';
        auth()->user()->favourites()->attach($question);
    }

    return redirect()->back()->with('success', $msg);
})->name('fav')->middleware('auth');


Route::group(['prefix' => '/batch/{slug}/{batch}', 'as' => 'batch.', 'controller' => BatchDetailsController::class, 'middleware' => 'auth'], function () {
    Route::get('/routine', 'routine')->name('routine')->excludedMiddleware('auth');
    Route::get('/runningexam', 'runningExam')->name('runningexam');
    Route::get('/upcommingexam', 'upcommingExam')->name('upcommingexam');
    Route::get('/missedexam', 'missedExam')->name('missedexam');
    Route::get('/archive', 'archive')->name('archive');
    Route::get('/results', 'result')->name('results');
    Route::get('/practice-exams', 'statics')->name('statics');
    Route::get('/study-materials', 'materials')->name('materials');
});



Route::get('/test',function(){
    $users = User::doesntHave('information')->get();
    
    foreach($users as $user){
        $user->ownThisPackage(Package::find(env('FREE_PACKAGE')));
    }
});

