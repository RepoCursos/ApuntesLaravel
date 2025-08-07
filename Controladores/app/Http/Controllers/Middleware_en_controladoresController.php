<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosConMiddlewareController extends Controller
{
//Ejemplos comunes
    public function __construct()
    {
        //Middleware comun para verificar la autenticacion
        $this->middleware(['auth', 'verified']);

        //Middleware only aplica a las vista que ingresemos en el arreglo, only => incluye
        $this->middleware(['auth', 'verified'])->only(['show', 'edit']);

        //Middleware except aplica a las vista que ingresemos en el arreglo except => escluye
        $this->middleware(['auth', 'verified'])->except(['edit', 'create']);

        //creamos un middleware para verificar la edad, lo declaramos en el Kernel.php dentro de la carpeta Http
        $this->middleware('verifica.edad');
    }

//los metodos no interesan en esta ocasion
    public function index(): View
    {
        //Codigo
    }

    public function create(): View
    {
        //Codigo
    }

    public function store(VideoRequest $request): RedirectResponse
    {
        //Codigo
    }

    public function show(Video $video)
    {
        //Codigo
    }

    public function edit(Video $video): View
    {
        //Codigo
    }

    public function update(VideoRequest $request, Video $video): RedirectResponse
    {
        //Codigo
    }

    public function destroy(Video $video)
    {
        //Codigo
    }
}
