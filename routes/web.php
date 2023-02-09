<?php

use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Auth::routes();

Route::prefix('posts')->middleware('auth')->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('post');
    Route::get('form', [PostController::class, 'create'])->name('post.form');
    Route::get('form/{id}', [PostController::class, 'create'])->name('post.form_update');
    Route::get('view/{id}', [PostController::class, 'view'])->name('post.form_view');
    Route::post('save', [PostController::class, 'store'])->name('post.save');
    Route::post('save/{id}', [PostController::class, 'store'])->name('post.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
