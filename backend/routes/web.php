<?php

use App\Http\Controllers\AdminAuthenticationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::view('/', 'dashboard')->middleware('admin')->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthenticationController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthenticationController::class, 'login']);
    Route::post('/logout', [AdminAuthenticationController::class, 'logout'])->name('admin.logout');
});
