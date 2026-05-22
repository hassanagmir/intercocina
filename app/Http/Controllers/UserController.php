<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function update(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'first_name'   => 'nullable|string|max:255',
            'last_name'    => 'nullable|string|max:255',
            'email'        => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender'       => 'nullable|string|in:Mâle,Femelle',
            'address'      => 'nullable|string',
            'code'         => 'nullable|string',
            'phone'        => ['nullable', 'string', Rule::unique('users')->ignore($user->id)],
            'image'        => 'nullable|string',
            'status'       => 'nullable',
            'zip'          => 'nullable|string',
            'name'         => 'nullable|string',
            'city_id'      => 'nullable|exists:cities,id',
            'shipping_id'  => 'nullable|exists:shippings,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        $user->update($data);

        return response()->json($user);
    }


    public function onboarding(Request $request)
    {
        $user = auth()->user();

        Validator::make(
            $request->all(),
            [
                'first_name'   => 'nullable|string|max:255',
                'last_name'    => 'nullable|string|max:255',
                'gender'       => 'nullable|string|in:Mâle,Femelle',
                'address'      => 'nullable|string',
                'phone'        => 'nullable|string|unique:users,phone,' . $user->id,
                'zip'          => 'nullable|string',
                'city_id'      => 'nullable|exists:cities,id',
                'shipping_id'  => 'nullable|exists:shippings,id',
                'type'       => 'required|integer|in:0,1',
            ],
            [],
            [
                'first_name'  => 'prénom',
                'last_name'   => 'nom',
                'gender'      => 'genre',
                'address'     => 'adresse',
                'phone'       => 'téléphone',
                'zip'         => 'code postal',
                'city_id'     => 'ville',
                'shipping_id' => 'livraison',
                'type'       => 'type de compte',
            ]
        )->validate();

        $user->update($request->only([
            'first_name',
            'last_name',
            'gender',
            'address',
            'phone',
            'zip',
            'city_id',
            'shipping_id',
            'type'
        ]));


        if (!count($user->addresses)) {
            Address::create([
                'user_id' => $user->id,
                'address_name' => $user->address,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'phone' => $user->phone,
                'city_id' => $user->city_id,
                'email' => $user->email
            ]);
        }

        return response()->json([
            'message' => 'Profil mis à jour avec succès',
            'user'    => $user->fresh(),
        ]);
    }
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password'         => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'Le mot de passe actuel est incorrect.',
            ], 403);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Mot de passe mis à jour avec succès.',
        ]);
    }

    public function login()
    {
        $title = __("Se connecter");
        return view("user.login", compact('title'));
    }

    public function register()
    {
        $title = __("S'inscrire");
        return view("user.register", compact('title'));
    }

    public function forgot()
    {
        $title = "Mot de passe oublié";
        return view("user.forgot-password", compact('title'));
    }

    public function reset()
    {
        $title = __("Réinitialiser le mot de passe");
        return view("user.reset-password", compact('title'));
    }
}
