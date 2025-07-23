<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoPartidoRequest;
use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EquipoPartidoController extends Controller
{
    //Funciones para tabla pivote equipo_partido
    public function mostrarResultado(): View
    {
        $partidos = Partido::all();
        return view('admin.partido.mostrarResultado', compact('partidos'));
    }

    public function editResultado(Partido $partido): View
    {
        $equipos = Equipo::all();
        return view('admin.partido.editResultado', compact('partido', 'equipos'));
    }

    public function updateResultado(EquipoPartidoRequest $request, Partido $partido): RedirectResponse
    {
        //Recuperamos los id de los equipos de los que mandamos por los input en el formulario 
        $equipoL = $request->input('equipoL');
        $equipoV = $request->input('equipoV');

        $partido->equipos()->syncWithoutDetaching([
            $equipoL => [
                'resultado' => $request->input('resultadoL'),
                'golesF'    => $request->input('golesFL'),
                'golesE'    => $request->input('golesFV'),
            ],
            $equipoV => [
                'resultado' => $request->input('resultadoV'),
                'golesF'    => $request->input('golesFV'),
                'golesE'    => $request->input('golesFL'),
            ]
        ]);

        return redirect()->route('admin.partido.mostrarResultado')->with('success', 'Partido actualizado');
    }
}
