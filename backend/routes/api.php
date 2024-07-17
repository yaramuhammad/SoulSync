<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepressionTestQuestionController;
use App\Http\Controllers\EmotionsController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\SecondaryEmotionsController;
use App\Http\Controllers\WeeklyAspectController;
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

Route::post('/journal', [EntryController::class, 'addJournal'])->middleware('auth:sanctum');

Route::get('/activities', [ActivityController::class, 'index'])->middleware('auth:sanctum');
Route::get('/reasons', [ReasonController::class, 'index'])->middleware('auth:sanctum');


Route::get('/entries', [EntryController::class ,'index'])->middleware('auth:sanctum');
Route::get('/entry', [EntryController::class ,'show'])->middleware('auth:sanctum');


Route::post('/activities', [EntryController::class, 'addActivities'])->middleware('auth:sanctum');
Route::post('/reasons', [EntryController::class, 'addReasons'])->middleware('auth:sanctum');


Route::get('/preferences/questions', [PreferenceController::class, 'showQuestions'])->middleware('auth:sanctum');
Route::post('/preferences/answers', [PreferenceController::class, 'storeAnswers'])->middleware('auth:sanctum');
Route::get('/preferences/answers', [PreferenceController::class, 'getAnswers'])->middleware('auth:sanctum');


Route::get('/posts', [PostController::class,'index'])->middleware('auth:sanctum');
Route::post('/posts', [PostController::class,'store'])->middleware('auth:sanctum');
Route::post('/posts/{post}/edit', [PostController::class,'update'])->middleware('auth:sanctum');
Route::delete('/posts/{post}/delete', [PostController::class,'destroy'])->middleware('auth:sanctum');


Route::post('/posts/{post}/comment', [CommentController::class,'store'])->middleware('auth:sanctum');
Route::post('/comment/{comment}/edit', [CommentController::class,'update'])->middleware('auth:sanctum');
Route::delete('/comment/{comment}/delete', [CommentController::class,'destroy'])->middleware('auth:sanctum');


Route::post('/posts/{post}/like', [LikeController::class,'store'])->middleware('auth:sanctum');
Route::delete('/likes/{like}/delete', [LikeController::class,'destroy'])->middleware('auth:sanctum');


Route::get('/weekly-aspects', [WeeklyAspectController::class,'index'])->middleware('auth:sanctum');
Route::post('/weekly-scores', [WeeklyAspectController::class,'store'])->middleware('auth:sanctum');
Route::get('/weekly-tips', [WeeklyAspectController::class,'currentWeekTips'])->middleware('auth:sanctum');
Route::put('/weekly-tips/{tipId}/mark-as-done', [WeeklyAspectController::class,'markTipAsDone'])->middleware('auth:sanctum');
Route::get('/check-weekly-entry', [WeeklyAspectController::class,'returnkUserWeeklyEntry'])->middleware('auth:sanctum');