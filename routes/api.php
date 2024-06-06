<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('/posts', PostController::class);
    Route::apiResource('/categories', CategoryController::class);
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->middleware('guest:api')->name('login');
    Route::post('/register', 'register')->middleware('guest:api');
    Route::get('/refresh', 'refresh')->middleware('auth:api');
    Route::post('/logout', 'logout')->middleware('auth:api')->name('logout');
});
