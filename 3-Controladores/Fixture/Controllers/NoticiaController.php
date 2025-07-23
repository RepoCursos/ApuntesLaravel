<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

// Este es un controlador simple que no necesita mas que recorrer su tabla y hacer el crud de sus datos 
// ademas tiene la funcion show para mostrar los datos en otra vista pero del perfil guest

class NoticiaController extends Controller
{
    public function index(): View
    {
        $noticias = Noticia::all();
        return view('admin.noticia.index', compact('noticias'));
    }

    public function create(): View
    {
        return view('admin.noticia.create');
    }

    public function store(NoticiaRequest $request): RedirectResponse
    {
        Noticia::create($request->all());
        return redirect()->route('admin.noticia.index')->with('success', 'Noticia creada');
    }

    public function edit(Noticia $noticia): View
    {
        return view('admin.noticia.edit', compact('noticia'));
    }

    public function update(NoticiaRequest $request, Noticia $noticia): RedirectResponse
    {
        $noticia->update($request->all());
        return redirect()->route('admin.noticia.index')->with('success', 'Noticia actualizada');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('admin.noticia.index')->with('danger', 'Noticia eliminada');
    }

    // esta vista la retornamos a la parte de los visitantes o usuarios con perfil guest
    public function show(): View
    {
        $noticias = Noticia::all();
        return view('guests.noticias', compact('noticias'));
    }
}
