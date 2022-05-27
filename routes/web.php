<?php

use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PageController::class, 'home'])->name('home_page');
// Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('question/{exam}', [PageController::class, 'question'])->name('question');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/test', function () {
    return view('frontEnd.test');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
