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

                //redirect them based on their respective roles, lets use a switch statement for this

                switch($user->role_id){
                    case 1:
                        //redirect to admin dashboard if role_id is 1
                        return redirect('admin/dashboard');
                    case 2:
                        //redirect to counselor dashboard if role_id is 2
                        return redirect('counselor/dashboard');
                    case 3:
                        //redirect to member dashboard if role_id is 3
                        return redirect('member/dashboard');
                    case 4:
                        //redirect to student dashboard if role_id is 4
                        return redirect('student/dashboard');
                    default:
                    //if the role_id doesnt match any given cases return back to home route
                    return redirect(RouteServiceProvider::HOME);
                }

            }
        }
        //continue to the next middleware or route if the user is not authenticated
        return $next($request);
    }
}
