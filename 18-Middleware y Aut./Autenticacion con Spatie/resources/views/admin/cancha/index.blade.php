<x-app-layout>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex p-4">
                <h3 class="text-lg font-semibold text-gray-800 py-1 px-3">CANCHA</h3>
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-3 bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100">
                        <i class="fas fa-plus-circle mr-2"></i> Agregar Nuevo
                    </a>
                </div>
            </div>
        </div>
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
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Costo por Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cancha 1</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">$ 1200</div>
                            </td>
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
</x-app-layout>