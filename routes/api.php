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

//post api for add multiple users by json
Route::post('/add-multiple-user', [UserApiController::class, 'AddMultipleUser']);

//put api for update multiple users data
Route::put('/update-user-details/{id}', [UserApiController::class, 'UpdateUserDetails']);

//patch api for update single users data
Route::patch('/update-single-user/{id}', [UserApiController::class, 'UpdateSingleUser']);

//delete api for delete single users data
Route::delete('/delete-single-user/{id}', [UserApiController::class, 'DeleteSingleUser']);

//delete api for delete single users data with josn
Route::delete('/delete-single-user-with-json', [UserApiController::class, 'JsonDeleteSingleUser']);
