<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de torneos oficiales de AUF 2025. Compite en ligas y copas, gana premios y demuestra que eres el mejor jugador.">
    <meta name="keywords" content="Torneos Cup, torneos, fútbol 5, fútbol Masculino, fútbol Femenino, fútbol Adolecentes, fútbol amateur">
    <meta name="author" content="Torneos Cup">
    <title>Torneos Cup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Orbitron:wght@500;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }

        .title-font {
            font-family: 'Orbitron', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        }

        .game-card {
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }

        .game-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 255, 255, 0.1), 0 10px 10px -5px rgba(0, 255, 255, 0.04);
        }

        .glow-effect {
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 255, 255, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(0, 255, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 255, 255, 0);
            }
        }

        .stadium-bg {
            background-image: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        .stadium-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body class="antialiased">
    <!-- Navigation -->
    <nav class="bg-black/90 backdrop-blur-md sticky top-0 z-50 border-b border-cyan-500/20">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Dashboard
                    </a>

                    @else
                    <a href="{{ route('login') }}" class="flex items-center -mt-2 px-2 py-1 bg-cyan-800 hover:bg-cyan-600 rounded-md text-white text-sm font-medium">
                        Ingresar
                    </a>
                    @endauth
                </div>
            </div>
        </div>
        @endif
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-10" src="/img/logoTorneo.png" alt="Torneos Cup Logo">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#" class="text-cyan-400 px-3 py-2 rounded-md text-sm font-medium">Inicio</a>
                            <a href="#" class="text-gray-300 hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium">Torneos</a>
                            <a href="#" class="text-gray-300 hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium">Clasificación</a>
                            <a href="#" class="text-gray-300 hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium">Premios</a>
                            <a href="#" class="text-gray-300 hover:text-cyan-400 px-3 py-2 rounded-md text-sm font-medium">Reglas</a>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
                <a href="#" class="block text-cyan-400 py-2 text-sm font-medium">Inicio</a>
                <a href="#" class="block text-gray-300 hover:text-cyan-400 py-2 text-sm font-medium">Torneos</a>
                <a href="#" class="block text-gray-300 hover:text-cyan-400 py-2 text-sm font-medium">Clasificación</a>
                <a href="#" class="block text-gray-300 hover:text-cyan-400 py-2 text-sm font-medium">Premios</a>
                <a href="#" class="block text-gray-300 hover:text-cyan-400 py-2 text-sm font-medium">Reglas</a>
                @auth
                <a href="{{ url('/dashboard') }}" class="block text-gray-300 hover:text-cyan-400 py-2 text-sm font-medium">Dashboard</a>
                @else
                
                <a href="{{ route('login') }}" class="block px-2 py-2 bg-cyan-800 hover:bg-cyan-500 rounded-md text-center text-white text-sm font-medium">Ingresar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="stadium-bg relative">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="title-font text-4xl md:text-6xl font-extrabold tracking-tight mb-6">
                    <span class="text-white">TORNEOS OFICIALES</span>
                    <span class="text-cyan-400 block mt-2">Torneos Cup</span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-gray-300">
                    Compite contra los mejores jugadores en torneos emocionantes con premios exclusivos.
                </p>
                <div class="mt-10 flex justify-center gap-4">
                    <a href="#" class="pulse-animation inline-flex items-center px-8 py-4 border border-transparent text-base font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700">
                        <i class="fas fa-list-ol mr-2"></i> Ver torneos activos
                    </a>
                    <a href="#" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-medium rounded-md text-cyan-400 bg-cyan-900/30 hover:bg-cyan-900/50 border-cyan-400/20">
                        <i class="fas fa-trophy mr-2"></i> Premios
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-black py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="title-font text-3xl md:text-4xl font-bold text-white mb-2">
                    EXPERIENCIA <span class="text-cyan-400">COMPETITIVA</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">
                    Todo lo que necesitas para demostrar que eres el mejor en la cancha
                </p>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Feature 1 -->
                    <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800 hover:border-cyan-500/50">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-900/30 text-cyan-400">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-white">Torneos Diarios</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Compite en torneos cortos que se renuevan cada día con diferentes formatos y premios.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800 hover:border-cyan-500/50">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-900/30 text-cyan-400">
                            <i class="fas fa-trophy text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-white">Ligas Estacionales</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Participa en ligas de 4 semanas de duración con tablas de clasificación y premios por posición.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800 hover:border-cyan-500/50">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-900/30 text-cyan-400">
                            <i class="fas fa-award text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-white">Premios Exclusivos</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Gana medallas, packs exclusivos y hasta premios especiales.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800 hover:border-cyan-500/50">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-900/30 text-cyan-400">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-white">Estadísticas Detalladas</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Accede a análisis completos de tu rendimiento: goles, posesión, tiros y más.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Active Tournaments -->
    <section class="bg-gradient-to-b from-gray-900 to-black py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="title-font text-3xl md:text-4xl font-bold text-white mb-2">
                    PROXIMOS <span class="text-cyan-400">TORNEOS</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">
                    Únete ahora a estas competencias emocionantes
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tournament 1 -->
                <div class="game-card bg-gray-900 rounded-xl overflow-hidden border border-gray-800 hover:border-cyan-500/50">
                    <div class="relative">
                        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Champions League Tournament">
                        <div class="absolute top-4 right-4 bg-cyan-600 text-white text-xs font-bold px-2 py-1 rounded">
                            <i class="fas fa-users mr-1"></i> 12/25 Equipos
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white">Champions League</h3>
                            <span class="bg-gray-800 text-cyan-400 text-xs font-medium px-2 py-1 rounded">Masculino</span>
                        </div>
                        <div class="mt-4 flex items-center text-gray-400 text-sm">
                            <i class="fas fa-calendar-day mr-2"></i>
                            <span>Inicia: 15/07 - Finaliza: 10/08</span>
                        </div>
                        <div class="mt-2 flex items-center text-gray-400 text-sm">
                            <i class="fas fa-trophy mr-2"></i>
                            <span>Premio: $ 50,000 + Ultimate Pack</span>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-800 flex justify-between items-center">
                            <span class="text-cyan-400 font-medium">Entrada: $ 5,000</span>
                            <button class="glow-effect bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded text-sm font-medium">
                                Unirse
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tournament 2 -->
                <div class="game-card bg-gray-900 rounded-xl overflow-hidden border border-gray-800 hover:border-cyan-500/50">
                    <div class="relative">
                        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="World Cup Tournament">
                        <div class="absolute top-4 right-4 bg-amber-600 text-white text-xs font-bold px-2 py-1 rounded">
                            <i class="fas fa-users mr-1"></i> 21/24 Equipos
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white">Copa Mundial</h3>
                            <span class="bg-gray-800 text-cyan-400 text-xs font-medium px-2 py-1 rounded">Femenino</span>
                        </div>
                        <div class="mt-4 flex items-center text-gray-400 text-sm">
                            <i class="fas fa-calendar-day mr-2"></i>
                            <span>Incicia: 25/07 - Finaliza: 25/08</span>
                        </div>
                        <div class="mt-2 flex items-center text-gray-400 text-sm">
                            <i class="fas fa-trophy mr-2"></i>
                            <span>Premio: $ 35,000</span>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-800 flex justify-between items-center">
                            <span class="text-cyan-400 font-medium">Entrada: $ 3,000</span>
                            <button class="glow-effect bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded text-sm font-medium">
                                Unirse
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tournament 3 -->
                <div class="game-card bg-gray-900 rounded-xl overflow-hidden border border-gray-800 hover:border-cyan-500/50">
                    <div class="relative">
                        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1522778119026-d647f0596c20?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Premier League Tournament">
                        <div class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                            <i class="fas fa-users mr-1"></i> 12/12 Equipos
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-white">Premier League Elite</h3>
                            <span class="bg-gray-800 text-cyan-400 text-xs font-medium px-2 py-1 rounded">Adolecentes</span>
                        </div>
                        <div class="mt-4 flex items-center text-gray-400 text-sm">
                            <i class="fas fa-calendar-day mr-2"></i>
                            <span>Liga de 4 semanas</span>
                        </div>
                        <div class="mt-2 flex items-center text-gray-400 text-sm">
                            <i class="fas fa-trophy mr-2"></i>
                            <span>Premio: Mando DualSense Edición Especial</span>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-800 flex justify-between items-center">
                            <span class="text-cyan-400 font-medium">Entrada: $ 1,000</span>
                            <button class="glow-effect bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded text-sm font-medium">
                                Unirse
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700">
                    <i class="fas fa-list-ol mr-2"></i> Ver todos los torneos
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="bg-black py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-12">
                <h2 class="title-font text-3xl md:text-4xl font-bold text-white mb-2">
                    ¿CÓMO <span class="text-cyan-400">FUNCIONA?</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">
                    Sigue estos simples pasos para comenzar a competir
                </p>
            </div>

            <div class="mt-10">
                <div class="relative">
                    <!-- Line -->
                    <div class="hidden md:block absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gradient-to-b from-cyan-500 to-cyan-900"></div>
                    </div>

                    <!-- Steps -->
                    <div class="relative space-y-10 md:space-y-0">
                        <!-- Step 1 -->
                        <div class="md:flex">
                            <div class="md:flex-shrink-0 flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-cyan-600 text-white font-bold border-4 border-black">
                                    1
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6">
                                <h3 class="text-lg font-medium text-white">Regístrate</h3>
                                <p class="mt-2 text-base text-gray-300">
                                    Crea tu cuenta vinculando tu equipo.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="md:flex">
                            <div class="md:flex-shrink-0 flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-cyan-600 text-white font-bold border-4 border-black">
                                    2
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6">
                                <h3 class="text-lg font-medium text-white">Elige tu Torneo</h3>
                                <p class="mt-2 text-base text-gray-300">
                                    Selecciona entre torneos, ligas o copas eliminatorias según tu nivel.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="md:flex">
                            <div class="md:flex-shrink-0 flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-cyan-600 text-white font-bold border-4 border-black">
                                    3
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6">
                                <h3 class="text-lg font-medium text-white">Juega tus Partidos</h3>
                                <p class="mt-2 text-base text-gray-300">
                                    Estate atento a las fechas de tus partidos contra tus oponentes y juega con las reglas establecidas.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="md:flex">
                            <div class="md:flex-shrink-0 flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-cyan-600 text-white font-bold border-4 border-black">
                                    4
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6">
                                <h3 class="text-lg font-medium text-white">Reporte Resultados</h3>
                                <p class="mt-2 text-base text-gray-300">
                                    Se subiran los marcadores de cada partido para validar tus victorias y avanzar en el torneo.
                                </p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="md:flex">
                            <div class="md:flex-shrink-0 flex justify-center">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-cyan-600 text-white font-bold border-4 border-black">
                                    5
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6">
                                <h3 class="text-lg font-medium text-white">Gana Premios</h3>
                                <p class="mt-2 text-base text-gray-300">
                                    Recibe tus recompensas según tu posición final en la competencia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-gradient-to-b from-black to-gray-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="title-font text-3xl md:text-4xl font-bold text-white mb-2">
                    JUGADORES <span class="text-cyan-400">DESTACADOS</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">
                    Lo que dicen los campeones de nuestros torneos
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Testimonial 1">
                        <div class="ml-4">
                            <h4 class="text-white font-medium">FUT_ProPlayer92</h4>
                            <p class="text-cyan-400 text-sm">Campeón Champions League</p>
                        </div>
                    </div>
                    <p class="mt-6 text-gray-300 italic">
                        "Ganar el torneo de Champions League fue increíble. La organización fue perfecta y los premios llegaron rápido. ¡Definitivamente seguiré compitiendo!"
                    </p>
                    <div class="mt-4 flex text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Testimonial 2">
                        <div class="ml-4">
                            <h4 class="text-white font-medium">LaReinaDelFUT</h4>
                            <p class="text-cyan-400 text-sm">Top 3 Copa Mundial</p>
                        </div>
                    </div>
                    <p class="mt-6 text-gray-300 italic">
                        "Me encanta la variedad de torneos. Como jugadora casual, los eventos son perfectos para mí. Ya gané más de 1,500 en premios."
                    </p>
                    <div class="mt-4 flex text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="game-card bg-gray-900/50 p-8 rounded-xl border border-gray-800">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/75.jpg" alt="Testimonial 3">
                        <div class="ml-4">
                            <h4 class="text-white font-medium">ElJefe_FIFA</h4>
                            <p class="text-cyan-400 text-sm">Subcampeón Premier Elite</p>
                        </div>
                    </div>
                    <p class="mt-6 text-gray-300 italic">
                        "La competencia es dura pero justa. El sistema de emparejamiento funciona muy bien. Por fin un sitio serio para jugadores competitivos."
                    </p>
                    <div class="mt-4 flex text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-cyan-900/20 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="title-font text-3xl md:text-4xl font-bold text-white mb-6">
                    ¿LISTO PARA <span class="text-cyan-400">COMPETIR?</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">
                    Regístra a tu equipo ahora
                </p>
                <div class="mt-10">
                    <a href="#" class="glow-effect inline-flex items-center px-8 py-4 border border-transparent text-base font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700">
                        <i class="fas fa-user-plus mr-2"></i> Regístrar Equipo
                    </a>
                </div>
                <p class="mt-4 text-sm text-cyan-300">
                    Más de 50,000 jugadores ya compiten en nuestros torneos
                </p>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto px-1">
            <div class="m-1 bg-white rounded-xl shadow-md overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46652.480323997064!2d-56.175151051077115!3d-34.88505444950713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x959f802306bb05ff%3A0xbdccdfd285c1e8c5!2zRWwgR2FscMOzbiBGw7p0Ym9sIDc!5e0!3m2!1ses!2suy!4v1750732902152!5m2!1ses!2suy"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <a href="#" class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition duration-300 floating-button">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>

    <!-- Footer -->
    <footer class="bg-black border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-medium mb-4">TORNEOS</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Torneos Diarios</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Ligas Estacionales</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Copas Eliminatorias</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Torneos por Invitación</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">INFORMACIÓN</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Reglas</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Premios</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Soporte</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">COMUNIDAD</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Clasificación</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Equipos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Streamers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Discord</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-medium mb-4">LEGAL</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Términos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Privacidad</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Cookies</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center">
                    <img class="h-8" src="/img/logoTorneo.png" alt="Torneos Cup Logo">
                    <span class="ml-2 text-white font-medium">Torneos Cup</span>
                </div>
                <div class="mt-4 md:mt-0">
                    <p class="text-gray-400 text-sm">
                        Torneos Cup. Todos los derechos de los juegos pertenecen a sus respectivos dueños.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle would go here
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('nav button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Animación tarjetas (ya incluida)
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.game-card').forEach(card => {
                observer.observe(card);
            });
        });
        // Simple animation for tournament cards on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.game-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>

</html>
</body>

</html>