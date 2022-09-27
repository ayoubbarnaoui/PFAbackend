<?php

use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;

use App\Http\Controllers\categorieController;
use App\Http\Controllers\produitController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\ligneCommandeController;
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
Route::post('/logout', [authController::class, 'logoutAdmin']);
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

Route::get('produit/{id}',[produitController::class,'getProduit']);

//client
Route::post('add/client',[clientController::class,'addClient']);

Route::get('clients/',[clientController::class,'allClient']);

Route::get('client/delete/{id}',[clientController::class,'deleteClient']);

//commande
Route::post('add/commande',[commandeController::class,'addCommande']);

Route::get('commande/delete/{id}',[commandeController::class,'deleteCommande']);

Route::get('commandes',[commandeController::class,'allCommandes']);

//commandeligne
Route::post('add/ligneCommande',[ligneCommandeController::class,'addLigneCommande']);

Route::get('ligneCommandes/{id}',[ligneCommandeController::class,'ligneCommandes']);

// adminis utilis
Route::post('ajouterAdministrateur',[userController::class,'ajAdministrateur']);

