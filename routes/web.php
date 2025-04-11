<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Nosotros', function () {
    return view('Nosotros');
});

Route::get('/crearCuenta', function () {
    return view('auth.crearCuenta');
});

Route::get('/tailwind', function () {
    return view('tailwind');
});

route::get('/crearCuenta', [RegisterController::class, 'index']);

Route::view('tailwindcss', 'tailwindcss');