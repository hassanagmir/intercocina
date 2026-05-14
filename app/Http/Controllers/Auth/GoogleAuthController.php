<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Throwable;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google OAuth consent screen.
     * Used only in server-side (stateful) flows.
     */
    public function redirect(): JsonResponse
    {
        $url = Socialite::driver('google')
            ->stateless()
            ->redirect()
            ->getTargetUrl();

        return response()->json([
            'url' => $url
        ]);
    }

    /**
     * Handle the Google OAuth callback.
     *
     * Expects a POST body:
     * {
     *   "access_token": "<google_token>"
     * }
     */
    public function callback(Request $request): JsonResponse
    {
        $request->validate([
            'access_token' => ['required', 'string'],
        ]);

        try {

            $googleUser = Socialite::driver('google')
                ->stateless()
                ->userFromToken($request->input('access_token'));

            if (empty($googleUser->email)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No email address was returned from Google.',
                ], 422);
            }

            $result = DB::transaction(function () use ($googleUser): array {

                $isNewUser = false;

                // Search by provider_id
                $user = User::where('provider_id', $googleUser->id)->first();

                if (!$user) {

                    // Search by email
                    $emailUser = User::where('email', $googleUser->email)->first();

                    if ($emailUser) {

                        // Attach Google account if not already linked
                        if (empty($emailUser->provider_id)) {
                            $emailUser->update([
                                'provider_id' => $googleUser->id,
                                'provider'    => 'google',
                                'image'       => $googleUser->avatar,
                            ]);
                        }

                        $user = $emailUser;

                    } else {

                        // Create new user
                        $user = $this->createUserFromGoogle($googleUser);

                        $isNewUser = true;
                    }
                }

                // Update last login
                $user->update([
                    'last_login' => now(),
                ]);

                // Create Sanctum token
                $token = $user->createToken(
                    'google-oauth',
                    ['*']
                )->plainTextToken;

                return [
                    'user'        => $user,
                    'token'       => $token,
                    'is_new_user' => $isNewUser,
                ];
            });

            return response()->json([
                'success'      => true,
                'message'      => $result['is_new_user']
                    ? 'Registration successful.'
                    : 'Login successful.',
                'is_new_user'  => $result['is_new_user'],
                'token'        => $result['token'],
                'user'         => new UserResource($result['user']),
            ]);

        } catch (InvalidStateException $e) {

            Log::warning('Google OAuth invalid state', [
                'message' => $e->getMessage(),
                'ip'      => $request->ip(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid OAuth state. Please try again.',
            ], 422);

        } catch (Throwable $e) {

            Log::error('Google OAuth error', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'ip'      => $request->ip(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Authentication failed. Please try again.',
            ], 500);
        }
    }

    /**
     * Logout current user.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);
    }

    /**
     * Create a new user from Google profile.
     */
    private function createUserFromGoogle(mixed $googleUser): User
    {
        $nameParts = explode(' ', trim((string) $googleUser->name), 2);

        $firstName = $nameParts[0] ?? '';
        $lastName  = $nameParts[1] ?? '';

        // Temporary username
        $user = User::create([
            'first_name'  => $firstName,
            'last_name'   => $lastName,
            'name'        => 'client_' . Str::uuid(),
            'email'       => $googleUser->email,
            'provider_id' => $googleUser->id,
            'provider'    => 'google',
            'image'       => $googleUser->avatar,
            'password'    => bcrypt(Str::random(32)),
        ]);

        // Final username using real DB ID
        $user->update([
            'name' => 'client' . $user->id
        ]);

        return $user->fresh();
    }
}