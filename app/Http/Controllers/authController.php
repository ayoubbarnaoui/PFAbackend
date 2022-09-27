<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    //
    public function registerAdmin(Request $request){
        //validate fields

        $attrs = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //create admin
        $admin = Admin::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            // 'password' => $attrs['password'],
            'password' => encrypt($attrs['password']),
        ]);

        //return admin & token in response
        return response([
            'admin' => $admin,
            'token' => $admin->createToken('secret')->plainTextToken
        ],200);

    }

    public function loginAdmin(Request $request){


        // validate fields
        $attrs=$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);
        $admin = Admin::where('email',$request->email)->get()
            ->first();
            $pass = decrypt($admin->password);
            if($admin && $pass==$request->password){
        $token = $admin->createToken('secret')->plainTextToken;
        return response(['admin' => $admin, 'token' => $token],200);
            }


    }
    public function admin(){

        return response([
            'admin'=> auth()->user()
        ],200);
    }
            //lougout user
            public function logoutAdmin(){
                //  /** @var \App\Models\MyAdminModel $admin **/ /
                /** @var \App\Models\Admin $admin **/ /*hna darna type casting hit howa hna m3rfx variabble
                      kay3raf ri int w float w ...*/
                  $admin = Auth::user();
                  $admin->tokens()->delete();
                //   return response([
                //       'message' => 'logout success.'
                //   ],200);

                  }
}
