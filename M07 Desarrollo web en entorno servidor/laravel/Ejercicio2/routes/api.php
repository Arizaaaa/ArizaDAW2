<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    Route::post('insert', [StudentController::class, 'insert']);
    Route::post('delete', [StudentController::class, 'delete']);
    Route::post('update', [StudentController::class, 'update']);
    Route::post('read', [StudentController::class, 'read']);
    Route::post('rest', [UserController::class, 'rest']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});