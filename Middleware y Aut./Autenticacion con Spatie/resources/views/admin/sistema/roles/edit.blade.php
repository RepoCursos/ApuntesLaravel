<x-app-layout>
    <div>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm justify-between p-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Roles y Permisos</h1>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
                <!-- Permissions Section (Hidden by default) -->
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Editar Rol</h2>
                    </div>

                    <form action="{{ route('admin.sistema.roles.update', $role->id) }}" method="POST" id="userForm" class="space-y-4">
                        @method('PUT')
                        @csrf
                        <!-- Información básica -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre del rol</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" name="name" value="{{$role->name}}"
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                                </div>
                                <div id="documentoError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="mt-4 flex">
                            <a href="{{ route('admin.sistema.roles.index') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md mr-2 transition duration-200">
                                <i class="fas fa-times mr-2"></i>Cancelar
                            </a>
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-200">
                                <i class="fas fa-save mr-2"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>