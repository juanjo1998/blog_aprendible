<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ImageController;
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

Route::get('/',[AdminController::class,'index'])->name('home');

/* posts */
Route::resource('posts',PostController::class)->names('posts');

Route::post('posts/{post}/files',[PostController::class,'files']);

Route::delete('posts/{image}/files/destroy',[ImageController::class,'destroy'])->name('posts.files.destroy');