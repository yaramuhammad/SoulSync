<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DepressionTestQuestionController;
use App\Http\Controllers\EmotionsController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\SecondaryEmotionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
require __DIR__.'/auth.php';

Route::get('/profile', [ProfileController::class, 'getProfile'])
    ->middleware('auth:sanctum');

Route::post('/profile', [ProfileController::class, 'updateProfile'])
    ->middleware('auth:sanctum');

Route::post('/password', [PasswordController::class, 'changePassword'])
    ->middleware('auth:sanctum');

Route::get('/depression-test', [DepressionTestQuestionController::class, 'index'])->middleware('auth:sanctum');
Route::post('/depression-test', [DepressionTestQuestionController::class, 'store'])->middleware('auth:sanctum');

Route::get('/meditation', [MeditationController::class, 'index'])->middleware('auth:sanctum');

Route::get('/primary-emotions', [EmotionsController::class, 'index'])->middleware('auth:sanctum');
Route::get('/secondary-emotions/{emotion}', [SecondaryEmotionsController::class, 'index'])->middleware('auth:sanctum');
Route::post('/secondary-emotions/{secondaryEmotion}', [EntryController::class, 'addSecondaryEmotion'])->middleware('auth:sanctum');

Route::post('/journal', [JournalController::class, 'store'])->middleware('auth:sanctum');

Route::get('/activities', [ActivityController::class, 'index'])->middleware('auth:sanctum');
Route::get('/reasons', [ReasonController::class, 'index'])->middleware('auth:sanctum');


Route::get('/entries', [EntryController::class ,'index'])->middleware('auth:sanctum');
Route::get('/entry', [EntryController::class ,'show'])->middleware('auth:sanctum');


Route::post('/activities', [EntryController::class, 'addActivities'])->middleware('auth:sanctum');
Route::post('/reasons', [EntryController::class, 'addReasons'])->middleware('auth:sanctum');


Route::get('/preferences/questions', [PreferenceController::class, 'showQuestions'])->middleware('auth:sanctum');
Route::post('/preferences/answers', [PreferenceController::class, 'storeAnswers'])->middleware('auth:sanctum');
Route::get('/preferences/answers', [PreferenceController::class, 'getAnswers'])->middleware('auth:sanctum');

