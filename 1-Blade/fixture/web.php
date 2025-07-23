<?php

use Illuminate\Support\Facades\Route;

//Parte 1-
//Esta es una forma de trabajar solo con las vistas y sus ubicaciones mientras no trabajamos con los controladores
// En la primera parte de la función indicamos la dirección de los archivos de las vistas.
// En el caso de la sección "guest" indicamos directamente el nombre del archivo de la vista.
// Ej: ('/clasificaciones')

//En el caso de la sección "admin" indicamos primero en que carpeta de encuentra el archivo padre "app.blade.php" donde esta el menú y contiene el cuerpo
// de nuestras vistas, recordemos que estamos usando el plugin AdminLTE, luego tenemos que indicar en que carpeta se encuentran los archivos hijos que
// están las vistas de cuerpo y por ultimo la carpeta especifica donde esta la vista y la vista que queremos visualizar.
// Ej: ('/layouts/admin/arbitro') => en este caso estamos indicando la dirección en donde se encuentra el archivo index de las vistas de arbitro.
// Ej: ('/layouts/admin/arbitro/edit') => en este caso estamos indicando la dirección y el archivo especifico de vista "edit".

//Parte 2-
// En la segunda parte esta la función que retorna la ruta de la vista que queremos visualizar
// Ej: return view('guests.clasificaciones'); => indicamos el directorio.archivo
// Ej: return view('admin.arbitro.index'); => indicamos el directorio.directorio.archivo

Route::view('/', 'home')->name('home');
//GUEST
Route::get('/clasificaciones', function() {return view('guests.clasificaciones');} );
Route::get('/partidos', function() {return view('guests.partidos');} );
Route::get('/equipos', function() {return view('guests.equipos');} );
Route::get('/asistencias', function() {return view('guests.asistencias');} );
Route::get('/goleadores', function() {return view('guests.goleadores');} );
Route::get('/noticias', function() {return view('admin.noticia.show');} );

//Admin
Route::get('/layouts/admin', function() {return view('admin.index');} );
//Arbitro
Route::get('/layouts/admin/arbitro', function () { return view('admin.arbitro.index'); });
Route::get('/layouts/admin/arbitro/edit', function () { return view('admin.arbitro.edit'); });
Route::get('/layouts/admin/arbitro/create', function () { return view('admin.arbitro.create'); });
//Cancha
Route::get('/layouts/admin/cancha', function () { return view('admin.cancha.index'); });
Route::get('/layouts/admin/cancha/edit', function () { return view('admin.cancha.edit'); });
Route::get('/layouts/admin/cancha/create', function () { return view('admin.cancha.create'); });
//Equipo
Route::get('/layouts/admin/equipo', function () { return view('admin.equipo.index'); });
Route::get('/layouts/admin/equipo/edit', function () { return view('admin.equipo.edit'); });
Route::get('/layouts/admin/equipo/create', function () { return view('admin.equipo.create'); });
//Jugador
Route::get('/layouts/admin/jugador', function () { return view('admin.jugador.index'); });
Route::get('/layouts/admin/jugador/edit', function () { return view('admin.jugador.edit'); });
Route::get('/layouts/admin/jugador/create', function () { return view('admin.jugador.create'); });
//Tarjeta
Route::get('/layouts/admin/tarjeta', function () { return view('admin.tarjeta.index'); });
Route::get('/layouts/admin/tarjeta/edit', function () { return view('admin.tarjeta.edit'); });
Route::get('/layouts/admin/tarjeta/create', function () { return view('admin.tarjeta.create'); });
//Torneo
Route::get('/layouts/admin/torneo', function () { return view('admin.torneo.index'); });
Route::get('/layouts/admin/torneo/edit', function () { return view('admin.torneo.edit'); });
Route::get('/layouts/admin/torneo/create', function () { return view('admin.torneo.create'); });
//Noticias
Route::get('/layouts/admin/noticia', function () { return view('admin.noticia.index'); });
Route::get('/layouts/admin/noticia/edit', function () { return view('admin.noticia.edit'); });
Route::get('/layouts/admin/noticia/create', function () { return view('admin.noticia.create'); });
