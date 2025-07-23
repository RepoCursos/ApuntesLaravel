<?php

namespace App\Http\Controllers;

use App\Http\Requests\JugadorRequest;
use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JugadorController extends Controller
{
    public function index(): View
    {
        $jugadores = Jugador::all();
        return view('admin.jugador.index', compact('jugadores'));
    }

    public function create(): View
    {
        $equipos = Equipo::all();
        return view('admin.jugador.create', compact('equipos'));
    }

    public function store(JugadorRequest $request): RedirectResponse
    {
        Jugador::create($request->all());
        return redirect()->route('admin.jugador.index')->with('success', 'Jugador creado');
    }

    public function show(Jugador $jugador): View
    {
        return view('admin.jugador.show', compact('jugador'));
    }

    public function edit(Jugador $jugador): View
    {
        $equipos = Equipo::all();
        return view('admin.jugador.edit', compact('jugador', 'equipos'));
    }

    public function update(JugadorRequest $request, Jugador $jugador): RedirectResponse
    {
        $jugador->update($request->all());
        return redirect()->route('admin.jugador.index')->with('success', 'Jugador actualizado');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        $jugador->partidos()->detach();
        return redirect()->route('admin.jugador.index')->with('danger', 'Jugador eliminado');
    }
}
