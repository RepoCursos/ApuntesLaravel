@extends('layouts.app')
@section('title', 'Tarjetas')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Tarjetas' }}
            <a class="btn btn-primary" href="tarjeta/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>#</th>
            <th>Nombre</th>
            <th>Multa</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td>Amarilla</td>
            <td>$ 50</td>
            <td class="d-flex">
                <a href="tarjeta/edit" class="btn btn-outline-success">
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
