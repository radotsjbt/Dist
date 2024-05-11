<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postlogin(Request $request){
        
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->intended('/dashboard')->with('message','you are logged in successfully');
        }
        return redirect('/login')->with('message','Login Gagal');
    }

    public function dashboard(){
        if(!Auth::check()){
            return redirect()->route('login')->with('message','you are not logged in');
        }
        // dd(Auth::user());
        if (Auth::user()->role('Farmer')){
            return view('dashboard');

        }else{
            return view('dashboardDistributor');

        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
