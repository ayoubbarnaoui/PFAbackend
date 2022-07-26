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
            // 'password' => bcrypt($attrs['password']),
            // 'password' => Hash::make($request->password),
            // 'password' =>Hash::make($attrs['password']),
            'password' => $attrs['password'],

        ]);

        //return admin & token in response
        return response([
            'admin' => $admin,
            'token' => $admin->createToken('secret')->plainTextToken
        ],200);

    }

    public function loginAdmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $email=$request['email'];
        $pass=$request['password'];

        // $admin=Admin::where('email','like',"$email",'AND'
        // ,'password','like',"$pass") -> first();
        $admin=Admin::where(
        'password','like',"$pass")->where('email','like',"$email") -> first();
        // $admin=Admin::where('email','like',"$email") -> first();
        // $pass1=Admin::select('password')->where('email', $email)->get();
        // $verify=password_vertify($pass, $request['password']);
        if($admin ){

        $token = $admin->createToken('secret')->plainTextToken;
        return response(['result'=>1 ,'admin' => $admin, 'token' => $token],200);
        }else{
            return response(['result'=>0]);
            // return response()->json(['error'=>'Unauthorised'], 401);
        }

        //validate fields
        // $attrs =$request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',

        // ]);
        // $attrs =[
        //     'email' => $request['email'],
        //    'password'=> bcrypt($request['password']),
        // ];

        // $attrs =[
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),

        // ];
        //attempt login
        // dd(Auth::attempt($attrs), Auth::check());

        // if(!Auth::attempt($attrs)){
        //     return response([
        //         'message' => 'invalid credentials.'
        //     ],403);
        // }

        // //return admin & token in response

        //  /** @var \App\Models\Admin $admin **/
        // $admin = Auth::user();
        // $token = $admin->createToken('secret')->plainTextToken;
        // return response(['admin' => $admin, 'token' => $token],200);


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
                  return response([
                      'message' => 'logout success.'
                  ],200);

                  }
}
