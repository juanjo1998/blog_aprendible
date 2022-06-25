<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* pages */
Route::get('/',[PageController::class,'home'])->name('home');

/* posts */
Route::resource('posts',PostController::class)->names('posts');

/* category */

Route::get('posts-category/{category}',[CategoryController::class,'show'])->name('categories.show');

/* tags */

Route::get('posts-tag/{tag}',[TagController::class,'show'])->name('tags.show');
