<header class="glassmorphism sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo / Título del Torneo -->
        <a href="index.html"
            class="text-2xl font-black uppercase tracking-wider text-white hover:text-purple-300 transition-colors">
            Pro Series
        </a>

        <!-- Menú de Navegación Principal -->
        <nav class="hidden md:flex items-center gap-6">
            <a href="{{ route('jugadores.partidos') }}"
                class="text-gray-300 hover:text-white font-semibold transition-colors">Partidos</a>
            <a href="{{ route('jugadores.clasificaciones') }}"
                class="text-gray-300 hover:text-white font-semibold transition-colors">Clasificación</a>
            <a href="noticias.html" class="text-white font-bold border-b-2 border-purple-400 pb-1">Noticias</a>
        </nav>

        <!-- Perfil de Usuario -->
        <div class="relative group">
            <button class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/40?u=player1" alt="Avatar de usuario"
                    class="w-10 h-10 rounded-full border-2 border-purple-400">
                <div class="hidden sm:flex flex-col items-start">
                    <span class="font-bold text-white">{{ Auth::user()->name }}</span>
                </div>
                <!-- Icono de flecha para el desplegable -->
                <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-transform duration-300 group-hover:rotate-180"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <!-- Menú Desplegable -->
            <div
                class="glassmorphism absolute top-full right-0 mt-2 w-48 rounded-lg shadow-xl overflow-hidden
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible
                            transform scale-95 group-hover:scale-100 transition-all duration-200 ease-out">
                <a href="{{ route('jugadores.perfil.edit') }}" class="block px-4 py-3 text-sm text-gray-200 hover:bg-purple-600/50">Mi Perfil</a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block px-4 py-3 text-sm text-red-400 hover:bg-red-600/50">Cerrar Sesión</a>
                </form>
            </div>
        </div>
    </div>
</header>
