<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

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


//get api for fetch single users or all
Route::get('/users/{id?}', [UserApiController::class, 'ShowUser']);

//post api for add user
Route::post('/add-user', [UserApiController::class, 'AddUser']);

//add multiple users by json
Route::post('/add-multiple-user', [UserApiController::class, 'AddMultipleUser']);
