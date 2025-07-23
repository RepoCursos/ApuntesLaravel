<nav class="bg-gray-800 text-white shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <img class="h-12" src="/img/logoTorneo.png" alt="Torneos Cup Logo">
                <span class="text-xl font-bold">Torneos Cup</span>
            </div>
        </div>

        <div class="md:flex space-x-6">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-300">Dashboard</a>
            <a href="#" class="hover:text-gray-300">Torneos</a>
            <a href="#" class="hover:text-gray-300">Equipos</a>
            <a href="#" class="hover:text-gray-300">Jugadores</a>
            <a href="#" class="hover:text-gray-300">Partidos</a>
            <a href="#" class="hover:text-gray-300">Noticias</a>
        </div>

        <!-- Perfil de Usuario -->
        <div class="flex items-center space-x-4">
            <div class="relative group">
                <button class="flex items-center gap-3">
                    <img src="https://i.pravatar.cc/40?u=player1" alt="Avatar de usuario" class="w-10 h-10 rounded-full border-2 border-purple-400">
                    <div class="hidden sm:flex flex-col items-start">
                        <span class="font-bold text-white">{{ Auth::user()->name }}</span>
                    </div>
                    <!-- Icono de flecha para el desplegable -->
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Menú Desplegable -->
                <div class="glassmorphism absolute top-full right-0 mt-2 w-48 rounded-lg shadow-xl overflow-hidden
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible
                            transform scale-95 group-hover:scale-100 transition-all duration-200 ease-out">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                    <div class="border-t bg-gray-800"></div>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>