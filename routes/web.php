<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\UpdateController;


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

Route::get('/', [HomeController::class, 'index'])->name('home.index');



Route::group(['namespace' => 'Post'], function(){
    Route::get('/posts', [IndexController::class, '__invoke'])->name('posts.index');
    Route::get('/posts/create',  [CreateController::class, '__invoke'])->name('posts.create');
    Route::post('/posts',  [StoreController::class, '__invoke'])->name('posts.store');
    Route::get('/posts/{post}',  [ShowController::class, '__invoke'])->name('posts.show');
    Route::get('/posts/{post}/edit',  [EditController::class, '__invoke'])->name('posts.edit');
    Route::post('/posts/{post}',  [UpdateController::class, '__invoke'])->name('posts.update');
    Route::delete('/posts/{post}/delete',  [DeleteController::class, '__invoke'])->name('posts.delete');
});





Route::get('/about', [AboutController::class, 'index'])->name('about.index');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
