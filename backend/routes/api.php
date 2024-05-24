<?php

use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\ProfileController;
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
