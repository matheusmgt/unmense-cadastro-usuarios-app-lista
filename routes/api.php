<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [LoginController::class, 'login']);
Route::post('user', [UserController::class, 'store']);



Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('chat/{user_receive_id}', [ChatController::class, 'show']);
    Route::post('chat', [ChatController::class, 'store']);
    
    Route::get('friend', [UserController::class, 'friend_list']);
    Route::get('get_user_logged', [UserController::class, 'get_user_logged']);
    
    Route::get('user', [UserController::class, 'index']);
    Route::put('user', [UserController::class, 'update']);
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});