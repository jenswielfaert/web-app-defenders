<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Auth::routes(['verify' => true]);



Route::get('/', [PagesController::class, 'index'])->name('index');


Route::get('/home', [HomeController::class, 'index'])->name('home');


// Likes
Route::post('/blog/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/blog/{post}/likes', [PostLikeController::class, 'destroy']);

// Workspace
Route::get('/blog/workspace', [PostController::class, 'workspace'])->name('posts.workspace')->middleware('auth');
Route::get('/blog/workspace/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/blog/workspace/{id}/edit', [PostController::class, 'edit',])->name('posts.edit');
Route::put('/blog/workspace/{id}', [PostController::class ,'update'])->middleware('auth');
Route::delete('/blog/workspace/{id}', [PostController::class, 'destroy'])->middleware('auth');

// Comments
Route::post('comments/{post_id}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Invites
Route::post('/invites/{post_id}', [InviteController::class, 'send'])->name('invites.send');
Route::get('/invites', [InviteController::class, 'handle'])->name('invites.handle');
Route::delete('/invites/{id}', [InviteController::class, 'destroy'])->name('invites.destroy');

// Editors
Route::get('/blog/{id}/editors', [PostController::class, 'editors' ])->name('posts.editors');
Route::delete('/blog/{id}/editors', [EditorController::class, 'destroy' ])->name('editors.destroy');

// Blog posts

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
Route::get('/blog/{id}', [PostController::class, 'show' ])->name('posts.show');
