<?php

use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;
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
Route::get('users',[userController::class,'allUser']);

Route::get('users/{id}/find',[userController::class,'findOne']);

Route::get('users/delete/{id}',[userController::class,'delete']);

Route::post('users/add',[userController::class,'add']);

// Route::put('users/update/{id}',[userController::class,'update']);
Route::post('users/update/{id}',[userController::class,'update']);




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('auth/register',[authController::class,'registerAdmin']);
Route::post('auth/login',[authController::class,'loginAdmin']);
Route::middleware('auth:sanctum')->post('/logout', [authController::class, 'logoutAdmin']);
Route::middleware('auth:sanctum')->get('/admin', [AuthController::class, 'admin']);
