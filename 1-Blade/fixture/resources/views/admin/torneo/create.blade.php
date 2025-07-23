@extends('layouts.app')
@section('title', 'Torneo')

@section('content_body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h2>{{ __('Nuevo') . ' ' . __('Torneo') }}</h2>
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
                        <label for="tipo" class="col-sm-2 col-form-label">{{ __('Tipo') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="tipo" class="form-control" value="{{ old('tipo') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="face" class="col-sm-2 col-form-label">{{ __('Face') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="face" class="form-control" value="{{ old('face') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inscripcion" class="col-sm-2 col-form-label">{{ __('Inscripción') }}</label>
                        <div class="col-sm-10">
                            <input type="number" name="inscripcion" class="form-control" value="{{ old('inscripcion') }}">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                        <a href="/layouts/admin/torneo" class="btn btn-danger">{{ __('cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
