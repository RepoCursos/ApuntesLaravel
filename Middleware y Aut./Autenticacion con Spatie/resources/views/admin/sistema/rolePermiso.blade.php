<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Asignar permisos al rol: {{$role->name}}</h2>
                <p class="text-gray-600">Selecciona los permisos que deseas asignar a este rol</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Buscar permisos:</label>
            <div class="relative">
                <input type="text" placeholder="Escribe para buscar..." class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
            </div>
        </div>

        {!! Form::model($role, ['route' => ['admin.sistema.rolePermiso.update', $role], 'method'=>'put']) !!}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($permisos as $permiso)
            <div class="permission-card bg-white border rounded-lg p-4 transition duration-200">
                <div class="flex items-center justify-between mb-3">
                    <label class="inline-flex items-center cursor-pointer">
                        {!! Form::checkbox('permisos[]', $permiso->id, $role->hasPermissionTo($permiso->id) ? : false,
                        ['class'=>'form-checkbox h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500'] ) !!}
                        <h3 class="font-medium text-gray-800 p-2">{{ $permiso->name }}</h3>
                    </label>
                </div>
                <p class="text-sm text-gray-600">Permite crear nuevos usuarios en el sistema</p>
            </div>
            @endforeach
        </div>
        <div class="mt-8 flex justify-end">
            <a href="{{ route('admin.sistema.roles.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md mr-2 transition duration-200">
                <i class="fas fa-times mr-2"></i>Cancelar
            </a>

            <div class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-200">
                <i class="fas fa-save mr-2"></i>{!! Form::submit('Guardar Cambios') !!}
            </div>
        </div>
        {!! Form::close() !!}

</x-app-layout>