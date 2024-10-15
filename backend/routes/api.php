<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', action: [RegisterController::class, 'register']);

// Login route
Route::post('/login', [RegisterController::class, 'login'])->name("login");

// Route::post('/jobs', [JobController::class, 'store']);

// Route::middleware('auth:sanctum')->get('/user/jobs', [JobController::class, 'getJobsForCurrentUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/jobs', [JobController::class, 'store']);
    Route::get('/jobs/user', [JobController::class, 'getJobsForCurrentUser']);
   
});

// Route::post('/email/send-verification', [VerificationController::class, 'send'])->middleware('auth:api');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/email/send-verification', [VerificationController::class, 'send']);
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify'); // Ensure this line is included
});

