@extends('layouts.app')
@section('title', 'Arbitros')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Arbitros' }}
            <a class="btn btn-primary" href="arbitro/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nac.</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Mail</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td>Carlos</td>
            <td>Molina</td>
            <td>8/4/1979</td>
            <td>Millan 3456</td>
            <td>091-265-875</td>
            <td>carlos@gmail.com</td>
            <td class="d-flex">
                <a href="arbitro/edit" class="btn btn-outline-success">
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
