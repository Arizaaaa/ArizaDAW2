<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
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
    //rutas
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::post('insert', [ProductController::class, 'insert']);
    Route::post('delete', [ProductController::class, 'delete']);
    Route::post('update', [ProductController::class, 'update']);
    Route::post('read', [ProductController::class, 'read']);
    Route::post('insertCat', [CategoryController::class, 'insert']);
    Route::post('deleteCat', [CategoryController::class, 'delete']);
    Route::post('updateCat', [CategoryController::class, 'update']);
    Route::post('readCat', [CategoryController::class, 'read']);
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
