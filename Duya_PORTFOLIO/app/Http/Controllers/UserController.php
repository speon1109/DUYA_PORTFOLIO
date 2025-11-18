<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){

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
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

    }
}
