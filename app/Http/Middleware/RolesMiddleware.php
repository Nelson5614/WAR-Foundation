<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = [
            'admin' => 1,
            'student' => 4,
            'member' => 3,
            'counselor' => 2,
        ];
        if(!Auth::check() || Auth::user()->role_id !== $roles[$role]){
            abort(403, 'unautherized access');
        }
        return $next($request);
    }
}
