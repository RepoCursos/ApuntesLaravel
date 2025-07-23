<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use App\Models\JugadorPartido;
use App\Models\Partido;
use App\Models\Torneo;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function cards()
    {
        /* El error "Undefined variable $partidos" ocurre porque en tu controlador estás devolviendo diferentes vistas para 
cada variable (partidos, goles, amarillas, rojas), pero en la vista solo se está esperando una vista que contenga 
todos estos datos a la vez. Es decir, el controlador debe enviar todas las variables al mismo tiempo a la vista.
En tu código actual, estás creando rutas y métodos separados para cada variable. Esto causa que solo se pase una 
variable a la vista por cada acción, por lo que cuando la vista intenta acceder a las otras variables, Laravel no 
las encuentra.
Cómo corregirlo:
Debes asegurarte de pasar todas las variables a la vista en un solo retorno, desde un único método del controlador. 
Puedes modificar el controlador para enviar todas las variables al mismo tiempo en un único retorno. Además, ajusta 
las rutas si es necesario.
        */
        //Datos para las tarjetas
        $detallePartidos = (object)[
            'asistencia' => JugadorPartido::where('asistencias', '>', 0)->sum('asistencias'),
            'goles'      => JugadorPartido::where('goles', '>', 0)->sum('goles'),
            'amarillas'  => JugadorPartido::where('tarjeta_id', '1')->count(),
            'rojas'      => JugadorPartido::where('tarjeta_id', '2')->count(),
        ];

        // Obtener la cantidad de partidos por mes
        $partidosPorMes = Partido::selectRaw('YEAR(fecha) as year, MONTH(fecha) as month, COUNT(*) as cantidad')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Obtener partidos por torneo utilizando join
        $torneos = Torneo::select('torneos.id', 'torneos.nombre', DB::raw('COUNT(DISTINCT partidos.id) as partidos_count'))
            ->join('equipos', 'equipos.torneo_id', '=', 'torneos.id')
            ->join('equipo_partido', 'equipo_partido.equipo_id', '=', 'equipos.id')
            ->join('partidos', 'partidos.id', '=', 'equipo_partido.partido_id')
            ->groupBy('torneos.id', 'torneos.nombre')
            ->get();

        // Preparar los datos para los gráficos
        $labels = $torneos->pluck('nombre'); // Nombres de los torneos
        $data = $torneos->pluck('partidos_count'); // Cantidad de partidos

        return view('admin.dashboard', compact('detallePartidos', 'partidosPorMes', 'labels', 'data'));
    }
}
