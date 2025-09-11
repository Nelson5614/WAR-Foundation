<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        //checking if there are any guards provided, if not use the defualt guard
        $guards = empty($guards) ? [null] : $guards;

        //looping through each guard available
        foreach ($guards as $guard) {
            //check if the user is authenticated using the current guard
            if (Auth::guard($guard)->check()) {

                //get the authenticated user then
                $user = Auth::user();

                // Redirect based on the user's role (string column)
                switch ($user->role) {
                    case 'admin':
                        return redirect('admin/dashboard');
                    case 'counselor':
                        return redirect('counselor/dashboard');
                    case 'staff':
                        return redirect('staff/dashboard');
                    case 'student':
                        return redirect('student/dashboard');
                    default:
                        return redirect(RouteServiceProvider::HOME);
                }

            }
        }
        //continue to the next middleware or route if the user is not authenticated
        return $next($request);
    }
}
