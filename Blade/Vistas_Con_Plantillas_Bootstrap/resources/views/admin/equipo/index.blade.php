@extends('layouts.app')
@section('title', 'Asistencias')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Equipos' }}
            <a class="btn btn-primary" href="equipo/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>#</th>
            <th>Escudo</th>
            <th>Nombre</th>
            <th>Inscripción</th>
            <th>Estado</th>
            <th>Torneo</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td><img src="/img/Uruguay.png" alt="Imagen Escudo" style="width: 40px; height: 35px"></td>
            <td>Manchester United</td>
            <td>$ 850</td>
            <td>Pendiente</td>
            <td>Premier League</td>
            <td class="d-flex">
                <a href="equipo/edit" class="btn btn-outline-success">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        @endslot
    @endcomponent
@endsection
