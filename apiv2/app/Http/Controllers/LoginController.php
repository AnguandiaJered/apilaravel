<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function register(Request $request){
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> \bcrypt($request->password),
        ]);
        return \response()->json('User registered');
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return \response()->json(['Token'=>auth()->user()->createToken('API Token')->plainTextToken]);
        }
        return \response()->json(['Login failled']);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return \response()->json(['Logged out']);
    }

}
