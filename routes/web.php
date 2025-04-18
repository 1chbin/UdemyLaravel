<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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
route::post('/crearCuenta', [RegisterController::class, 'store']);

Route::get('/muro', [PostController::class, 'index'])->name('posts.index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::view('tailwindcss', 'tailwindcss');