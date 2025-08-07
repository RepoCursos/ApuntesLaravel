@extends('layouts.jugadores')
@section('title', 'Clasificaciones')
@section('content')

        <header class="text-center mb-12 fade-in">
            <h1 class="text-5xl font-black uppercase tracking-wider neon-text-purple">Tabla de Posiciones</h1>
        </header>

        <main class="max-w-5xl mx-auto glassmorphism rounded-xl shadow-lg overflow-hidden fade-in" style="animation-delay: 0.2s;">
            <table class="w-full text-left">
                <!-- Encabezado de la tabla -->
                <thead class="bg-black/30 text-gray-300 uppercase text-sm tracking-wider">
                    <tr>
                        <th class="p-4">Pos</th>
                        <th class="p-4">Equipo</th>
                        <th class="p-4 text-center">PJ</th>
                        <th class="p-4 text-center">G</th>
                        <th class="p-4 text-center">E</th>
                        <th class="p-4 text-center">P</th>
                        <th class="p-4 text-center">DG</th>
                        <th class="p-4 text-center font-bold">Pts</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700/50">
                    <!-- Fila 1 -->
                    <tr class="hover:bg-purple-600/30 transition-colors duration-200">
                        <td class="p-4 font-bold">1</td>
                        <td class="p-4 flex items-center gap-3">
                            <img src="https://via.placeholder.com/24x24.png?text=ATM" alt="Logo" class="h-6 w-6">
                            <span class="font-semibold">Atlético de Madrid</span>
                        </td>
                        <td class="p-4 text-center">5</td>
                        <td class="p-4 text-center">4</td>
                        <td class="p-4 text-center">1</td>
                        <td class="p-4 text-center">0</td>
                        <td class="p-4 text-center">+8</td>
                        <td class="p-4 text-center font-bold text-xl text-white">13</td>
                    </tr>
                    <!-- Fila 2 -->
                    <tr class="hover:bg-purple-600/30 transition-colors duration-200">
                        <td class="p-4 font-bold">2</td>
                        <td class="p-4 flex items-center gap-3">
                            <img src="https://via.placeholder.com/24x24.png?text=FCB" alt="Logo" class="h-6 w-6">
                            <span class="font-semibold">FC Barcelona</span>
                        </td>
                        <td class="p-4 text-center">5</td>
                        <td class="p-4 text-center">4</td>
                        <td class="p-4 text-center">0</td>
                        <td class="p-4 text-center">1</td>
                        <td class="p-4 text-center">+7</td>
                        <td class="p-4 text-center font-bold text-xl text-white">12</td>
                    </tr>
                    <!-- Fila 3 -->
                    <tr class="hover:bg-purple-600/30 transition-colors duration-200">
                        <td class="p-4 font-bold">3</td>
                        <td class="p-4 flex items-center gap-3">
                            <img src="https://via.placeholder.com/24x24.png?text=RMA" alt="Logo" class="h-6 w-6">
                            <span class="font-semibold">Real Madrid</span>
                        </td>
                        <td class="p-4 text-center">5</td>
                        <td class="p-4 text-center">3</td>
                        <td class="p-4 text-center">1</td>
                        <td class="p-4 text-center">1</td>
                        <td class="p-4 text-center">+5</td>
                        <td class="p-4 text-center font-bold text-xl text-white">10</td>
                    </tr>
                    <!-- Puedes añadir más filas aquí -->
                </tbody>
            </table>
        </main>
@endsection