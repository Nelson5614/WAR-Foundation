<?php

namespace App\Actions\Fortify;


use Laravel\Fortify\Contracts\RegisterResponse;

class CustomRegisterResponse implements RegisterResponse
{
    public function toResponse($request)
    {
        $user = $request->user();

        switch ($user->role_id) {
            case 1:
                $redirectUrl = '/admin/dashboard';
                break;
            case 2:
                $redirectUrl = '/counselor/dashboard';
                break;
            case 3:
                $redirectUrl = '/member/dashboard';
                break;
            case 4:
                $redirectUrl = '/student/dashboard';
                break;
            default:
                $redirectUrl = '/';
                break;
        }

        return redirect()->intended($redirectUrl);
    }
}
