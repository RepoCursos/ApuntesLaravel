<x-app-layout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard de Administración</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-blue-100 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-blue-800">Equipos registrados</p>
                        <p class="text-2xl font-bold text-blue-900">12</p>
                    </div>
                    <i class="fas fa-users text-blue-600 text-2xl"></i>
                </div>
            </div>

            <div class="bg-green-100 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-green-800">Jugadores registrados</p>
                        <p class="text-2xl font-bold text-green-900">180</p>
                    </div>
                    <i class="fas fa-user text-green-600 text-2xl"></i>
                </div>
            </div>

            <div class="bg-yellow-100 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-yellow-800">Partidos jugados</p>
                        <p class="text-2xl font-bold text-yellow-900">45</p>
                    </div>
                    <i class="fas fa-calendar-alt text-yellow-600 text-2xl"></i>
                </div>
            </div>

            <div class="bg-purple-100 rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-purple-800">Noticias publicadas</p>
                        <p class="text-2xl font-bold text-purple-900">8</p>
                    </div>
                    <i class="fas fa-newspaper text-purple-600 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Recent Matches -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Próximos Partidos</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha/Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Partido</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cancha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Árbitro</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20/06/2023 - 18:00</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Los Leones vs Tiburones</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Estadio Central</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Roberto Martínez</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900 mr-2">Editar</button>
                                <button class="text-red-600 hover:text-red-900">Eliminar</button>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Agregar Nuevo</h3>
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-3 bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100">
                        <i class="fas fa-plus-circle mr-2"></i> Nuevo Torneo
                    </a>
                    <a href="#" class="block py-2 px-3 bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100">
                        <i class="fas fa-plus-circle mr-2"></i> Nuevo Equipo
                    </a>
                    <a href="#" class="block py-2 px-3 bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100">
                        <i class="fas fa-plus-circle mr-2"></i> Nuevo Jugador
                    </a>
                    <a href="#" class="block py-2 px-3 bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100">
                        <i class="fas fa-plus-circle mr-2"></i> Nuevo Partido
                    </a>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Reportes</h3>
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-3 bg-green-50 text-green-700 rounded-md hover:bg-green-100">
                        <i class="fas fa-file-alt mr-2"></i> Reporte de Clasificación
                    </a>
                    <a href="#" class="block py-2 px-3 bg-green-50 text-green-700 rounded-md hover:bg-green-100">
                        <i class="fas fa-file-alt mr-2"></i> Reporte de Jugadores
                    </a>
                    <a href="#" class="block py-2 px-3 bg-green-50 text-green-700 rounded-md hover:bg-green-100">
                        <i class="fas fa-file-alt mr-2"></i> Reporte de Partidos
                    </a>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Configuración</h3>
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-3 bg-purple-50 text-purple-700 rounded-md hover:bg-purple-100">
                        <i class="fas fa-cog mr-2"></i> Configuración General
                    </a>
                    <a href="#" class="block py-2 px-3 bg-purple-50 text-purple-700 rounded-md hover:bg-purple-100">
                        <i class="fas fa-users-cog mr-2"></i> Administrar Usuarios
                    </a>
                    <a href="#" class="block py-2 px-3 bg-purple-50 text-purple-700 rounded-md hover:bg-purple-100">
                        <i class="fas fa-tags mr-2"></i> Tarjetas y Costos
                    </a>
                </div>
            </div>
        </div>
</x-app-layout>