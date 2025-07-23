<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartidoRequest;
use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\Cancha;
use App\Models\Equipo;
use App\Models\Partido;
use App\Models\Torneo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PartidoController extends Controller
{
    public function index(): View
    {
        $partidos = Partido::all();
        return view('admin.partido.index', compact('partidos'));
    }

    public function create(): View
    {
        $torneos = Torneo::all();
        $canchas = Cancha::all();
        $arbitros = Arbitro::all();
        return view('admin.partido.create', compact('canchas', 'arbitros', 'torneos'));
    }

    public function store(PartidoRequest $request): RedirectResponse
    {
        //Recuperamos los id de los equipos de los que mandamos por los input en el formulario 
        $equipoL = $request->input('equipoL');
        $equipoV = $request->input('equipoV');
        //el metodo dd es para mostrar que id envia el formulario por el servidor
        //dd($equipoL, $equipoV);

        /* Guardamos los datos en la tabla partido, esto lo podemos hacer porque usamos el $fillable en el modelo partido, esta variable nos
        permite guardad unicamente los datos que le indiquemos de forma protegida. Si no hacemos esto entonses no salta error 
        ya que intentara guardar todo y nuestra tabla no guardara todos los datos del formulario como en este caso son los ids de los equipos */
        $partido = Partido::create($request->all());
        $partido->equipos()->sync([$equipoL, $equipoV]);
        
        /* guardamos en la variable $partidos los datos del formulario, accedemos al metodo equipo que hacer referencia a la relacion muchos a muchos
        que hay entre el modelo partido y equipo, luego con el metodo attach pasamos los valores en arrays para guardarlos en la tabla pivote.
        con las variables $equipoL y $equipoV pasamos los valores que en los que tiene que guardar para cada id en array 
        
        $partido->equipos()->attach([
            $equipoL => [
                'resultado' => 'E',
                'golesF' => 0,
                'golesE' => 0,
                'estado' => 'Pendiente',
            ],
            $equipoV => [
                'resultado' => 'E',
                'golesF' => 0,
                'golesE' => 0,
                'estado' => 'Pendiente',
            ]
        ]);
        */
        //retorna a la vista prinsipal una ves guardados los datos
        return redirect()->route('admin.partido.index')->with('success', 'Partido creado');
    }

    public function edit(Partido $partido): View
    {
        $canchas = Cancha::all();
        $arbitros = Arbitro::all();
        $equipos = Equipo::all();
        $torneos = Torneo::all();
        return view('admin.partido.edit', compact('partido', 'canchas', 'arbitros', 'equipos', 'torneos'));
    }

    public function update(PartidoRequest $request, Partido $partido): RedirectResponse
    {
        //Recuperamos los id de los equipos de los que mandamos por los select en el formulario 
        $equipoL = $request->input('equipoL');
        $equipoV = $request->input('equipoV');

        //Actualizamos los datos de la tabla partido
        $partido->update($request->all());

        /* Actualizamos solo los IDs de los euquipos en la tabla pivote "equipo_partido" pasandole lo que 
        recuperamos del request, no actualiza ninguna otra columna de la tabla pivote. */
        $partido->equipos()->sync([$equipoL, $equipoV]);

        return redirect()->route('admin.partido.index')->with('success', 'Partido actualizado');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete(); // con este codigo realiza la eliminacion logica de la tabla principal insertando el la columna deleted_at, pero no registra nada en la tabla intermedia.
        $partido->equipos()->detach(); //este codigo elimina los datos de la tabla pivote 
        $partido->jugadores()->detach();

        return redirect()->route('admin.partido.index')->with('danger', 'Partido eliminado');
    }

    //Estado de pago al arbitro: Solo muestra si esta pendiente o no el pago, de estarlo apunta al edit del partido y actualizo el estado 
    public function ctaArbitro(): View
    {
        $partidos = Partido::all();
        return view('admin.arbitro.ctaArbitro', compact('partidos'));
    }

    public function editCtaArbitro(Partido $partido): View
    {
        return view('admin.arbitro.editCtaArbitro', compact('partido'));
    }

    public function updateCtaArbitro(Request $request, Partido $partido)
    {
        $partido->update($request->all());
        return redirect()->route('admin.arbitro.ctaArbitro')->with('success', 'Pago actualizado correctamente');
    }

    public function cargarEquipos(Request $request)
    {
        // Obtener el ID del equipo desde la solicitud
        $torneo = $request->input('torneo');

        // Buscar el equipo con los jugadores relacionados
        $torneo = Torneo::with('equipos')->findOrFail($torneo);

        // Verificar si el equipo tiene jugadores y devolverlos en formato JSON
        if ($torneo->equipos->isEmpty()) {
            return response()->json([]); // Si no hay jugadores, devolver un array vacío
        }

        return response()->json($torneo->equipos->map(function ($equipos) {
            return [
                'id' => $equipos->id,
                'nombre' => $equipos->nombre
            ];
        }));
    }
}
