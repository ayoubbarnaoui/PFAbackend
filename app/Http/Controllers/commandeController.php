<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Carbon\Carbon;

class commandeController extends Controller
{
    public function addcommande(Request $rqst){

        $rqst->validate([
            'client_id'=>'required',
            'prix_total'=>'required',
            'date'=>'required',
            ]
        );
        $commande= new Commande();
        $commande->client_id = $rqst['client_id'];
        $commande->prix_total = $rqst['prix_total'];
        // $commande->date = Carbon::now();
        // $commande->date->toDateTimeString();
        $commande->date = $rqst['date'];
        $commande->save();
        return response()->json($commande,200);
    }
    public function allCommandes(){
        $commandes = Commande::all();
        return response()->json($commandes,200);
    }
    public function deleteCommande($id){
        $commande = Commande::find($id);
        $commande->delete();
    }
}
