<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //
    public function allUser(){
     $users = User::all();
    //  return response()->json(['users'=>$users],200);
     return response()->json($users,200);
    }
    public function findOne($id){
        $users = User::find($id);
       //  return response()->json(['users'=>$users],200);
        return response()->json($users,200);
       }
       public function delete($id){
        $users = User::find($id)->delete();
       //  return response()->json(['users'=>$users],200);
        // return "delete succefally";
        return;
       }

       public function add(Request $rqst){
        $rqst->validate([
            'name'=>'required',
            'email'=>'required',
            'image'=>'required|image|mimes:jpg,bmp,png'
            ]
        );

        $img_name=time().'.'.$rqst->image->extension();
        $rqst->image->move(public_path('uploads/images')
        ,$img_name);


        $usr = new User();
        $usr->name = $rqst['name'];
        $usr->email = $rqst['email'];

         $usr->image = $img_name;

        $usr->password="";
        $usr->save();
        // return "add mazyan";
        return;
       }
       public function update(Request $rqst){



        $usr = User::find($rqst->id);


        $rqst->validate([
            'name'=>'required',
            'email'=>'required',
            'image'=>'required|image|mimes:jpg,bmp,png'
            ]
        );
        $input =$rqst->all();
        if ($rqst->hasFile('image')) {
            $img_name=time().'.'.$rqst->image->extension();
            $rqst->image->move(public_path('uploads/images')
            ,$img_name);
            $input['image'] = $img_name;
        }

        // $usr->update($rqst->all());
        $usr->update($input);
        // return "update mazyan" ;
       }

       public function ajAdministrateur(Request $rq){
        $rq->validate([
            'nom'=>'required',
            'adresse'=>'required',
            ]
        );
        $admin = new Administrateur();
        $admin->nom=$rq->nom;
        $admin->save();

        $usr = new Utilisateur();
        $usr->adresse=$rq->adresse;
        $usr->type='Admin';
        $usr->save();

        $admin->utilisateur()->save($usr );
        return "tout est bien";
       }



}
