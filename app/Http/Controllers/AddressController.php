<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Address;

class AddressController extends Controller
{
    public function index(){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        $addresses = Address::with(['city'])->where('user_id', auth()->user()->id)->get();
        return $addresses;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:100|string',
            'last_name'  => 'required|max:100|string',
            'city_id'       => 'required|exists:cities,id',
            'phone'      => 'required|digits_between:8,15',
            'email'      => 'nullable|email',
            'address_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 422);
        }


        $data = $validator->validated();
        \Log::alert($data);
        $data['user_id'] = auth()->id();

        $address = Address::create($data);

        return response()->json([
            'message' => 'Adresse ajoutée avec succès',
            'data' => $address
        ], 201);
    }




    public function destroy(Address $address)
    {
        if (auth()->id() !== $address->user_id) {
            return response()->json([
                'message' => 'Adresse introuvable.'
            ], 404);
        }

        $address->delete();

        return response()->json([
            'message' => 'Adresse supprimée avec succès.'
        ], 200);
    }

}
