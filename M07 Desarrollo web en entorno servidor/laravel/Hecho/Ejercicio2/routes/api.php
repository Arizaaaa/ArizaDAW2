<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\GradeController;
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
    Route::post('insertStu', [StudentController::class, 'insert']);
    Route::post('deleteStu', [StudentController::class, 'delete']);
    Route::post('updateStu', [StudentController::class, 'update']);
    Route::post('readStu', [StudentController::class, 'read']);
    Route::post('rest', [UserController::class, 'rest']);

    Route::post('insertPro', [ProfessorController::class, 'insert']);
    Route::post('deletePro', [ProfessorController::class, 'delete']);
    Route::post('updatePro', [ProfessorController::class, 'update']);
    Route::post('readPro', [ProfessorController::class, 'read']);

    Route::post('insertGra', [GradeController::class, 'insert']);
    Route::post('deleteGra', [GradeController::class, 'delete']);
    Route::post('updateGra', [GradeController::class, 'update']);
    Route::post('readGra', [GradeController::class, 'read']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});