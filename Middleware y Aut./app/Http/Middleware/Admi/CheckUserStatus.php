<?php

namespace App\Http\Middleware\Admi;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->estado !== 'activo') {
            Auth::logout();
            Session::invalidate(); 
            Session::regenerateToken();
            return redirect()->route('login')->with('error', 'Tu cuenta esta inactiva. Por favor, contacta al administrador.');
        }
        return $next($request);
    }
}
