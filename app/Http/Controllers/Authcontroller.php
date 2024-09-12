<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Str;

class Authcontroller extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function handelregister(Request $request){
        $request->validate([
            'name'=>"required | string",
            'email'=>"required | string |email",
            'password'=>"required | string |min:6 ",
        ]);

        $name=$request->name;
        $email=$request->email;
        $password=$request->password;

    $user=User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password),
            'access_token'=>Str::random(40),
        ]);

        Auth::login($user);
        return redirect(route('main.leauge'));
    }



    public function login(){
        return view('auth.login');
    }

    public function handellogin(Request $request){
        $request->validate([
            'email'=>"required | string |email",
            'password'=>"required | string |min:6 ",
        ]);

        $cord=$request->only('email','password');

        if(Auth::attempt($cord)){
            return redirect(route('main.leauge'));
        }else{
            return back()->with('error', 'You don’t have an account.');
        }


    }

    public function logout(){
        Auth::logout();
        return redirect(route('auth.login'));
    }

   
}
