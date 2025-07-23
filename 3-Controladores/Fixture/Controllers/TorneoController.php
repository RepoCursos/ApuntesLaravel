<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorneoRequest;
use App\Models\Torneo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

// Este es un controlador simple que no necesita mas que recorrer su tabla y hacer el crud de sus datos
class TorneoController extends Controller
{
    public function index(): View
    {
        $torneos = Torneo::all();
        return view('admin.torneo.index', compact('torneos'));
    }

    public function create(): View
    {
        return view('admin.torneo.create');
    }

    public function store(TorneoRequest $request): RedirectResponse
    {
        Torneo::create($request->all());
        return redirect()->route('admin.torneo.index')->with('success', 'Torneo creado');
    }

    public function edit(Torneo $torneo): View
    {
        return view('admin.torneo.edit', compact('torneo'));
    }

    public function update(TorneoRequest $request, Torneo $torneo): RedirectResponse
    {
        $torneo->update($request->all());
        return redirect()->route('admin.torneo.index')->with('success', 'Torneo actualizado');
    }

    public function destroy(Torneo $torneo)
    {
        $torneo->delete();
        return redirect()->route('admin.torneo.index')->with('denger', 'Torneo eliminado');
    }
}
