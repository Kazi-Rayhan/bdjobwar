<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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



Route::get('/', [PageController::class, 'home'])->name('home_page');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/exam', [PageController::class, 'exams'])->name('exams');
Route::get('/category/exam/{cat}', [PageController::class, 'categoryExam'])->name('categoryExam');

Route::get('download/{notice}', [HomeController::class, 'download'])->name('download');

Route::get('/verify/otp/send', [AuthenticateController::class, 'otpSend'])->name('otpSend');
Route::post('/verify/otp/check', [AuthenticateController::class, 'checkOtp'])->name('checkOtp');
Route::get('/verify', [AuthenticateController::class, 'otp'])->name('otp');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'],function(){
    Route::get('/order/accept/{order}',[OrderController::class,'accept'])->name('order.accept');
    Route::get('/order/declined/{order}',[OrderController::class,'declined'])->name('order.decline');
});
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','verified']], function () {
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/invoice/{order}', [DashboardController::class, 'invoice'])->name('invoice');
    Route::get('/exams', [DashboardController::class, 'exams'])->name('dashboard.exams');
    Route::post('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
});


Route::get('/package/{slug}/{package}',[PageController::class,'packageDetails'])->name('package-details');
Route::get('/exam/start/{uuid}', [ExamController::class, 'exam_start'])->name('start-exam')->middleware(['auth','canAttendThisExam']);
Route::get('/exam/result/{uuid}', [ExamController::class, 'exam_result'])->name('result-exam')->middleware(['auth','canAttendThisExam']);
Route::get('/exam/start/2/{uuid}', [ExamController::class, 'start'])->name('start')->middleware(['auth','canAttendThisExam']);
Route::get('/exam/{uuid}', [ExamController::class, 'exam'])->name('question')->middleware(['auth','canAttendThisExam','exam']);
Route::post('/exam/{uuid}/store', [ExamController::class, 'store'])->name('exam.store')->middleware(['auth','canAttendThisExam','exam']);
Route::group(['prefix'=>'order','middleware'=>['auth']],function(){
   
    Route::get('/create/{type}/{id}', [OrderController::class, 'create'])->name('orderCreate');
    Route::post('/store', [OrderController::class, 'store'])->name('orderStore');
});
