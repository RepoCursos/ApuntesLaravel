<x-app-layout>
    <style>
        .input-error {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .success-message {
            animation: fadeInOut 3s ease-in-out forwards;
        }
    </style>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Registrar Usuario</h1>
    </div>

    <div id="successMessage"
        class="success-message hidden mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
    </div>

    <form action="{{ route('usuario.store') }}" method="POST" id="userForm" class="space-y-4">
        @csrf
        <!-- Foto de perfil -->
        <div class="mb-4">
            <label for="file_uri" class="block text-sm font-medium text-gray-700 mb-2">Foto de perfil</label>
            <div class="flex items-center">
                <div class="mr-4">
                    <img id="preview" class="w-16 h-16 rounded-full object-cover border-2 border-gray-300"
                        src="" alt="">
                </div>
                <div class="flex justify-center">
                    <input type="file" id="file_uri" name="file_uri" accept="image/*" class="hidden"
                        onchange="previewImage(this)">
                    <label for="file_uri"
                        class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <i class="fas fa-upload mr-1"></i> Subir imagen
                    </label>
                    <div class="text-xs/5 text-gray-600 px-2 py-2">
                        PNG, JPG menor a 10MB
                    </div>
                    <div id="photoError" class="error-message"></div>
                </div>
            </div>
        </div>

        <!-- Información básica -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="documento" class="block text-sm font-medium text-gray-700 mb-1">Documento Identidad</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" id="documento" name="documento"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="123456789">
                </div>
                <div id="documentoError" class="error-message"></div>
            </div>
            <div>
                <label for="fecha_nac" class="block text-sm font-medium text-gray-700 mb-1">Fecha de nacimiento</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-calendar text-gray-400"></i>
                    </div>
                    <input type="date" id="birthdate" name="fecha_nac"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                </div>
                <div id="birthdateError" class="error-message"></div>
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" id="name" name="name"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="Juan">
                </div>
                <div id="nameError" class="error-message"></div>
            </div>
            <div>
                <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" id="apellido" name="apellido"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="Pérez">
                </div>
                <div id="usernameError" class="error-message"></div>
            </div>
            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                    </div>
                    <input type="text" id="address" name="direccion"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="Calle, número, ciudad">
                </div>
                <div id="addressError" class="error-message"></div>
            </div>
            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-phone text-gray-400"></i>
                    </div>
                    <input type="tel" id="phone" name="telefono"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="099 123 567">
                </div>
                <div id="phoneError" class="error-message"></div>
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                <select id="role" name="role"
                    class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <option value="" selected>Seleccionar rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <div id="roleError" class="error-message"></div>
            </div>
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select id="status" name="estado"
                    class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <option value="activo" selected>Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" id="email" name="email"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="correo@ejemplo.com">
                </div>
                <div id="emailError" class="error-message"></div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" id="password" name="password"
                        class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                        placeholder="••••••••">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i class="fas fa-eye-slash toggle-password text-gray-400 hover:text-gray-600"
                            onclick="togglePassword('password')"></i>
                    </div>
                </div>
                <div id="passwordError" class="error-message"></div>
                <div class="mt-1 text-xs text-gray-500">
                    La contraseña debe tener al menos 8 caracteres, incluir números y letras.
                </div>
            </div>
            <div id="termsError" class="error-message"></div>
        </div>
        <div class="mt-4 flex justify-center">
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


    <script>

        function showError(elementId, message) {
            document.getElementById(elementId).textContent = message;
        }

        function clearErrors() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(el => el.textContent = '');

            const errorInputs = document.querySelectorAll('.input-error');
            errorInputs.forEach(el => el.classList.remove('input-error'));
        }

        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function showSuccess(message) {
            const successDiv = document.getElementById('successMessage');
            successDiv.textContent = message;
            successDiv.classList.remove('hidden');

            setTimeout(() => {
                successDiv.classList.add('hidden');
            }, 3000);
        }
    </script>

</x-app-layout>
