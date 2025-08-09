<?php

//ARCHIVO DE EJEMPLO
//RUTAS DE CONTROLADORES
    //Aqui van todas las rutas de los controladores
    //Ejemplos
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\VideosController;
    //Este es por defecto para llamar al metodo Route
    use Illuminate\Support\Facades\Route;

//RUTAS Callback
    //No se necesita controlador
    Route::get('/', function () {return view('home'); });
    Route::get('/guests/partidos', function() {return view('/guests/partidos'); });
    Route::get('/guests/clasificaciones', function() {return view('/guests/clasificaciones'); });
    Route::get('/guests/noticias', function() {return view('/guests/noticias'); });

//RUTAS Genericas Utilizando Controladores
    //NOTA: las carpetas donde guardemos nuestras vistas SIEMPRE van en plural y en minuscula:
    /*
        EJ: "resource/views/admin/videos". NO OVIDAR que en un caso real heredamos del Layout
        En este caso la ruta indicamos->'videos' "en plural", porque laravel manejara la variable 'video' en singular
    */
    Route::resource('/layouts/admin/videos', VideosController::class)->names('videos'); 
    /* ERROR QUE PODEMOS COMETER
        cuando usamos el Route::resource si creamos una Carpeta con el nombre en Mayuscula "resource/views/admin/Videos" 
        las variables del modelo en el controlador tienen que se igual "public function metodo(Videos $Video)" 
        porque asi es como identifica el metodo resource, si no indicamos a la variable igual nos da error, esto se traslada a los 
        contoladores y a las vistas.
    */


//METODOS only y except
    /* 
        Cuando en nuestro controlador no utilizamos alguno de los metodo, la mejor practica es indicar cuales vamos a incluir o excluir 
        para no generar rutas imnecesarias
        Ejemplo metodo "only => incluye" vamos a utilizar solo los metodos ['index', 'show']
    */
    Route::resource('/layouts/admin/videos', VideosController::class)->names('videos')->only(['index', 'show']);
    /*
    Ejemplo metodo "except => excluye" vamos a utilizar todos los metodos menos ['edit', 'create'] 
    */
    Route::resource('/layouts/admin/videos', VideosController::class)->names('videos')->except(['edit', 'create']);


//RUTAS Individuales
    /* 
        Otra forma para crear rutas sin utilizar el metodo resource(), lo podemos hacer de forma individual.
        Ejemplo: tenemos nuestras vistas en la siguiente ruta: "resource/views/admin/videos", NO olvidar que heredamos el menu del layouts
        Podemos llamar a todos los metods Http de forma individual 
    */
    Route::get('/layouts/admin/videos', [VideosController::class, 'index'])->name('admin.videos.index');
    Route::get('/layouts/admin/videos/create', [VideosController::class, 'create'])->name('admin.videos.create');
    Route::post('/layouts/admin/videos/store', [VideosController::class, 'store'])->name('admin.videos.store');
    Route::get('/layouts/admin/videos/edit/{video}', [VideosController::class, 'edit'])->name('admin.videos.edit');
    Route::put('/layouts/admin/videos/update/{video}', [VideosController::class, 'update'])->name('admin.videos.update');
    Route::delete('/layouts/admin/videos/destroy/{video}', [VideosController::class, 'destroy'])->name('admin.videos.destroy');

    /* Con parametro y parametro adicional */
    Route::get('/layouts/admin/videos/{video}/{edad}', [VideosController::class, 'show'])->name('admin.videos.show');


//RUTAS adicionales al tipoco crud
    /*
        Si queremos implementar metodos adicionales a los tipicos del crud "index, create, store, edit, update, destroy, show", 
        lo podemos realizar PERO utilizando un controlador espesifico para esos metodos. Si en el controlador "VideosConOtrsMetodos"
        tenemos un metodo llamado "otroMetodo", registramos la ruta con el metodo del controlador creado.  
    */
        /*Ejemplo con un metodo X HTTP */
    Route::get('/layouts/admin/videos/otraVista/', [VideosConOtrsMetodos::class, 'otroMetodo'])->name('admin.videos.otraVista');
        /*Ejemplo metodo X HTTP y con parametro */
    Route::post('/layouts/admin/videos/otraVista/{video}', [VideosConOtrsMetodos::class, 'otroMetodo2'])->name('admin.videos.otraVista');


//RUTAS con Prefijos de Nombre (grupos)
    /* 
        Cuando registramos rutas individuales pero las vistas estan guardadas en la misma carpeta 
        EJ: "resource/views/admin/videos". NO OVIDAR que en un caso real heredamos del Layout 
        Lo envolvemos todo en un grupo para simplificar la ruta indicando donde se encuetran nuestas vistas
        Route::name('admin.videos.')->group
    */
    Route::name('admin.videos.')->group(function () {
        Route::get('/layouts/admin/videos', [VideosController::class, 'index'])->name('index');
        Route::get('create', [VideosController::class, 'create'])->name('create');
        Route::post('store', [VideosController::class, 'store'])->name('store');
        Route::get('edit/{videos}', [VideosController::class, 'edit'])->name('edit');
        Route::put('update/{videos}', [VideosController::class, 'update'])->name('update');
        Route::delete('destroy/{videos}', [VideosController::class, 'destroy'])->name('destroy');
        Route::get('show/{videos}', [VideosController::class, 'show'])->name('show');
    });

    
//RUTAS del loging
    /* 
     Estas rutas se crean por defecto cuando instalamos los kit de autenticacion
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

//RUTAS con Middleware
    /*
        Estas ruta aplican el middleware de autenticacion "no se puede acceder sin estar autenticado"
    */
    Route::get('/layouts/admin/videos/{video}', [VideosController::class, 'show'])->middleware(['auth', 'verified'])->name('videos.show');


//RUTAS con Prefijos de URI combinado con Prefijos de Nombre.
    /*
        Usar "prefix" se usa mas cuando asignamos rolers o perfiles Ej:
    */
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


require __DIR__.'/auth.php';


