@extends('layouts.app')
@section('title', 'Noticias')

@section('content_body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h2>{{ __('Editar') . ' ' . __('Noticias') }}</h2>
                <form method="POST" action="" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <label for="fecha" class="col-sm-2 col-form-label">{{ __('Fecha') }}</label>
                        <div class="col-sm-10">
                            <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('Titulo') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-2 col-form-label">Descripción</label>
                        <textarea class="form-control" id="detalle" rows="3"></textarea>
                      </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                        <a href="/layouts/admin/noticia" class="btn btn-danger">{{ __('cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
