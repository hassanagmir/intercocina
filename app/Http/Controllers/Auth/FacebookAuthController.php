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

class FacebookAuthController extends Controller
{
    /**
     * Redirect the user to the Facebook OAuth consent screen.
     * Used only in server-side (stateful) flows.
     */
    public function redirect(): JsonResponse
    {
        $url = Socialite::driver('facebook')
            ->stateless()
            ->scopes(['email', 'public_profile'])
            ->redirect()
            ->getTargetUrl();

        return response()->json(['url' => $url]);
    }

    /**
     * Handle the Facebook OAuth callback.
     *
     * Expects a POST body: { "access_token": "<facebook_token>" }
     */
    public function callback(Request $request): JsonResponse
    {
        // 1. Validate the incoming request strictly
        $request->validate([
            'access_token' => ['required', 'string'],
        ]);

        try {
            // 2. Resolve the Facebook user from the access token
            $facebookUser = Socialite::driver('facebook')
                ->stateless()
                ->userFromToken($request->input('access_token'));

            // 3. Facebook may not return an email — build a deterministic
            //    placeholder only as a last resort, never treat it as real
            $email    = $facebookUser->email ?? null;
            $hasEmail = !empty($email);

            if (!$hasEmail) {
                // Scoped to this provider so it never collides with real emails
                $email = 'fb_' . $facebookUser->id . '@placeholder.invalid';
            }

            // 4. Wrap everything in a transaction to ensure atomicity
            $result = DB::transaction(function () use ($facebookUser, $email, $hasEmail): array {

                // 5. Look up by provider ID first (most specific match)
                $user = User::where('provider_id', $facebookUser->id)->first();

                if (!$user) {
                    // 6. Only check for email collision when we have a real email
                    if ($hasEmail) {
                        $emailUser = User::where('email', $email)->first();

                        if ($emailUser) {
                            // 6a. Link provider info to the existing account if missing
                            if (empty($emailUser->provider_id)) {
                                $emailUser->update([
                                    'provider_id' => $facebookUser->id,
                                    'provider'    => 'facebook',
                                ]);
                            }

                            $user = $emailUser;
                        }
                    }

                    // 6b. Still no user — create a new account
                    if (!$user) {
                        $user = $this->createUserFromFacebook($facebookUser, $email);
                    }
                }

                // 7. Update last login only after the account is fully resolved
                $user->update(['last_login' => now()]);

                // 8. Issue a Sanctum token
                $token = $user->createToken('facebook-oauth', ['*'])->plainTextToken;

                return ['user' => $user, 'token' => $token];
            });

            return response()->json([
                'success' => true,
                'message' => 'Login successful.',
                'token'   => $result['token'],
                'user'    => new UserResource($result['user']),
            ]);

        } catch (InvalidStateException $e) {
            Log::warning('Facebook OAuth invalid state', [
                'message' => $e->getMessage(),
                'ip'      => $request->ip(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid OAuth state. Please try again.',
            ], 422);

        } catch (Throwable $e) {
            Log::error('Facebook OAuth error', [
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
     * Revoke the current user's access token (logout).
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
     * Create a new user from a Facebook OAuth profile.
     *
     * Username uses the actual auto-incremented ID after insertion,
     * eliminating any race condition from pre-fetching max(id).
     */
    private function createUserFromFacebook(mixed $facebookUser, string $email): User
    {
        $nameParts = explode(' ', trim((string) ($facebookUser->name ?? 'Facebook User')), 2);
        $firstName = $nameParts[0] ?? 'Facebook';
        $lastName  = $nameParts[1] ?? 'User';

        $user = User::create([
            'first_name'  => $firstName,
            'last_name'   => $lastName,
            'name'        => 'client_' . Str::uuid(), // temporary — replaced below
            'email'       => $email,
            'provider_id' => $facebookUser->id,
            'provider'    => 'facebook',
            'password'    => bcrypt(Str::random(32)),
            'role_name'   => 'User',
            'status'      => 'Active',
            'join_date'   => now(),
        ]);

        // Use the real DB ID for a deterministic, collision-free username
        $user->update(['name' => 'client' . $user->id]);

        return $user->fresh();
    }
}