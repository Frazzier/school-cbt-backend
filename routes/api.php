<?php

use App\Http\Controllers\Api\{AuthController, SettingController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
    
    Route::group(['middleware'=>'role:admin'], function () {
        Route::patch('/setting', [SettingController::class, 'update']);
    });

    Route::patch('/profile', [AuthController::class, 'updateProfile']);
    Route::patch('/change-password', [AuthController::class, 'changePassword']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/setting', [SettingController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::fallback(function () {
    return response()->json(['message' => 'Not Found.'], 404);
});