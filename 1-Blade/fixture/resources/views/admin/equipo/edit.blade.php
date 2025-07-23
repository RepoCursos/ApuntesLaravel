@extends('layouts.app')
@section('title', 'Arbitros')

@section('content_body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <h2>{{ __('Editar') . ' ' . __('Equipo') }}</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 row">
                    <label for="file" class="col-sm-2 col-form-label">{{ __('Escudo') }}</label>
                    <div class="col-sm-10">
                        <input type="file" name="urlfoto" class="form-control" placeholder="File" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inscripcion" class="col-sm-2 col-form-label">{{ __('Inscripción') }}</label>
                    <div class="col-sm-10">
                        <input type="number" name="inscripcion" class="form-control" value="{{ old('inscripcion') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="estado" class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                    <div class="col-sm-10">
                        <select name="estado" id="estado" class="form-select" >
                            <option selected>Seleccione el estado</option>
                            <option value="1">Pendiente</option>
                            <option value="2">Pago</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="torneo_id" class="col-sm-2 col-form-label">{{ __('Torneo') }}</label>
                    <div class="col-sm-10">
                        <select name="torneo_id" id="torneo_id" class="form-select" >
                            <option selected disabled>Seleccione el torneo</option>
                            
                                <option value="torneo_id">torneo_id</option>
                           
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                    <a href="/layouts/admin/equipo" class="btn btn-danger">{{ __('cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
