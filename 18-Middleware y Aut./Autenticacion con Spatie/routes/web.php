<?php

use App\Http\Controllers\AsignarPermisosController;
use App\Http\Controllers\Front\JugadorController;
use App\Http\Controllers\Front\PerfilController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'verified', 'role:Administrador|Usuario'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Rutas de administrador
    Route::middleware(['role:Administrador'])->prefix('admin')->name('admin.sistema.')->group(function () {
        Route::resource('/roles', RoleController::class)->names('roles');
        Route::resource('/permisos', PermisosController::class)->names('permisos');
        Route::get('/rolePermiso/{role}', [AsignarPermisosController::class, 'edit'])->name('rolePermiso.edit');
        Route::put('/rolePermiso/{role}', [AsignarPermisosController::class, 'update'])->name('rolePermiso.update');
    });

    //Rutas de usuarios y administrador
    Route::resource('/usuario', UserController::class)->names('usuario');
    Route::get('/layouts/admin/cancha', function () {
        return view('admin.cancha.index');
    })->name('admin.cancha.index');
});

//Rutas de Jugador
Route::middleware(['auth', 'verified', 'role:Jugador'])->prefix('jugadores')->name('jugadores.')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

    Route::get('/', [JugadorController::class, 'clasificaciones'])->name('clasificaciones');

    Route::get('/jugadores/partidos', function () {
        return view('/jugadores/partidos');
    })->name('partidos');
});

require __DIR__ . '/auth.php';
