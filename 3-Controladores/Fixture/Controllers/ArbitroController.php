<?php

namespace App\Http\Controllers;

use App\Models\Arbitro;
use App\Http\Requests\ArbitroRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

// Este es un controlador simple que no necesita mas que recorrer su tabla y hacer el crud de sus datos

class ArbitroController extends Controller
{
    public function index(): View
    {
        $arbitros = Arbitro::all();
        return view('admin.arbitro.index', compact('arbitros'));
    }

    public function create(): View
    {
        return view('admin.arbitro.create');
    }

    public function store(ArbitroRequest $request): RedirectResponse
    {
        Arbitro::create($request->all());
        return redirect()->route('admin.arbitro.index')->with('success', 'Arbitro creado');
    }

    public function edit(Arbitro $arbitro): View
    {
        return view('admin.arbitro.edit', compact('arbitro'));
    }

    public function update(ArbitroRequest $request, Arbitro $arbitro): RedirectResponse
    {
        $arbitro->update($request->all());
        return redirect()->route('admin.arbitro.index')->with('succes', 'Arbitro Actualizado');
    }

    public function destroy(Arbitro $arbitro)
    {
        $arbitro->delete();
        return redirect()->route('admin.arbitro.index')->with('danger', 'Arbitro eliminado');
    }
}
