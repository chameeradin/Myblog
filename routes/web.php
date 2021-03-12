<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SecondCommentController;

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

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/profile/{user:username}', [ProfileController::class, 'index'])->name('profile.user');
Route::post('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/posts', [PostController::class, 'index'])->name('post');
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// Route::post('/posts/{comment}', [PostCommentController::class, 'index'])->name('comment');
Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->name('comment');
Route::get('/comments/{comment}/edit', [PostCommentController::class, 'edit'])->name('comments.edit');
Route::post('/comments/{comment}', [PostCommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [PostCommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');


Route::post('/comment/{comment}/secondComments', [SecondCommentController::class, 'store'])->name('secondComment');
Route::delete('/secondComments/{secondComment}', [SecondCommentController::class, 'destroy'])->name('secondComment.destroy');

