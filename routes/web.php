<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rutas principales del sitio Phasmophobia Wiki
|--------------------------------------------------------------------------
*/

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
