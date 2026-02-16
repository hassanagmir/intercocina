<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function create(){
        $title = __("Réclamation");
        return view("claim.create", compact('title'));
    }
}
