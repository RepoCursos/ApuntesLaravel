@extends('layouts.app')
@section('title', 'Jugador')

@section('content_body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <h2>{{ __('Editar') . ' ' . __('Jugador') }}</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="apellido" class="col-sm-2 col-form-label">{{ __('Apellido') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fech_nas" class="col-sm-2 col-form-label">{{ __('Fecha Nac.') }}</label>
                    <div class="col-sm-10">
                        <input type="date" name="fech_nas" class="form-control" value="{{ old('fech_nas') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="direccion" class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form-label">{{ __('Teléfono') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="mail" class="col-sm-2 col-form-label">{{ __('Mail') }}</label>
                    <div class="col-sm-10">
                        <input type="email" name="mail" class="form-control" value="{{ old('mail') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pos" class="col-sm-2 col-form-label">{{ __('Posición') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="pos" class="form-control" value="{{ old('pos') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="num_cam" class="col-sm-2 col-form-label">{{ __('Nº Camiseta') }}</label>
                    <div class="col-sm-10">
                        <input type="text" name="num_cam" class="form-control" value="{{ old('num_cam') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="equipo_id" class="col-sm-2 col-form-label">{{ __('Equipo') }}</label>
                    <div class="col-sm-10">
                        <select name="equipo_id" id="equipo_id" class="form-select" >
                            <option selected disabled>Seleccione el torneo</option>
                            
                                <option value="equipo_id">torneo_id</option>
                           
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                    <a href="/layouts/admin/jugador" class="btn btn-danger">{{ __('cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
