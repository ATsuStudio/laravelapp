<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => [
        'api'
    ],
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',  [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});


Route::group([
    'namespace' => 'Post',
    'middleware' => [
        'jwt.auth',
        'api_res',
        'getRole'
    ],
], function ($router) {
    Route::get('/posts', [IndexController::class, '__invoke']);
    Route::post('/posts',  [StoreController::class, '__invoke']);
    Route::get('/posts/{post}',  [ShowController::class, '__invoke']);
    Route::post('/posts/{post}',  [UpdateController::class, '__invoke']);
    Route::delete('/posts/{post}',  [DeleteController::class, '__invoke']);
});
