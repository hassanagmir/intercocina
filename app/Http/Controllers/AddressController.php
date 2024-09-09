<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function list(){
        $addresses = Address::all();
        return view('address.list', compact('addresses'));
    }
}
