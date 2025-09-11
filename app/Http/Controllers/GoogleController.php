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
                // Redirect based on stored role
                return $this->redirectByRole($finduser);
            } else {
                // If user doesn't exist, create a new user with default student role
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => User::ROLE_STUDENT,
                    'password' => encrypt('dummy'), // Generate a random password or keep as is
                ]);

                // Log the new user in
                Auth::login($newUser);

                return $this->redirectByRole($newUser);
            }
        } catch (Exception $e) {
            // If there is an error, redirect back to the Google authentication page
            return redirect('auth/google');
        }
    }

    /**
     * Redirect user to dashboard based on role.
     */
    protected function redirectByRole(User $user)
    {
        switch ($user->role) {
            case User::ROLE_ADMIN:
                return redirect()->intended('/admin/dashboard');
            case User::ROLE_COUNSELOR:
                return redirect()->intended('/counselor/dashboard');
            case User::ROLE_STAFF:
                return redirect()->intended('/staff/dashboard');
            case User::ROLE_STUDENT:
                return redirect()->intended('/student/dashboard');
            default:
                return redirect()->intended('/dashboard');
        }
    }
}
