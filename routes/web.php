<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rutas principales del sitio Phasmophobia Wiki
|--------------------------------------------------------------------------
*/

// ==========================================
// RUTAS PÚBLICAS (sin autenticación)
// ==========================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

});

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

Route::post('/validate-email', [AuthController::class, 'validateEmail'])->name('validate.email');
Route::post('/validate-security-answer', [AuthController::class, 'validateSecurityAnswer'])->name('validate.security-answer');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

// ==========================================
// RUTAS PROTEGIDAS (requieren autenticación)
// ==========================================

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('index');
    })->name('inicio');

    Route::get('/curiosidades', function () {
        return view('curiosidades');
    })->name('curiosidades');

    Route::get('/guia', function () {
        return view('guia');
    })->name('guia');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
