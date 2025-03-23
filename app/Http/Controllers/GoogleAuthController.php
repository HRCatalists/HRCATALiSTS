<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    // Redirect user to Google login page
    public function redirect()
    {
        return Socialite::driver('google')
            ->redirectUrl(config('services.google.redirect')) // Ensure correct redirect URI
            ->redirect();
    }

    // Handle Google OAuth callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists in the database
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // If the user is not found, prevent login and redirect to login page
                return redirect()->route('login')->with('error', 'Access denied. Your account is not registered.');
            }

            // Update Google ID if missing
            if (!$user->google_id) {
                $user->update(['google_id' => $googleUser->getId()]);
            }

            // Log in the registered user
            Auth::login($user);

            return redirect()->route('admin-dashboard'); // Redirect to dashboard
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Google login failed.');
        }
    }
}
