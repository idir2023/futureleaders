<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // If the user is not an admin, redirect them to home or login page
        if (Auth::check() && !Auth::user()->is_admin) {
            return redirect('/');  // Or any route you prefer
        }

        return $next($request);
    }
}

