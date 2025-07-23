<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\VideosConMiddlewareController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Sin autenticacion. "se puede acceder sin esltar autenticado"
//Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');
//Con autenticacion
// Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->middleware(['auth', 'verified'])->name('Videos.show');
//Con autenticacion pero en el controlador
// Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');
//Con ejecucion de middleware en el controlador, y parametro adicional 
// Route::get('Videos/{video}/{edad}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');

//Rutas para probar el middleware de autenticacion en el controlador, ver controlador VideosController
//Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');
//Route::get('Videos/{video}/edit', [VideosConMiddlewareController::class, 'edit'])->name('Videos.edit');
//Route::get('Videos2/{video}', [VideosConMiddlewareController::class, 'show2'])->name('Videos.show2');

//RUTAS PARA CRUD VIDEOS
/* cuando usamos el Route::resource si creamos una Carpeta con el nombre en Mayuscula "/Videos" 
las variables del modelo en el controlador tienen que se igual "public function metodo(Videos $Video)" 
porque asi es como identifica el metodo resource, si no indicamos a la variable igual nos da error 
*/
Route::resource('videos', VideosController::class);  


//Rutas del loging --------------------------------------------------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//-------------------------------------------------------------------------------------------------

