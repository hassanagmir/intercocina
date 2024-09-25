<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        return view('user.edit');
    }

    public function password(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        return view("user.password");
    }

    public function login(){
        return view("user.login");
    }

    public function register(){
        return view("user.register");
    }

    public function forgot(){
        return view("user.forgot-password");
    }

    public function reset(){
        return view("user.reset-password");
    }

}
