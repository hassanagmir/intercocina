<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }

        $title = __("Edit le profile");
        return view('user.edit', compact('title'));
    }

    public function password(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        
        $title = __("Changer le mot de passe");
        return view("user.password", compact('title'));
    }

    public function login(){
        $title = __("Se connecter");
        return view("user.login", compact('title'));
    }

    public function register(){
        $title = __("S'inscrire");
        return view("user.register", compact('title'));
    }

    public function forgot(){
        $title = "Mot de passe oublié";
        return view("user.forgot-password", compact('title'));
    }

    public function reset(){
        $title = __("Réinitialiser le mot de passe");
        return view("user.reset-password", compact('title'));
    }

}
