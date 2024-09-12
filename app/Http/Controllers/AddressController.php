<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function list(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        $addresses = Address::all();
        return view('address.list', compact('addresses'));
    }
}
