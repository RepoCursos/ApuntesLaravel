<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route('edad') < 18) {
            # SI entro aqui es porque es menor de edad
            abort(403, 'No tienes acceso a este contenido');
        }
        # Si no entro aqui es porque es mayor de edad
        return $next($request);
    }
}
