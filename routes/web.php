<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rutas principales del sitio Phasmophobia Wiki
|--------------------------------------------------------------------------
*/

// ==========================================
// RUTAS PÚBLICAS
// ==========================================

// Página de inicio
Route::get('/', function () {
    return view('index');
})->name('inicio');

// Página de curiosidades
Route::get('/curiosidades', function () {
    return view('curiosidades');
})->name('curiosidades');

// Página de guía
Route::get('/guia', function () {
    return view('guia');
})->name('guia');

// ==========================================
// RUTAS DE AUTENTICACIÓN (Solo vistas por ahora)
// ==========================================

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Forgot Password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


// ==========================================
// RUTAS POST (Preparadas para controladores)
// Descomentar cuando se conecte la base de datos
// ==========================================

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
