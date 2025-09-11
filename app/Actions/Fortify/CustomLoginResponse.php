<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Spatie\Permission\Models\Role as SpatieRole;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();
        // Ensure the Spatie role record exists and is attached
        if ($user && $user->role) {
            SpatieRole::firstOrCreate([
                'name' => $user->role,
                'guard_name' => 'web',
            ]);

            if (! $user->hasRole($user->role)) {
                $user->assignRole($user->role);
            }
        }

        switch ($user->role) {
            case 'admin':
                $redirectUrl = '/admin/dashboard';
                break;
            case 'counselor':
                $redirectUrl = '/counselor/dashboard';
                break;
            case 'staff':
                $redirectUrl = '/staff/dashboard';
                break;
            case 'student':
                $redirectUrl = '/student/dashboard';
                break;
            default:
                // If role is missing or unrecognised, treat as student by default
                $redirectUrl = '/student/dashboard';
                break;
        }

        return redirect()->intended($redirectUrl);
    }
}
