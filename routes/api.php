<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api.passcode')->group(function () {
    Route::get('courses', [ApiController::class, 'courses']);
    Route::get('exams', [ApiController::class, 'exams']);
    Route::get('batches', [ApiController::class, 'batches']);
    Route::get('categories', [ApiController::class, 'categories']);
    Route::get('questions', [ApiController::class, 'questions']);
});
