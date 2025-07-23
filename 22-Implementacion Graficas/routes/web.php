<?php

use App\Http\Controllers\chart\GraficoController;

use Illuminate\Support\Facades\Route;

//Pagina principal del usuario Admin, muestra el dashboard
Route::get('/layouts/admin', function () {return view('admin.dashboard');});

//Carga los Graficas
Route::get('/layouts/admin', [GraficoController::class, 'cards'])->name('dashboard');
