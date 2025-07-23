<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoRequest;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function index(): View
    {
        $equipos = Equipo::all();
        return view('admin.equipo.index', compact('equipos'));
    }

    public function create(): View
    {
        //asignamos a la variable torneo para pasar todos los datos de la tabla torneo a la select de la vista create
        $torneos = Torneo::orderBy('nombre')->get();
        return view('admin.equipo.create', compact('torneos'));
    }

    public function store(EquipoRequest $request): RedirectResponse
    {
        $equipo = Equipo::create($request->all());

        if ($request->hasFile('file_uri')) {
            $fileName = $equipo->id . "-" . time() . "." . $request->file('file_uri')->extension();
            $request->file('file_uri')->storeAs('public/images', $fileName);
            $equipo->file_uri = $fileName;
            $equipo->save();
        }

        return redirect()->route('admin.equipo.index')->with('success', 'Equipo creado');
    }

    public function edit(Equipo $equipo): View
    {
        $torneos = Torneo::orderBy('nombre')->get();
        return view('admin.equipo.edit', compact('equipo', 'torneos'));
    }

    public function update(EquipoRequest $request, Equipo $equipo): RedirectResponse
    {
        if ($request->hasFile('file_uri')) {
            $uri = 'public/images' . $equipo->file_uri;
            Storage::delete($uri);
            $fileName = $equipo->id . "-" . time() . "." . $request->file('file_uri')->extension();
            $request->file('file_uri')->storeAs('public/images', $fileName);
            $equipo->file_uri = $fileName;
            $equipo->save();
        }

        $equipo->update($request->input());
        return redirect()->route('admin.equipo.index')->with('success', 'Equipo actualizado');
    }

    public function destroy(Equipo $equipo)
    {
        $uri = 'public/images' . $equipo->file_uri;
        Storage::delete($uri);
        $equipo->delete();
        return redirect()->route('admin.equipo.index')->with('danger', 'Equipo eliminado');
    }

    //Muestra si los equipos pagaron la cancha del partido 
    public function ctaEquipo(): View
    {
        $equipos = Equipo::all();
        return view('admin.equipo.ctaEquipo', compact('equipos'));
    }

    public function editCtaEquipo(Request $request, Equipo $equipo): View
    {
        /*Para que el controlador reciba también el partido_id desde la solicitud y lo pase a la vista
        modificamos el método de la siguiente manera:*/

        $partidoId = $request->query('partido_id'); // Recuperar el ID del partido desde la consulta

    /* Incluir el Request: Agregué el parámetro Request $request para poder acceder a los datos de la solicitud.
    Recuperar partido_id: Utilicé $request->query('partido_id') para obtener el ID del partido que se pasa como parámetro en la URL.
    Pasar a la vista: Incluí el partidoId en el método compact, así puedo usarlo en la vista.*/
        return view('admin.equipo.editCtaEquipo', compact('equipo', 'partidoId'));
    }

    public function updateCtaEquipo(Request $request, Equipo $equipo)
    {
        // Obtener el ID del partido de la solicitud
        $partidoId = $request->input('partido_id');

        // Actualizar solo el estado en la tabla pivote
        $equipo->partidos()->updateExistingPivot($partidoId, [
            'estado' => $request->estado,
        ]);

        /* Obtener el ID del partido: input('partido_id'), el ID del partido se envía como un campo oculto en el formulario.
        Uso de updateExistingPivot: El método actualiza solo la fila de la tabla pivote que relaciona el equipo y el partido especificado. */
        return redirect()->route('admin.equipo.ctaEquipo')->with('success', __('Deuda actualizada correctamente.'));
    }
}
