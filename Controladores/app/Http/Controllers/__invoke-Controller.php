<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * Handle the incoming request.
     * Este controlador realiza una sola accion, en este caso el Request $request no es necesario 
     * pero lo dejamos para recordad que se puede utilizar
     */
    public function __invoke(Request $request)
    {
        return view('welcome');
    }
}
