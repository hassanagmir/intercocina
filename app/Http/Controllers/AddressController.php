<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Address;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function index(){
        if(!auth()->user()){
            return response()->json([
                'message' => 'Utilisateur non authentifié.'
            ], 401);
        }
        $addresses = Address::with(['city'])->where('user_id', auth()->user()->id)->get();
        return response()->json($addresses);
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
        $data['user_id'] = auth()->id();

        $address = Address::create($data);

        return response()->json([
            'message' => 'Adresse ajoutée avec succès',
            'data' => $address
        ], 201);
    }


    public function destroy(Request $request, string $address): JsonResponse
    {
        $deleted = Address::where('id', $address)
            ->where('user_id', $request->user()->id)
            ->delete();

        if (! $deleted) {
            return response()->json(['message' => 'Adresse introuvable.'], 404);
        }

        return response()->json(['message' => 'Adresse supprimée avec succès.']);
    }

}
