<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit(){
        return view('user.edit');
    }

    public function password(){
        return view("user.password");
    }

}
