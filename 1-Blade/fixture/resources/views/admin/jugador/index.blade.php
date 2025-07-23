@extends('layouts.app')
@section('title', 'Jugadores')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Jugadores' }}
            <a class="btn btn-primary" href="jugador/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nac.</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Mail</th>
            <th>Posición</th>
            <th>Nº Camiseta</th>
            <th>Equipo</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td>Paulo</td>
            <td>Fernández</td>
            <td>26/2/1981</td>
            <td>Rep. Dominicana 2980 apto 5</td>
            <td>091-513-442</td>
            <td>pfernandez1626@gmail.com</td>
            <td>MP</td>
            <td>10</td>
            <td>Manchester United</td>
            <td class="d-flex">
                <a href="jugador/edit" class="btn btn-outline-success">
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
