<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\UserPageController;
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

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/', [PagesController::class, 'index'])->name('index');


Route::get('/home', [HomeController::class, 'index'])->name('home');


// Likes
Route::post('/blog/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/blog/{post}/likes', [PostLikeController::class, 'destroy']);

// Workspace
Route::get('/blog/workspace', [PostController::class, 'workspace'])->name('posts.workspace')->middleware('auth');
Route::get('/blog/workspace/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/blog/workspace/{id}/edit', [PostController::class, 'edit',])->name('workspace.edit');
Route::put('/blog/workspace/{id}', [PostController::class ,'update'])->middleware('auth');


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

Route::get('/blog/{id}/edit', [PostController::class, 'edit',])->name('posts.edit');

Route::put('/blog/{id}', [PostController::class ,'update'])->middleware('auth');

Route::delete('/blog/{id}', [PostController::class, 'destroy'])->middleware('auth');

Route::post('/blog/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

Route::delete('/blog/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes.delete');
    

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/userpage', [UserPageController::class, 'index'])->name('user.page.index');

Route::get('/userpage/{userid}', [UserPageController::class, 'edit'])->name('User.edit');

Route::put('/userpage/{userid}', [UserPageController::class, 'update'])->middleware('auth')->name('editprofile');

Route::delete('/userpage/{userid}', [UserPageController::class, 'delete'])->middleware('auth')->name('deleteprofile');

Route::get('/userpage/data/{user_id}', [UserPageController::class, 'getdata'])->name('user.getdata')->middleware('auth');

//Route::get('/api/getposts', [\App\Http\Controllers\PostController::class, 'getposts'])->name('getposts');
//Route::get('/api/getposts/{id}', [\App\Http\Controllers\PostController::class, 'getpostsbyid'])->name('getpostsbyid');

