<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuccessController;
use App\Models\UserMeta;
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


Route::get('download/{notice}', [HomeController::class, 'download'])->name('download');

Route::get('/verify/otp/send', [AuthenticateController::class, 'otpSend'])->name('otpSend');
Route::post('/verify/otp/check', [AuthenticateController::class, 'checkOtp'])->name('checkOtp');
Route::get('/verify', [AuthenticateController::class, 'otp'])->name('otp');
Route::get('/course/{slug}/{course}',[PageController::class,'course'])->name('course');
Route::get('/batch/{slug}/{batch}',[PageController::class,'batch'])->name('batch');
Route::post('/reset-password',[AuthenticateController::class,'resetPassword'])->name('resetPassword');
Route::get('/reset-password/verify',[AuthenticateController::class,'resetPasswordVerify'])->name('resetPasswordVerify');
Route::post('/reset/otp/check', [AuthenticateController::class, 'resetOtpCheck'])->name('resetOtpCheck');
Route::get('/password/set', [AuthenticateController::class, 'setPassword'])->name('setPassword');
Route::post('/password/confirm', [AuthenticateController::class, 'confirmPassword'])->name('confirmPassword');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('/order/accept/{order}', [OrderController::class, 'accept'])->name('order.accept');
        Route::get('/order/declined/{order}', [OrderController::class, 'declined'])->name('order.decline');
    });
});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/invoice/{order}', [DashboardController::class, 'invoice'])->name('invoice');
    Route::get('/exams', [DashboardController::class, 'exams'])->name('dashboard.exams');
    Route::post('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::get('/test-history', [DashboardController::class, 'testHistory'])->name('testHistory');
});


Route::get('/package/{slug}/{package}', [PageController::class, 'packageDetails'])->name('package-details');


Route::group(['middleware'=>['auth','canAttendThisExam']],function(){
    Route::get('exam/{uuid}/answer-sheet',[ExamController::class,'answerSheet'])->name('answerSheet');
    Route::get('exam/{uuid}/answer-sheet-pdf',[ExamController::class,'answerSheetPdf'])->name('answerSheetPdf');
});

Route::group(['prefix' => 'exam', 'controller' => ExamController::class, 'middleware' => ['auth']], function () {
    Route::get('all/results/{uuid}','exam_all_results')->name('all-results-exam');
    Route::get('all/results/pdf/{uuid}','exam_all_results_pdf')->name('all-results-exam-pdf');

    Route::get('{uuid}','exam')->name('question')->middleware(['canAttendThisExam','exam']);
    Route::get('start/{uuid}','exam_start')->name('start-exam')->middleware('canAttendThisExam');
    Route::get('result/{uuid}','exam_result')->name('result-exam')->middleware(['canAttendThisExam']);
    Route::get('start/2/{uuid}','start')->name('start')->middleware('canAttendThisExam');
    Route::post('{uuid}/store','store')->name('exam.store')->middleware(['canAttendThisExam','exam']);
}); 
Route::get('{batch}/batch/routine',[PageController::class,'batchRoutine'])->name('batch.routines');
// Route::get('{batch}/batch/results',[PageController::class,'batchResults']);


Route::group(['prefix' => 'order', 'middleware' => ['auth']], function () {

    Route::get('/create/{type}/{id}', [OrderController::class, 'create'])->name('orderCreate');
    Route::post('/store', [OrderController::class, 'store'])->name('orderStore');
});

Route::group(['prefix' => 'success', 'controller' => SuccessController::class, 'middleware' => 'auth', 'as' => 'success.'], function () {
    Route::get('/registration', 'registration')->name('registraion');
    Route::get('/order/{order}', 'order')->name('order');
});
