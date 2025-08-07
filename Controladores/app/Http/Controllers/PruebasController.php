<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function procesaForm2(Request $request, $usuario)
    {
        dd($request->all());
    }

    public function redirect()
    {
        return view('vista', ['variable' => 'valor']);
    }

    public function peticion($usuario, $edad)
    {
        return "ID Usuario: $usuario con edad $edad";
    }

    public function conRequest(Request $request, $usuario)
    {
        return "$request->queryString y el idUsuario: $usuario";
    }

    public function solicitud($edad = 1, $sexo = 'M', $nombre)
    {
        return "Edad: $edad, Sexo: $sexo, Nombre: $nombre";
    }

    public function miPeticion(Request $request)
    {
        /** Para chequear de que ruta llega la peticion */

        if ($request->route()->named('mi.peticion')) {

            /** La peticion viene de la ruta nombrada "mi.peticion" que esperabamos */
            $nombreRuta = $request->route()->getName(); //el metodo nos debuelve el nombre de la ruta

            return "Si viene la peticion de la ruta que esperabamos $nombreRuta";
        } else {

            /** Si entor aqui entonces no viene de la ruta que esperabamos */
            return "Peticion incorrecta";
        }
    }

    public function tenis()
    {
        return "Clases de tenis";
    }
    public function zapato_formal()
    {
        return "Zapatos elegantes";
    }
    public function botas()
    {
        return "Botas para vestir";
    }

    /* Esta es una representacion del Route Model Binding */
    // Si estamos seguros de recivir un id del modelo, entoces al indicar el nombre del mismo como parametro
    // automaticamente laravel lo busca en la base de datos y lo inyecta en el conrolador recuperando el modelo completo,
    // dejando mas limpio el codigo  
    public function video(Request $request, $video)
    {
        $video = Video::FindOrFail($video);
        dd($video);
    }

    // Este ejemplo es cuando usamos Route Model Binding con el metodo 'getRouteKeyName' en el modelo, en este caso el modelo 
    // busca el registro por la columna 'pataforma' en lugar del id, ACLARACION: La columna debe ser unica 
    public function video2(Video $video)
    {
        dd($video);
    }
}
