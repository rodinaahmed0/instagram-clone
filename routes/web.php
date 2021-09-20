<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home')->middleware('auth');
Route::get('/newPost', [App\Http\Controllers\PostController::class, 'create'])->name('post.new')->middleware('auth');
Route::put('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/post/save/{id}', [App\Http\Controllers\PostController::class, 'save'])->name('post.save')->middleware('auth');
Route::get('/post/unsave/{id}', [App\Http\Controllers\PostController::class, 'unsave'])->name('post.unsave')->middleware('auth');
Route::get('/post/like/{id}', [App\Http\Controllers\PostController::class, 'like'])->name('post.like')->middleware('auth');
Route::get('/post/unlike/{id}', [App\Http\Controllers\PostController::class, 'unlike'])->name('post.unlike')->middleware('auth');
Route::get('/post/comment/{id}', [App\Http\Controllers\PostController::class, 'comment'])->name('post.comment')->middleware('auth');
Route::get('/post/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show')->middleware('auth');
Route::get('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete')->middleware('auth');


Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('user.profile')->middleware('auth');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::any('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('auth');

Route::any('/user/updateImg', [App\Http\Controllers\UserController::class, 'updateImg'])->name('user.updateImg')->middleware('auth');
Route::get('/user/deleteImg/{id}', [App\Http\Controllers\UserController::class, 'deleteImg'])->name('user.deleteImg')->middleware('auth');

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');


Route::get('/follow/{id}', [App\Http\Controllers\FollowController::class, 'follow'])->name('user.follow')->middleware('auth');
Route::get('/unfollow/{id}', [App\Http\Controllers\FollowController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');


