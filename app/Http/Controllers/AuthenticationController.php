<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function index(){
        return view('user.login');
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        //login dengan users
        if(Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Session::flash('status','failed');
        Session::flash('message','login wrong!');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function register(){
        return view('user.register');
    }
    public function Authregister(Request $request){
        
        $pass = Hash::make($request->password);
        $request['password'] = $pass;
        dd($request->all());
        // return view('user.register');
    }
}
