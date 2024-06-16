<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'guest'], function () {
    // Register
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');

    // Login
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');

    // Forgot Password
    Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('forgot');

    // Reset Password
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Profile
    Route::match(["get","post"],'profile', [AuthController::class, 'profile'])->name('profile');
  

    // Scheme
    Route::get('scheme', [SchemeController::class, 'index'])->name('scheme');
    Route::post('scheme', [SchemeController::class, 'importExcelData']);
    Route::delete('scheme/clear', [SchemeController::class, 'clear'])->name('scheme.clear');

    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Wildcard route to catch undefined routes and redirect to dashboard
    Route::any('{any}', function () {
        return redirect()->route('dashboard');
    })->where('any', '.*');
});
