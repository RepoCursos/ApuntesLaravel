<?php
/*
namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosConMiddlewareController extends Controller
{
    public function __construct()
    {
        //Middleware comun para verificar la autenticacion
        //$this->middleware(['auth', 'verified']); 

        //Middleware only aplica a las vista show, o con un arreglo a las vistas que 
        //$this->middleware(['auth', 'verified'])->only(['show', 'edit']);

        //Middleware except aplica a todas las vista, exepto a las vistas que indiquemos en el arreglo
        //$this->middleware(['auth', 'verified'])->except(['edit']);
        
        //creamos un middleware para verificar la edad, lo declaramos en el Kernel.php dentro de la carpeta Http
        //$this->middleware('verifica.edad');
    }

    public function show(Video $video)
    {
        dd($video);
    }

    public function show2(Video $video)
    {
        return "Show 2, $video->video";
    }

    public function edit(Video $video)
    {
        return "Editando video, $video->video";
    }

}
