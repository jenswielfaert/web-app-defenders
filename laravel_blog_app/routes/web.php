<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [PagesController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);

Route::get('/blog/create', [PostController::class, 'create'])->middleware('auth');;

Route::post('/blog', [PostController::class, 'store']);

Route::get('/blog/{id}', [PostController::class, 'show' ]);

Route::get('/blog/{id}/edit', [PostController::class, 'edit']);

Route::put('/blog/{id}', [PostController::class ,'update'])->middleware('auth');

Route::delete('/blog/{id}', [PostController::class, 'destroy'])->middleware('auth');

Route::post('/blog/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

Route::delete('/blog/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

