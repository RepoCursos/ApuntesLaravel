<div class="sidebar w-64 bg-gray-700 text-white min-h-screen hidden md:block">
    <!-- Admin Sidebar -->
    <div class="p-4 border-b border-gray-600">
        <h2 class="text-xl font-bold">Panel de Administración</h2>
    </div>
    <nav class="p-4">

        <div class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 bg-gray-600 rounded-md">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>

            <div class="mt-4">
                <p class="text-xs uppercase text-gray-400 mb-2">Gestión</p>
                <a href="#" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-trophy mr-2"></i> Torneos
                </a>
                <a href="#" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-users mr-2"></i> Equipos
                </a>
                <a href="#" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-user mr-2"></i> Jugadores
                </a>
                <a href="#" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-calendar-alt mr-2"></i> Partidos
                </a>
                <a href="#" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-fw  fa-user-tie"></i> Árbitros
                </a>
                <a href="{{ route('admin.cancha.index') }}" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-map-marked-alt mr-2"></i> Canchas
                </a>
            </div>

            <div class="mt-4">
                <p class="text-xs uppercase text-gray-400 mb-2">Contenido</p>
                <a href="#" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-newspaper mr-2"></i> Noticias
                </a>
            </div>

            <div class="mt-4">
                <p class="text-xs uppercase text-gray-400 mb-2">Configuración</p>
                <a href="{{ route('usuario.index') }}" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                    <i class="fas fa-users-cog mr-2"></i> Usuarios
                </a>
                @role('Administrador')
                    <!-- Dropdown Button -->
                    <button id="dropdownButton" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                        <i class="fas fa-cog mr-2"></i> Configuración
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu"
                        class="hidden absolute  mt-2 w-48 bg-gray-800 text-white rounded-md shadow-lg z-50">
                        <a href="{{ route('admin.sistema.roles.index') }}" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                            Roles
                        </a>
                        <a href="{{ route('admin.sistema.permisos.index') }}" class="block py-2 px-3 hover:bg-gray-600 rounded-md">
                            Permisos
                        </a>
                    </div>
                    @endrole
                </div>
            
        </div>
    </nav>
</div>
<!-- Script to toggle dropdown -->
<script>
    const button = document.getElementById('dropdownButton');
    const menu = document.getElementById('dropdownMenu');

    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Optional: close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
