@extends('layouts.app')
@section('title', 'Tornoes')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Tornoes' }}
            <a class="btn btn-primary" href="torneo/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>#</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Face</th>
            <th>Inscripción</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td>Premier League</td>
            <th>Liga</th>
            <td>-</td>
            <td>$ 850</td>
            <td class="d-flex">
                <a href="torneo/edit" class="btn btn-outline-success">
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
