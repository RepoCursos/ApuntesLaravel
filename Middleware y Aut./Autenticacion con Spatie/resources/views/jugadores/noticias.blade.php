<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Torneo Pro Series</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Exo 2', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .glassmorphism {
            background: rgba(10, 10, 20, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .neon-text-purple {
            text-shadow: 0 0 5px rgba(192, 132, 252, 0.8),
                         0 0 10px rgba(192, 132, 252, 0.8),
                         0 0 20px rgba(168, 85, 247, 0.8);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- =========== BARRA DE NAVEGACIÓN FIJA =========== -->
    <header class="glassmorphism sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo / Título del Torneo -->
            <a href="index.html" class="text-2xl font-black uppercase tracking-wider text-white hover:text-purple-300 transition-colors">
                Pro Series
            </a>

            <!-- Menú de Navegación Principal -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="fixture.html" class="text-gray-300 hover:text-white font-semibold transition-colors">Partidos</a>
                <a href="tabla.html" class="text-gray-300 hover:text-white font-semibold transition-colors">Clasificación</a>
                <a href="noticias.html" class="text-white font-bold border-b-2 border-purple-400 pb-1">Noticias</a>
            </nav>

            <!-- Perfil de Usuario -->
            <div class="relative group">
                <button class="flex items-center gap-3">
                    <img src="https://i.pravatar.cc/40?u=player1" alt="Avatar de usuario" class="w-10 h-10 rounded-full border-2 border-purple-400">
                    <div class="hidden sm:flex flex-col items-start">
                        <span class="font-bold text-white">Leonel Messi</span>
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
                    <a href="#" class="block px-4 py-3 text-sm text-gray-200 hover:bg-purple-600/50">Mi Perfil</a>
                    <a href="#" class="block px-4 py-3 text-sm text-gray-200 hover:bg-purple-600/50">Configuración</a>
                    <div class="border-t border-gray-700/50"></div>
                    <a href="#" class="block px-4 py-3 text-sm text-red-400 hover:bg-red-600/50">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>


    <!-- =========== CONTENIDO PRINCIPAL DE LA PÁGINA =========== -->
    <div class="container mx-auto p-4 md:p-8">

        <header class="text-center my-8 md:my-12 fade-in">
            <h1 class="text-5xl font-black uppercase tracking-wider neon-text-purple">Últimas Noticias</h1>
        </header>

        <!-- Contenedor para los artículos de noticias (ideal para tu bucle) -->
          <main class="space-y-10">

            <!-- Verificamos si hay artículos para mostrar -->
            @forelse ($articles as $article)
                
                <!-- Usamos la variable $loop->first para diferenciar el primer elemento -->
                @if ($loop->first)

                    <!-- ================================================== -->
                    <!--     DISEÑO DESTACADO PARA LA PRIMERA NOTICIA     -->
                    <!-- ================================================== -->
                    <a href="{{ route('news.show', $article->slug) }}" class="block group glassmorphism rounded-xl shadow-2xl overflow-hidden p-2 transform hover:scale-102 transition-transform duration-300 fade-in" style="animation-delay: 0.2s;">
                        <div class="flex flex-col md:flex-row gap-6 items-center">
                            <!-- Imagen destacada -->
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full md:w-1/2 h-64 md:h-80 object-cover rounded-lg group-hover:opacity-90 transition-opacity">
                            <!-- Contenido del texto -->
                            <div class="p-4 md:p-2 w-full md:w-1/2">
                                <span class="text-sm uppercase font-bold text-purple-300 tracking-widest">{{ $article->category }}</span>
                                <h2 class="text-3xl lg:text-4xl font-black mt-3 leading-tight group-hover:text-purple-300 transition-colors">{{ $article->title }}</h2>
                                <p class="mt-4 text-gray-300 text-lg">{{ $article->excerpt }}</p>
                                <p class="text-xs text-gray-400 mt-6">Publicado {{ $article->published_at_for_humans }}</p>
                            </div>
                        </div>
                    </a>

                @else

                    <!-- ================================================== -->
                    <!--     DISEÑO ESTÁNDAR PARA EL RESTO DE NOTICIAS    -->
                    <!-- ================================================== -->
                    <a href="{{ route('news.show', $article->slug) }}" class="block group glassmorphism rounded-xl shadow-lg overflow-hidden p-2 transform hover:scale-102 transition-transform duration-300 fade-in" style="animation-delay: '{{ ($loop->index) * 0.2 }}' s;">
                        <div class="flex flex-col sm:flex-row gap-4 items-center">
                            <!-- Imagen -->
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full sm:w-1/3 md:w-1/4 h-48 sm:h-full object-cover rounded-lg">
                            <!-- Contenido -->
                            <div class="p-4 w-full">
                                <span class="text-xs uppercase font-bold text-teal-300 tracking-wider">{{ $article->category }}</span>
                                <h3 class="text-2xl font-bold mt-2 group-hover:text-teal-200 transition-colors">{{ $article->title }}</h3>
                                <p class="text-gray-300 mt-3 text-sm max-w-2xl">{{ $article->excerpt }}</p>
                                <p class="text-xs text-gray-400 mt-4">Publicado {{ $article->published_at_for_humans }}</p>
                            </div>
                        </div>
                    </a>

                @endif

            @empty

                <!-- Mensaje que se muestra si no hay noticias -->
                <div class="glassmorphism rounded-xl p-8 text-center fade-in">
                    <h3 class="text-2xl font-bold text-gray-300">No hay noticias por el momento</h3>
                    <p class="text-gray-400 mt-2">Vuelve más tarde para enterarte de las últimas novedades del torneo.</p>
                </div>

            @endforelse

        </main>
    </div>

</body>
</html>

