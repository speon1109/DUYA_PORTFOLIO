<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $fields= $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:24',
        ]);
        $fields['password']=bcrypt($fields['password']);
        $user= User::create($fields);
        $token= $user->createToken('api_token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token,
        ],201);
    }
    public function login(Request $request){
        $fields= $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);
        $user= User::where('email',$fields['email'])->first();
        if(!$user || ! \Hash::check($fields['password'], $user->password)){
            return response()->json([
                'message'=>'Invalid credentials',
            ],401);
        }
        $token= $user->createToken('api_token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token,
        ],200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logged out',
        ]);
    }
}
