<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/add-post', [PostController::class, 'addPost']);
Route::get('/post/{post}', [PostController::class, 'showPost']);
Route::get('/post/update/{post}', [PostController::class, 'editPost']);
Route::get('/post/delete/{post}', [PostController::class, 'deletePost']);
Route::post('/store', [PostController::class, 'store']);
Route::post('/update/{post}', [PostController::class, 'storeUpdate']);

Auth::routes();

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
