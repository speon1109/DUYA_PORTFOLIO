<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin(){
        return view('authentication.login');
    }
    public function showRegister(){
        return view('authentication.register');
    }
    public function register(Request $request){
        $fields = $request->validate([
            'name' => [
                'required',
                'string',
                'regex:/^[A-Za-z\s\-]+$/'
            ],
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,}$/'

            ],
        ]);
        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        auth()->login($user);
        return redirect()->route('showProjects');
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
        return redirect()->route('showProjects');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
