@extends('layouts.landing')
@section('title', 'Goleadores')

@section('content')
<section class="container">
    <ul class="row nav nav-underline text-center">
        <li class="col nav-item">
          <a class="nav-link active text-primary" href="#">Max. Goleadores</a>
        </li>
        <li class="col nav-item">
          <a class="nav-link text-white" href="/asistencias">Asistencias</a>
        </li>
      </ul>
</section>
    @component('guests._components.table')
        @slot('title')
            {{ 'Goleadores' }}
        @endslot
        @slot('header')
            <th>Clas.</th>
            <th>Jugador</th>
            <th>Equipo</th>
            <th>Golers</th>
        @endslot
        @slot('detail')
            <td>1</td>
            <td>Jugador A</td>
            <td>Equipo A</td>
            <td>12</td>
        @endslot
    @endcomponent
@endsection
