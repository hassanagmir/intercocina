<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    /**
     * Register a new client.
     */
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'      => ['required', 'string', 'max:255', 'unique:users'],
                'password'   => ['required', 'string', 'min:6'],
            ],
            [],
            [
                'first_name' => 'Prénom',
                'last_name'  => 'Nom',
                'email'      => 'Adresse e-mail',
                'phone'      => 'Téléphone',
                'password'   => 'Mot de passe',
            ]
        );

        $user = User::create([
            ...$data,
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('client');

        return response()->json([
            'success' => true,
            'message' => "L'utilisateur s'est inscrit avec succès.",
            'user'    => $user,
        ], 201);
    }

    /**
     * Authenticate a user (by email or username) and issue a token.
     */
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = User::where($field, $data['login'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Identifiants invalides',
            ], 401);
        }

        return response()->json([
            'success'      => true,
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ]);
    }

    /**
     * Revoke the token used for the current request.
     */
    public function logout(Request $request): JsonResponse
    {
        $token = $request->user()->currentAccessToken();

        if ($token instanceof PersonalAccessToken) {
            $token->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Déconnexion effectuée avec succès.',
        ]);
    }

    /**
     * Revoke every token of the user (logout from all devices).
     */
    public function logoutAll(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Déconnexion effectuée de tous les appareils.',
        ]);
    }
}