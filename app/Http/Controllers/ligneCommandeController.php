<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneCommande;

class ligneCommandeController extends Controller
{

    public function addLigneCommande(Request $rqst){

        $rqst->validate([
            'produit_id'=>'required',
            'commande_id'=>'required',
            'prix_total'=>'required',
            'quantite' => 'required',
            ]
        );
        $ligneCommande= new LigneCommande();
        $ligneCommande->produit_id = $rqst['produit_id'];
        $ligneCommande->commande_id = $rqst['commande_id'];
        $ligneCommande->prix_total = $rqst['prix_total'];
        $ligneCommande->quantite = $rqst['quantite'];
        $ligneCommande->save();
        return response()->json($ligneCommande,200);
    }
    function ligneCommandes($cmd_id){
        // $ligneCmd = LigneCommande::all($id);
        $ligneCmd = LigneCommande::where('commande_id',$cmd_id)->get();
        return response()->json($ligneCmd,200);
    }
}
