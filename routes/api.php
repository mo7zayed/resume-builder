<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Resumes\GetResumeStepsController;
use App\Http\Controllers\Resumes\GetUserResumeController;
use App\Http\Controllers\Resumes\GetUserResumeLastStepDataController;
use App\Http\Controllers\Resumes\SubmitResumeStepController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('resumes')->group(function () {
        Route::get('/user-last-step-data', GetUserResumeLastStepDataController::class);
        Route::get('/steps', GetResumeStepsController::class);

        Route::post('/submit-step', SubmitResumeStepController::class);

        Route::get('/get-user-resume', GetUserResumeController::class);
    });
});
