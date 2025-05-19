<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserAuthController::class, 'showRegister'])->name('auth.register');
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::get('/login', [UserAuthController::class, 'loginForm'])->name('auth.login');
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::get('/forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
    Route::post('/forget-password', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/verify-code', [ForgetPasswordController::class, 'showVerifyCodeForm'])->name('password.verify');
    Route::post('/verify-code', [ForgetPasswordController::class, 'verifyCode'])->name('password.verify.submit');
    Route::get('/reset-password', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('password-reset');
    Route::post('/reset-password', [ForgetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userIndex'])->name('user.dashboard');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});

Route::middleware('auth-admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
