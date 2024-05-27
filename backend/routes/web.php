<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::view('/', 'dashboard')->middleware('admin')->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::view('/login', 'auth.admin-login')->name('admin.login')->middleware('guest:admin');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest:admin');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});
