<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Si l'utilisateur est connecté et que son rôle n'est pas 'admin'
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect('/'); // Rediriger vers l'accueil ou autre
        }
    
        return $next($request);
    }
    
}

