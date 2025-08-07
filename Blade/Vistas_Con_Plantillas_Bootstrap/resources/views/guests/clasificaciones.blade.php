@extends('layouts.landing')
@section('title', 'Clasificaciones')

@section('content')
    <!-- Para llamar y pintar la vista del componente le indicamos en donde se encuentra -->
    <!-- ubicacion del componente -->
    @component('guests._components.table')
    <!-- en este slot llamamos a la variable $title para idicarle que mostrar en este caso el titulo -->
        @slot('title')
            {{ 'Clasificaciones' }}
        @endslot
        <!-- en este slot llamamos a la variable $header para idicarle que titulo de cabecera tendra cada columna -->
        @slot('header')
            <th>POS</th>
            <th>Equipo</th>
            <th>P J</th>
            <th>P G</th>
            <th>P E</th>
            <th>P P</th>
            <th>G F</th>
            <th>G C</th>
            <th>S G</th>
            <th>PTS</th>
        @endslot
        <!-- en este slot llamamos a la variable $detail para idicarle que el detalle de cada columna -->
        @slot('detail')
            <td>1</td>
            <td>Equipo A</td>
            <td>10</td>
            <td>8</td>
            <td>1</td>
            <td>1</td>
            <td>20</td>
            <td>10</td>
            <td>10</td>
            <td>25</td>
        @endslot
    @endcomponent
@endsection
