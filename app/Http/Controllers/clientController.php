<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class clientController extends Controller
{
    //
    public function addClient(Request $rqst){
        $rqst->validate([
            'nom'=>'required',
            'email'=>'required',
            'adresse'=>'required',
            'num_telephone'=>'required',
            ]
        );
        $client= new Client();
        $client->nom = $rqst['nom'];
        $client->email = $rqst['email'];
        $client->adresse = $rqst['adresse'];
        $client->num_telephone = $rqst['num_telephone'];
        $client->save();
        return response()->json($client,200);
    }
    // function getClient(Request $id){
    //     $client = Client::where('id',$id)->toArray();
    //     return response()->json($client,200);
    // }
    public function allClient(){
        $client = Client::all();
        return response()->json($client,200);
       }

    public function deleteClient($id){
        $client = Client::find($id);
        $client->delete();
    }
}
