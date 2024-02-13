<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect('login'); // or your login route
        }

        // Check if the user is verified
        if (Auth::user()->is_verified != 1) {
            // Redirect them to a specific page or show an error
            Auth::logout();
            return redirect('/login');
        }

        return $next($request);
    }
}
