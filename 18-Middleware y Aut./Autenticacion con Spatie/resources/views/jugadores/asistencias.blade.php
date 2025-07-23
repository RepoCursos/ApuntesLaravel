@extends('layouts.app')

@section('title', 'Jugadores Destacados')

@section('content')
<section class="container">
    <ul class="row nav nav-underline text-center">
        <li class="col nav-item">
          <a class="nav-link text-white" href="/goleadores">Max. Goleadores</a>
        </li>
        <li class="col nav-item">
          <a class="nav-link active text-primary" href="#">Asistencias</a>
        </li>
      </ul>
</section>
    <!-- Tabla de Asistencias -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-xl font-bold mb-4">Máximos Asistidores</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jugador</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Equipo</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Asist.</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach($topAssistants as $assistant) -->

                        <td class="px-4 py-4 font-medium">Carlos Gómez</td>
                        <td class="px-4 py-4">Real Sociedad</td>
                        <td class="px-4 py-4 text-center font-bold">8</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-4 font-medium">Pedro Martínez</td>
                        <td class="px-4 py-4">Deportivo Unido</td>
                        <td class="px-4 py-4 text-center font-bold">7</td>
                    </tr>
                    <!-- @endforeach -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
