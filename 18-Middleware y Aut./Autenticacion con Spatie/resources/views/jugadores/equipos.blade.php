@extends('layouts.app')

@section('title', 'Estadísticas de Jugadores')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="text-2xl font-bold mb-4">Estadísticas de Jugadores</h1>

        <!-- Selector de equipo -->
        <form action="{{ route('guest.player-stats') }}" method="GET" class="mb-6">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Seleccionar equipo:</label>
            <select name="team_id" id="team_id" onchange="this.form.submit()" class="mt-1 block w-full md:w-1/3 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option>-- Elige un equipo --</option>
                {{-- @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ request('team_id') == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach --}}
                <option value="1" selected>Real Sociedad</option>
                <option value="2">Atlético Capital</option>
            </select>
        </form>

        {{-- @if ($selectedTeam) --}}
        <h2 class="text-xl font-semibold mb-4">Jugadores de Real Sociedad</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posición</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jugador</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">PJ</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Goles</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Asist.</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">TA</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">TR</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Bucle con @foreach ($selectedTeam->players as $player) --}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Delantero</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Juan Pérez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">12</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">5</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">0</td>
                    </tr>
                     <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">Mediocampista</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Carlos Gómez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">9</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">8</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- @endif --}}
    </div>
</div>
@endsection
