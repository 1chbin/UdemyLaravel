<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;

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
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::view('tailwindcss', 'tailwindcss');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/{user:username}posts/{post}', [PostController::class, 'show'])->name('posts.show');

//rutas para agregar o eliminar comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//rutas para agregar o eliminar likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');

Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

