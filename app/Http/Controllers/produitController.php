<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produit;
use Illuminate\Support\Facades\File;

class produitController extends Controller
{
    //
    public function addProduit(Request $rqst){
        $rqst->validate([
            'nom'=>'required',
            'description'=>'required',
            'prix'=>'required',
            'image'=>'required|image|mimes:jpg,bmp,png',
            'categorie_id'=>'required',
            ]
        );

        $img_name=time().'.'.$rqst->image->extension();
        $rqst->image->move(public_path('uploads/images/produits')
        ,$img_name);

        $produit = new Produit();


        $produit->nom = $rqst['nom'];
        $produit->description = $rqst['description'];
        $produit->prix = $rqst['prix'];
        $produit->image = $img_name;
        $produit->categorie_id = $rqst['categorie_id'];
        $produit->save();
         return "produit add mazyan";

       }
       public function updateProduit(Request $rqst){

        $produit = Produit::find($rqst->id);
        $rqst->validate([
            'nom'=>'required',
            'description'=>'required',
            'prix'=>'required',
            'image'=>'required|image|mimes:jpg,bmp,png',
            // 'categorie_id'=>'required',
            ]
        );

        $updt = $rqst->all();

        if ($rqst->hasFile('image')) {
            $img_name=time().'.'.$rqst->image->extension();
            $rqst->image->move(public_path('uploads/images/produits')
            ,$img_name);
            $updt['image'] = $img_name;
            File::delete('uploads/images/produits/'.$produit->image);
            // return "image delete";
        }

        $produit->update($updt);
         return "produit update mazyan";

       }
       public function allProduit(){
        $produits = Produit::all();
       //  return response()->json(['users'=>$users],200);
        return response()->json($produits,200);
       }
       public function deleteProduit($id){
        $produit = Produit::find($id);
         File::delete('uploads/images/produits/'.$produit->image);
         $produit->delete();
        return "delete mazyan";
       }
}
