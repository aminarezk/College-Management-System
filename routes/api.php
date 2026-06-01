<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('Register', [AuthController::class, 'Register']);
Route::post('Login', [AuthController::class, 'Login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user', [UserController::class, 'index']);
    Route::get('profile', [UserController::class, 'profile']);

    Route::apiResource('subjects', 'Api\SubjectController');

    Route::apiResource('record', 'Api\SubjectUserController');

    Route::apiResource('marks', 'Api\MarkController');

    Route::apiResource('att', 'Api\AttendanceController');
});
