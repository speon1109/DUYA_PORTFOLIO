<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*public function register(Request $request){
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
    }*/
    public function showLogin(){
        return view('authentication.login');
    }
    public function showRegister(){
        return view('authentication.register');
    }
    public function register(Request $request){
        $fields= $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ]);
        $fields['password']=bcrypt($fields['password']);
        $user= User::create($fields);
        auth()->login($user);
        return redirect('/');
    }
    public function login(Request $request){
        $fields= $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);
        if(!Auth::attempt($fields)){
            return back();
        }
        $request->session()->regenerate();
        return view('home');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    



    /*public function login(Request $request){
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
    }*/
    /*public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logged out',
        ]);
    }*/
}
