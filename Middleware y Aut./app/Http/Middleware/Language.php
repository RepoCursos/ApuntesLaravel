<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /** creamos este midelware para propagar y mantener el lenguaje seleccionado en toda la aplicacion, 
         * sin importar que se recargue la pagina, ya que se va a ejecutar cada ves que se realice una peticion */

        /**Explicacion de la codificacion a detalle ver video:https://www.youtube.com/watch?v=dPuP30gGtlk&t=2345s */

        //Si la session contiene la applocale "lenguage elegido", y si tambien existe el valor dentro del array que generamos 
        //en "config.languages" lenguajes disponibles 
        if (Session()->has('applocale') and array_key_exists(Session()->get('applocale'), config('languages'))) {
            //Si es verdadero propagamos el valor que se selecciono 
            App::setLocale(Session()->get('applocale'));
        } else {
            // deja por defecto el valor del fallback_locale
            App::setLocale(Config('app.fallback_locale'));
        }

        return $next($request);
    }
}
