<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Retrieve the user information from Google
            $user = Socialite::driver('google')->user();

            // Check if the user already exists in the database
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                // If user exists, log them in
                Auth::login($finduser);
                // Redirect to the intended dashboard
                return redirect()->intended('dashboard');
            } else {
                // If user doesn't exist, create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('dummy') // Generate a random password or keep as is
                ]);

                // Log the new user in
                Auth::login($newUser);

                   // Check the role of the authenticated user and redirect accordingly
            if ('role_id' === 1) {
                // Redirect to the admin dashboard
                return redirect()->intended('/admin/dashboard');
            } elseif ('role_id' === 4) {
                // Redirect to the student dashboard
                return redirect()->intended('/student/dashboard');
            } elseif ('role_id' === 2) {
                // Redirect to the counselor dashboard
                return redirect()->intended('/counselor/dashboard');
            } else {
                // Redirect to a default dashboard if no role matches
                return redirect()->intended('/dashboard');
            }
            }
        } catch (Exception $e) {
            // If there is an error, redirect back to the Google authentication page
            return redirect('auth/google');
        }
    }
}
