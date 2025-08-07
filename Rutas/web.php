<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\VideosConMiddlewareController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

//Rutas Callback
//No se necesita controlador
Route::get('/', function () {return view('home'); });
Route::get('/guests/partidos', function() {return view('/guests/partidos'); });
Route::get('/guests/clasificaciones', function() {return view('/guests/clasificaciones'); });
Route::get('/guests/noticias', function() {return view('/guests/noticias'); });

//RUTAS Genericas
/* cuando usamos el Route::resource si creamos una Carpeta con el nombre en Mayuscula "/Videos" 
las variables del modelo en el controlador tienen que se igual "public function metodo(Videos $Video)" 
porque asi es como identifica el metodo resource, si no indicamos a la variable igual nos da error, esto se traslada a los contoladores y a
las vistas.
*/
//En este caso la ruta "resource/views/otraCarpeta/videos" por eso indicamos -> 'videos'
Route::resource('videos', VideosController::class)->names('videos'); 

//Cuando en nuestro controlador no utilizamos alguno de los metoso la mejor practica es indicar cuales vamos a incluir o excluir para no generar rutas imnecesarias
//Ejemplo metodo "only => incluye" vamos a utilizar solo los metodos ['index', 'show']
 Route::resource('videos', VideosController::class)->names('videos')->only(['index', 'show']);

 //Ejemplo metodo "except => excluye" vamos a utilizar todos los metodos menos ['edit', 'create'] EJ:por que utilizaremos un modal para esto
 Route::resource('videos', VideosController::class)->names('videos')->except(['edit', 'create']);

// Metodos adiciionales al tipoco crud en el controlador. No RECOMENDADO
/*
Si queremos implementar metodos adicionales a los tipicos del crud "index, create, store, edit, update, destroy, show", lo podemos realizar
PERO si las rutas las declaramos usando el metodo resource: "Route::resource('videos', VideosController::class);", tenemos que declarar los
metodos adicionales antes del resource, para que no nos genere conflicto ya que puede que no lo reconozca. Ej:
*/
 Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'otroMetodo'])->name('Videos.otroMetodo');
 Route::resource('videos', VideosController::class)->names('videos');
/* Nota: mejores practicas es crear los metodos del CRUD en un controlador, utilizar el "Route::resource" y los metodos adicionales 
 crear otro controlador, utilizar "Route::get o post o el que se necesite.
*/

//RUTAS Individuales
// Los archivos estan guardados en la siguiente direccion:"fixture/resources/views/admin/torneo"
Route::get('/layouts/admin/torneo/create', [TorneoController::class, 'create'])->name('admin.torneo.create');
Route::post('/layouts/admin/torneo/store', [TorneoController::class, 'store'])->name('admin.torneo.store');
Route::get('/layouts/admin/torneo/edit/{torneo}', [TorneoController::class, 'edit'])->name('admin.torneo.edit');

// Con parametro
Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');

// Con parametro y parametro adicional
Route::get('Videos/{video}/{edad}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');

// Prefijos de Nombre
Route::name('admin.torneo.')->group(function () {
    Route::get('/layouts/admin/torneo', [TorneoController::class, 'index'])->name('index');
    Route::get('create', [TorneoController::class, 'create'])->name('create');
    Route::post('store', [TorneoController::class, 'store'])->name('store');
    Route::get('edit/{torneo}', [TorneoController::class, 'edit'])->name('edit');
    Route::put('update/{torneo}', [TorneoController::class, 'update'])->name('update');
    Route::delete('destroy/{torneo}', [TorneoController::class, 'destroy'])->name('destroy');
    Route::get('show/{torneo}', [TorneoController::class, 'show'])->name('show');
});

//RUTAS Con Autenticacion
// Rutas del loging
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Con autenticacion "no se puede acceder sin estar autenticado"
Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->middleware(['auth', 'verified'])->name('Videos.show');

// Con autenticacion pero en el controlador
Route::get('Videos/{video}', [VideosConMiddlewareController::class, 'show'])->name('Videos.show');

// Prefijos de URI combinado con Prefijos de Nombre.
//Usar "prefix" se usa mas cuando asignamos rolers o perfiles Ej:

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Rutas del panel de administrador
    });

Route::middleware(['auth', 'role:jugador'])
    ->prefix('jugador')
    ->name('jugador.')
    ->group(function () {
        // Rutas del panel del jugador
    });


//Probar si funciona en la practica webtd cuando incluyamos roles
Route::middleware(['auth', 'role:admin'])
    	->prefix('admin')
        ->name('admin.torneo.')
        ->group(function () {
    Route::get('/', [TorneoController::class, 'index'])->name('index');
    Route::get('create', [TorneoController::class, 'create'])->name('create');
    Route::post('store', [TorneoController::class, 'store'])->name('store');
    Route::get('edit/{torneo}', [TorneoController::class, 'edit'])->name('edit');
    Route::put('update/{torneo}', [TorneoController::class, 'update'])->name('update');
    Route::delete('destroy/{torneo}', [TorneoController::class, 'destroy'])->name('destroy');
    Route::get('show/{torneo}', [TorneoController::class, 'show'])->name('show');
});

require __DIR__.'/auth.php';


