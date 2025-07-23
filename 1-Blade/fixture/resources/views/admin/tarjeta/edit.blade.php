@extends('layouts.app')
@section('title', 'Tarjeta')

@section('content_body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h2>{{ __('Editar') . ' ' . __('Tarjeta') }}</h2>
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
                        <label for="multa" class="col-sm-2 col-form-label">{{ __('Multa') }}</label>
                        <div class="col-sm-10">
                            <input type="number" name="multa" class="form-control" value="{{ old('multa') }}">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-primary" value="{{ __('save') }}">
                        <a href="/layouts/admin/tarjeta" class="btn btn-danger">{{ __('cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
