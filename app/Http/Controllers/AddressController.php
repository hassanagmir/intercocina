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



    public function delete(Address $address){
        if(auth()->id() == $address->user_id){
            $address->delete();
            session()->flash('message', __('Adresse supprimée avec succès.'));
        }else{
            abort(404);
        }
        return redirect()->route('address.list');
    }
}
