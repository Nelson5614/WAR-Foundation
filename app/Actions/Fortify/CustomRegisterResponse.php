<?php

namespace App\Actions\Fortify;


use Laravel\Fortify\Contracts\RegisterResponse;

class CustomRegisterResponse implements RegisterResponse
{
    public function toResponse($request)
    {
        $user = $request->user();

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
                $redirectUrl = '/';
                break;
        }

        return redirect()->intended($redirectUrl);
    }
}
