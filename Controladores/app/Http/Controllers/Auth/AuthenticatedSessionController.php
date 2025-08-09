<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//Este controlador es un ejemplo
class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Este controlador viene por defecto con el kit de Spatie permission.
     * Para esta ocasion y en la mayoria de los casos cuando tenemos perfiles distintos como pueden
     * se los usuarios que administran el sistema como los usuarios visitantes, 
     * Ej: en un ECOMERS:
     *  tenemos los perfiles de usuario visitante son los que se loguean para comprar.
     *  y los usuarios que administran el sistema que son los empleados.
     * Tenemos que redirigir a los administradores al panel de administracion y 
     * redirigir a los visitantes a la tienda online para que puedan comprar
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        /**
         * Modificamos el codigo para que verifique si el usuario tiene rol visitante lo envie a
         * la tienda online, si el usuario tiene rol administrativo por defecto lo enviara al panel
         * de administracion. 
         * NOTA: se redirigira al panel de admin por la codificacion de las rutas y los controladores
         */
        $user = Auth::user();
        if ($user->hasRole('visitantes')) {
            return redirect()->route('visitantes.tienda_online');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
