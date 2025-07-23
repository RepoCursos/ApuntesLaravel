<?php

namespace App\Http\Controllers;

use App\Http\Requests\JugadorPartidoRequest;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\JugadorPartido;
use App\Models\Partido;
use App\Models\Tarjeta;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JugadorPartidoController extends Controller
{
    public function datosJugadorPartido(): View
    {
        $jugadorPartidos = JugadorPartido::all();
        return view('admin.partido.datosJugadorPartido', compact('jugadorPartidos'));
    }

    public function createJugadorPartido(): View
    {
        $tarjetas = Tarjeta::all();
        $partidos = Partido::all();
        return view('admin.partido.createJugadorPartido', compact('tarjetas', 'partidos'));
    }

    public function storeJugadorPartido(JugadorPartidoRequest $request): RedirectResponse
    {
        JugadorPartido::create($request->all());
        return redirect()->route('admin.partido.datosJugadorPartido')->with('success', 'Datos guardados correctamente');
    }

    public function editJugadorPartido(JugadorPartido $jugadorPartido): View
    {
        $tarjetas = Tarjeta::all();
        $partidos = Partido::all();
        $jugadores = Jugador::all();
        return view('admin.partido.editJugadorPartido', compact('jugadorPartido', 'partidos', 'tarjetas', 'jugadores'));
    }

    public function updateJugadorPartido(Request $request, JugadorPartido $jugadorPartido)
    {
        $jugadorPartido->update($request->all());
        return redirect()->route('admin.partido.datosJugadorPartido')->with('success', 'Dato actualizado');
    }

    public function destroyJugadorPartido(JugadorPartido $jugadorPartido)
    {
        $jugadorPartido->delete();
        return redirect()->route('admin.partido.datosJugadorPartido')->with('danger', 'Dato eliminado');
    }


    //Muestra si los jugadores pagaron la cancha del partido
    public function ctaJugador(): View
    {
        $jugadorPartidos = JugadorPartido::where('tarjeta_id', '>', 0)->get();
        //dd($jugadorPartidos);
        return view('admin.jugador.ctaJugador', compact('jugadorPartidos'));
    }

    public function editCtaJugador(JugadorPartido $jugadorPartido): View
    {
        return view('admin.jugador.editCtaJugador', compact('jugadorPartido'));
    }

    public function updateCtaJugador(Request $request, JugadorPartido $jugadorPartido)
    {
        $jugadorPartido->update([
            'valor_tarjeta' => $request->valor_tarjeta,
            'estado' => $request->estado
        ]);
        
        return redirect()->route('admin.jugador.ctaJugador')->with('success', 'Dato actualizado');
    }

    public function mostrarEquipos($partido_id)
    {
        /* En este ejemplo, Partido::with('equipos') carga los equipos relacionados con el partido usando la relación de muchos a muchos. 
            Luego, se retornan los equipos en formato JSON para ser usados en el frontend.*/
        // Buscar el partido con los equipos relacionados
        $partido = Partido::with('equipos')->findOrFail($partido_id);

        // Retornamos los equipos como un array de objetos
        // Aquí se asume que cada equipo tiene un campo `id` y `nombre`, Devuelve los equipos en formato JSON
        return response()->json($partido->equipos->map(function ($equipo) {
            return [
                'id' => $equipo->id,
                'nombre' => $equipo->nombre
            ];
        }));
    }

    public function mostrarJugadores(Request $request)
    {
        // Obtener el ID del equipo desde la solicitud
        $equipo_id = $request->input('equipo_id');

        // Buscar el equipo con los jugadores relacionados
        $equipo = Equipo::with('jugadores')->findOrFail($equipo_id);

        // Verificar si el equipo tiene jugadores y devolverlos en formato JSON
        if ($equipo->jugadores->isEmpty()) {
            return response()->json([]); // Si no hay jugadores, devolver un array vacío
        }

        return response()->json($equipo->jugadores->map(function ($jugador) {
            return [
                'id' => $jugador->id,
                'nombre' => $jugador->nombre
            ];
        }));
    }
}
