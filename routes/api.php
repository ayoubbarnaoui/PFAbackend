<?php

use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;

use App\Http\Controllers\categorieController;
use App\Http\Controllers\produitController;
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

//categorie api
Route::get('categories',[categorieController::class,'allCategorie']);

Route::get('categorie/delete/{id}',[categorieController::class,'deleteCategorie']);

Route::post('categorie/add',[categorieController::class,'addCategorie']);

Route::post('categorie/update/{id}',[categorieController::class,'updateCategorie']);

Route::get('categories/produits/{id}',[categorieController::class,'produitsCategorie']);

//produit api
Route::post('produit/add',[produitController::class,'addProduit']);

Route::post('produit/update/{id}',[produitController::class,'updateProduit']);

Route::get('produit/delete/{id}',[produitController::class,'deleteProduit']);

Route::get('produits',[produitController::class,'allProduit']);


