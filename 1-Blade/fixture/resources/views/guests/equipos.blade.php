@extends('layouts.landing')
@section('title', 'Estadistica Equipo')

@section('content')

    @component('guests._components.table')
        @slot('title')
            {{ 'Estadistica Equipo' }}
            <h4 class="text-white">Nombre equipo</h4>
        @endslot
        @slot('header')
            <th>POS</th>
            <th>Nombre Jugador</th>
            <th>PJ</th>
            <th>GM</th>
            <th>ASI</th>
            <th>T.A</th>
            <th>T.R</th>
            <th>PROM</th>
        @endslot
        @slot('detail')
            <td>DC</td>
            <td>Paulo Fernandez</td>
            <td>8</td>
            <td>1</td>
            <td>1</td>
            <td>20</td>
            <td>10</td>
            <td>9.6</td>
        @endslot
    @endcomponent
@endsection
