<?php

use App\Http\Controllers\API\{AuthController, ClassController, DepartmentController, SettingController, StudentController, TeacherController};
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
        Route::apiResource('/teacher', TeacherController::class);
        Route::apiResource('/department', DepartmentController::class);
        Route::apiResource('/class', ClassController::class)->except('show');
        Route::apiResource('/student', StudentController::class)->except('index','show');

        Route::post('/reset-password', [AuthController::class, 'resetPassword']);
        Route::patch('/setting', [SettingController::class, 'update']);
    });

    Route::group(['middleware'=>'role:admin&teacher'], function () {
        Route::post('/student/test-permission/{student}', [StudentController::class, 'changeTestPermission']);

        Route::get('/class/{class}', [ClassController::class, 'show']);

        Route::apiResource('/student', StudentController::class)->only('index','show');
    });

    Route::group(['middleware'=>'role:teacher'], function () {
        Route::get('/teacher/homeroom/class-id', [TeacherController::class, 'homeroomClassId']);
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