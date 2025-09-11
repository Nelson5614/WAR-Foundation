<?php

namespace App\Actions\Fortify;


use Laravel\Fortify\Contracts\RegisterResponse;
use Spatie\Permission\Models\Role as SpatieRole;

class CustomRegisterResponse implements RegisterResponse
{
    public function toResponse($request)
    {
        $user = $request->user();
        // Ensure the role exists in Spatie tables and is attached to the user
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
                // Fallback to student dashboard if role missing
                $redirectUrl = '/student/dashboard';
                break;
        }

        return redirect()->intended($redirectUrl);
    }
}
