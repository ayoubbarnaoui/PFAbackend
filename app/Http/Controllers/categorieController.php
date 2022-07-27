<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    public function addCategorie(Request $rqst){
        $rqst->validate([
            'titre'=>'required',
            'description'=>'required',
            ]
        );
        $category = new Categorie();
        $category->titre = $rqst['titre'];
        $category->description = $rqst['description'];
        $category->save();
         return "category add mazyan";
       }
       public function updateCategorie(Request $rqst){

        $categorie = Categorie::find($rqst->id);

        $data = $rqst->all();
        $categorie->update($data);
         return "category update mazyan";
       }
       public function deleteCategorie($id){
        $categorie = Categorie::find($id)->delete();
        return "delete mazyan";
       }

       public function allCategorie(){
        $categorie = Categorie::all();
        return response()->json($categorie,200);
       }


       public function produitsCategorie($id){

        $produits = Produit::where('categorie_id',$id)->get();

        return response()->json($produits,200);
       }

}
