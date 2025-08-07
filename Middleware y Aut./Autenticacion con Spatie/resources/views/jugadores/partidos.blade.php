@extends('layouts.jugadores')
@section('title', 'Partidos')
@section('content')
        <header class="text-center mb-12 fade-in">
            <h1 class="text-5xl font-black uppercase tracking-wider neon-text-purple">Fixture - Jornada 5</h1>
        </header>
        
<div class="glassmorphism rounded-xl overflow-hidden shadow-lg fade-in" style="animation-delay: 0.2s;">
    <div class="flex justify-between items-center m-3">
        <span class="text-sm font-medium text-gray-300">Jornada 5 - 15/06/2023 - 20:00</span>
        <span class="text-sm font-medium text-gray-300">Cancha: Estadio Central</span>
    </div>
    <div class="p-5 flex items-center justify-between">
        <!-- Equipo Local -->
        <div class="flex items-center gap-4 w-2/5">
            <img src="https://via.placeholder.com/40x40.png?text=FCB" alt="Logo FC Barcelona" class="h-10 w-10">
            <span class="font-bold text-lg hidden md:inline">FC Barcelona</span>
            <span class="font-bold text-lg md:hidden">FCB</span>
        </div>
        <!-- Marcador -->
        <div class="text-center">
            <span class="text-3xl font-black text-white">3 - 1</span>
            <div class="text-xs uppercase text-gray-300 tracking-widest mt-1">Finalizado</div>
        </div>
        <!-- Equipo Visitante -->
        <div class="flex items-center gap-4 w-2/5 justify-end">
            <span class="font-bold text-lg md:hidden">RMA</span>
            <span class="font-bold text-lg hidden md:inline">Real Madrid</span>
            <img src="https://via.placeholder.com/40x40.png?text=RMA" alt="Logo Real Madrid" class="h-10 w-10">
        </div>
    </div>
    <div class="flex items-center justify-center m-2 text-sm text-gray-300">Árbitro: Roberto Martínez</div>
</div>

<!-- Partido En Vivo -->
<div class="glassmorphism rounded-xl overflow-hidden shadow-lg border-2 border-red-500 fade-in" style="animation-delay: 0.4s;">
    <div class="p-5 flex items-center justify-between">
        <div class="flex items-center gap-4 w-2/5">
            <img src="https://via.placeholder.com/40x40.png?text=ATM" alt="Logo Atlético" class="h-10 w-10">
            <span class="font-bold text-lg hidden md:inline">Atlético de Madrid</span>
            <span class="font-bold text-lg md:hidden">ATM</span>
        </div>
        <div class="text-center">
            <span class="text-3xl font-black text-red-500 animate-pulse">2 - 2</span>
            <div class="text-xs uppercase text-red-400 tracking-widest mt-1">En Vivo - 78'</div>
        </div>
        <div class="flex items-center gap-4 w-2/5 justify-end">
            <span class="font-bold text-lg md:hidden">VAL</span>
            <span class="font-bold text-lg hidden md:inline">Valencia CF</span>
            <img src="https://via.placeholder.com/40x40.png?text=VAL" alt="Logo Valencia" class="h-10 w-10">
        </div>
    </div>
</div>

<!-- Partido Próximo -->
<div class="glassmorphism rounded-xl overflow-hidden shadow-lg opacity-80 fade-in" style="animation-delay: 0.6s;">
    <div class="p-5 flex items-center justify-between">
        <div class="flex items-center gap-4 w-2/5">
            <img src="https://via.placeholder.com/40x40.png?text=SEV" alt="Logo Sevilla" class="h-10 w-10">
            <span class="font-bold text-lg hidden md:inline">Sevilla FC</span>
            <span class="font-bold text-lg md:hidden">SEV</span>
        </div>
        <div class="text-center">
            <span class="text-2xl font-bold text-gray-400">VS</span>
            <div class="text-xs uppercase text-gray-400 tracking-widest mt-1">Mañana 21:00</div>
        </div>
        <div class="flex items-center gap-4 w-2/5 justify-end">
            <span class="font-bold text-lg md:hidden">BET</span>
            <span class="font-bold text-lg hidden md:inline">Real Betis</span>
            <img src="https://via.placeholder.com/40x40.png?text=BET" alt="Logo Betis" class="h-10 w-10">
        </div>
    </div>
</div>
@endsection