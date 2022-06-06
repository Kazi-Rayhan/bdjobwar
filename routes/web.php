<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
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
Route::get('question/{exam}', [PageController::class, 'question'])->name('question');
Route::get('download/{notice}', [HomeController::class, 'download'])->name('download');

Route::get('/verify/otp/send', [AuthenticateController::class, 'otpSend'])->name('otpSend');
Route::post('/verify/otp/check', [AuthenticateController::class, 'checkOtp'])->name('checkOtp');
Route::get('/verify', [AuthenticateController::class, 'otp'])->name('otp');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','verified']], function () {
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/package-info', [HomeController::class, 'packageInfo'])->name('packageInfo');
});

Route::group(['prefix'=>'order','middleware'=>['auth']],function(){
    Route::get('/create/{type}/{id}', [OrderController::class, 'create'])->name('orderCreate');
    Route::post('/store', [OrderController::class, 'store'])->name('orderStore');
});
