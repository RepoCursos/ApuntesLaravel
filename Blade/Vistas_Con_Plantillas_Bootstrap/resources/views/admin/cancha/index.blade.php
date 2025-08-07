@extends('layouts.app')
@section('title', 'Canchas')

@section('content_body')
    @component('admin._components.table')
        @slot('title')
            {{ 'Canchas' }}
            <a class="btn btn-primary" href="/layouts/admin/cancha/create" role="button">Nuevo</a>
        @endslot
        @slot('header')
            <th>#</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td>Cancha 1</td>
            <td>Libre</td>
            <td class="d-flex">
                <a href="/layouts/admin/cancha/edit" class="btn btn-outline-success">
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
