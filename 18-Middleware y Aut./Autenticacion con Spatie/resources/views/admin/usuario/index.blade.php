<x-app-layout>
    <div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm justify-between p-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Administracion de Usuarios</h1>
                </div>
            </header>
            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Lista de Usuarios</h2>
                        <a href="{{ route('usuario.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                            <i class="fas fa-plus mr-2"></i> Nuevo Usuario
                        </a>
                    </div>
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Foto</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Documento</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombre</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Apellido</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Teléfono</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rol</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($usuarios as $usuario)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                                    <i class="fas fa-user-tie"></i>{{ $usuario->file_uri }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $usuario->documento }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $usuario->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $usuario->apellido }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $usuario->telefono }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $usuario->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $usuario->estado }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @foreach ($usuario->roles as $rol)
                                                    {{ $rol->name }}
                                                @endforeach
                                            </td>
                                            <!-- Botones -->
                                            <td class="px-4 py-6 whitespace-nowrap text-sm font-medium flex">
                                                <a href=""
                                                    class="text-blue-600 hover:text-blue-900 mr-3">Editar</a>
                                                @can('Eliminar')
                                                    <form action="{{ route('usuario.destroy', $usuario) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="text-red-600 hover:text-red-900">Eliminar</button>
                                                    </form>
                                                @endcan

                                            </td>
                                        </tr>
                                    @empty
                                        <h2 class="text-lg font-semibold text-gray-800">No hay usuarios ingresados</h2>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
