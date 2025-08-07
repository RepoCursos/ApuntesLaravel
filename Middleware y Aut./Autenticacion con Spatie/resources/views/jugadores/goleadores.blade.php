@extends('layouts.app')

@section('title', 'Jugadores Destacados')

@section('content')
<section class="container">
    <ul class="row nav nav-underline text-center">
        <li class="col nav-item">
          <a class="nav-link text-white" href="#">Max. Goleadores</a>
        </li>
        <li class="col nav-item">
          <a class="nav-link active text-primary" href="/asistencias">Asistencias</a>
        </li>
      </ul>
</section>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Tabla de Goleadores -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-xl font-bold mb-4">Máximos Goleadores</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jugador</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Equipo</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Goles</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach($topScorers as $scorer) -->
                    <tr>
                        <td class="px-4 py-4 font-medium">Juan Pérez</td>
                        <td class="px-4 py-4">Real Sociedad</td>
                        <td class="px-4 py-4 text-center font-bold">12</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-4 font-medium">Luis Fernández</td>
                        <td class="px-4 py-4">Atlético Capital</td>
                        <td class="px-4 py-4 text-center font-bold">10</td>
                    </tr>
                    <!-- @endforeach -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
