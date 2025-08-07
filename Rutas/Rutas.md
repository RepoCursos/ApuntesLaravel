# RUTAS LARAVEL
https://laravel.com/docs/12.x/routing

**A. Fundamentos (Lo Básico Indispensable):**
1.  **¿Qué es una ruta?**
    *   Esencialmente, una ruta define un endpoint (URL) y cómo la aplicación debe responder a las peticiones que llegan a ese endpoint. Mapea una URI y un método HTTP a una acción específica (closure o método de controlador).

2.  **Archivos de Rutas:**
    *   `routes/web.php`: Para rutas que utilizan estado de sesión, cookies, protección CSRF. Son las rutas "tradicionales" de una aplicación web. Tienen aplicado el grupo de middleware `web` por defecto.
    *   `routes/api.php`: Para rutas sin estado (stateless) que generalmente devuelven JSON y son consumidas por clientes como aplicaciones móviles, frontends JavaScript, etc. Tienen aplicado el grupo de middleware `api` por defecto (incluye throttling).
    *   `routes/console.php`: Para definir comandos de Artisan.
    *   `routes/channels.php`: Para registrar los canales de broadcasting de eventos.
    *   **Pregunta de entrevista común:** *"¿Cuál es la diferencia entre `routes/web.php` y `routes/api.php`?"* (Respuesta: estado, middleware aplicado por defecto como sesión, CSRF para web, y throttling, autenticación por token para api).

3.  **Métodos HTTP Básicos y Definición de Rutas:**
    *   `Route::get($uri, $action)`: Para peticiones GET.
    *   `Route::post($uri, $action)`: Para peticiones POST.
    *   `Route::put($uri, $action)`: Para peticiones PUT (actualizar un recurso completo).
    *   `Route::patch($uri, $action)`: Para peticiones PATCH (actualizar parcialmente un recurso).
    *   `Route::delete($uri, $action)`: Para peticiones DELETE.
    *   `Route::options($uri, $action)`: Para peticiones OPTIONS.
    *   `Route::match(['get', 'post'], $uri, $action)`: Para rutas que responden a múltiples métodos HTTP.
    *   `Route::any($uri, $action)`: Para rutas que responden a todos los métodos HTTP.

4.  **Acciones de Ruta:**
    *   **Closures (Funciones Anónimas):**
        ```php
        Route::get('/saludo', function () {
            return '¡Hola Mundo!';
        });
        ```
    *   **Función Callback (Funciones Retrollamada):**
        ```php
        Route::get('/Nombre_carpeta/nombre_vista', function() {return view('/Nombre_carpeta/nombre_vista'); });
        ```
        *   **Cuándo usarlas:** Para rutas muy simples o prototipos rápidos. No recomendadas para lógica compleja o si la ruta se reutilizará, ya que no se pueden cachear con `route:cache`.
    *   **Controladores:**
        ```php
        // En routes/web.php
        use App\Http\Controllers\UserController;
        Route::get('/users', [UserController::class, 'index']);
        ```
        *   **Cuándo usarlos:** Es la práctica recomendada para organizar la lógica de tu aplicación. Permite mantener los archivos de rutas limpios y la lógica de negocio separada.
        *   **Pregunta de entrevista:** *"¿Cuándo usarías una closure en una ruta y cuándo un controlador?"*

**B. Parámetros de Ruta:**

1.  **Parámetros Requeridos:**
    ```php
    Route::get('/user/{id}', function ($id) {
        return 'User ID: ' . $id;
    });
    // O con controlador
    Route::get('/user/{id}', [UserController::class, 'show']);
    // En UserController.php
    // public function show($id) { ... }
    ```

2.  **Parámetros Opcionales:** Con un `?` y un valor por defecto.
    ```php
    Route::get('/user/{name?}', function ($name = 'Invitado') {
        return 'Hola ' . $name;
    });
    ```

3.  **Restricciones de Parámetros (Constraints):** Usando `where` con expresiones regulares.
    ```php
    Route::get('/user/{id}', function ($id) {
        // ...
    })->where('id', '[0-9]+'); // Solo números

    Route::get('/user/{name}', function ($name) {
        // ...
    })->where('name', '[A-Za-z]+'); // Solo letras

    Route::get('/category/{category}', function ($category) {
        // ...
    })->whereIn('category', ['movies', 'music', 'books']); // Valores específicos
    ```
    *   También existen helpers como `whereNumber`, `whereAlpha`, `whereAlphaNumeric`, `whereUuid`, `whereUlid`.
    *   **Global Constraints:** Se pueden definir en el método `boot` de `App\Providers\RouteServiceProvider.php` para aplicar restricciones globalmente a parámetros con un nombre específico.

**C. Rutas con Nombre (Named Routes):**

*   Permiten generar URLs o redirecciones de forma más robusta y mantenible.
    ```php
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile');

    // Generar URL en una vista Blade:
    // <a href="{{ route('profile') }}">Perfil</a>

    // Redirigir en un controlador:
    // return redirect()->route('profile');

    // Con parámetros:
    Route::get('/user/{id}/profile', [UserProfileController::class, 'show'])->name('user.profile');
    // route('user.profile', ['id' => 1])
    ```
*   **Pregunta de entrevista:** *"¿Qué beneficios aporta nombrar las rutas?"* (Respuesta: Facilita la generación de URLs, desacopla tu código de las URIs específicas, si cambias la URI no necesitas cambiar todas las referencias si usas el nombre).

**D. Grupos de Rutas (Route Groups):**

*   Permiten aplicar atributos (middleware, prefijos de URI/nombre, namespaces) a un conjunto de rutas.
    ```php
    // Middleware
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/settings', [SettingsController::class, 'index']);
    });

    // Prefijos de Nombre
		✅ 1. Cuándo usar Route::name() (Prefijos de Nombre)
		Usas Route::name() cuando quieres agrupar rutas bajo un prefijo lógico para sus nombres, que usas luego al generar 
		URLs con route('nombre.ruta').

    Route::name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard'); // Nombre: admin.dashboard
    });
    
    // Prefijos de URI
    ✅ 2. Cuándo usar Route::prefix() (Prefijos de URI), se aplica mas cuando tenemos roles
		Usas Route::prefix() cuando quieres agregar una parte común al path de la URL. Esto no afecta el nombre de la ruta, solo el URI.
		
    Route::prefix('admin')->group(function () {
        Route::get('/users', [AdminUserController::class, 'index']); // URL: /admin/users
    });
    
    // Combinados
    Route::middleware(['auth', 'is_admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        });
    ```
*   **Subdomain Routing:** `Route::domain('{account}.example.com')->group(...)`
*   **Pregunta de entrevista:** *"¿Para qué sirven los grupos de rutas? Dame ejemplos de atributos que puedes aplicar."*

**E. Route Model Binding:**

1.  **Implicit Binding:** Laravel automáticamente inyecta la instancia del modelo correspondiente al ID de la ruta.
    ```php
    // Ruta: /users/{user} -> {user} es el ID
    Route::get('/users/{user}', function (App\Models\User $user) { // Type-hint con el modelo
        return $user->email;
    });
    // Si no se encuentra el modelo con ese ID, se lanza un 404 automáticamente.
    ```

2.  **Customizing The Key:** Por defecto, busca por la columna `id`. Puedes cambiarlo en el modelo:
    ```php
    // En App\Models\Post.php
    public function getRouteKeyName()
    {
        return 'slug'; // Ahora buscará por la columna 'slug'
    }
    // Ruta: /posts/{post} -> {post} ahora buscará el valor en la columna 'slug'
    Route::get('/posts/{post}', function (App\Models\Post $post) { ... });
    ```

3.  **Explicit Binding:** Se define en `App\Providers\RouteServiceProvider.php` en el método `boot`.
    ```php
    // En RouteServiceProvider.php
    public function boot()
    {
        parent::boot();
        Route::model('user', App\Models\User::class);
        // O con lógica personalizada
        Route::bind('user', function ($value) {
            return App\Models\User::where('name', $value)->firstOrFail();
        });
    }
    ```

4.  **Scoped Bindings (para recursos anidados):** Asegura que el modelo hijo pertenezca al modelo padre.
    ```php
    // Ruta: /users/{user}/posts/{post}
    // Laravel automáticamente buscará el post que tenga el user_id del $user.
    Route::get('/users/{user}/posts/{post}', function (App\Models\User $user, App\Models\Post $post) {
        return $post;
    })->scopeBindings(); // Necesitas ->scopeBindings() o definirlo en el grupo padre.

    // O en un grupo:
    Route::scopeBindings()->group(function () {
        Route::get('/users/{user}/posts/{post}', function (User $user, Post $post) {
            return $post;
        });
    });
    ```
    *   **Pregunta de entrevista:** *"¿Qué es Route Model Binding y cómo funciona? ¿Cómo harías para que busque por un campo que no sea 'id'?"*
    *   **Pregunta de entrevista avanzada:** *"Si tienes una URL como `/users/{user}/posts/{post}`, ¿cómo te asegurarías de que el post pertenece al usuario?"* (Respuesta: Scoped Bindings).

**F. Controladores de Recursos (Resource Controllers):**

*   Una forma rápida de definir rutas CRUD estándar.
    ```php
    use App\Http\Controllers\PhotoController;
    Route::resource('photos', PhotoController::class);
    ```
    Esto crea automáticamente rutas para: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.
*   **Partial Resource Routes:**
    ```php
    Route::resource('photos', PhotoController::class)->only(['index', 'show']);
    Route::resource('photos', PhotoController::class)->except(['create', 'store', 'edit', 'update']);
    
    // Metodos adiciionales al tipoco crud en el controlador.
/*
Si queremos implementar metodos adicionales a los tipicos del crud "index, create, store, edit, update, destroy, show", lo podemos realizar
PERO si las rutas las declaramos usando el metodo resource: "Route::resource('photos', PhotoController::class);", tenemos que declarar los
metodos adicionales antes del resource, para que no nos genere conflicto ya que puede que no lo reconozca. Ej:
 Route::get('photos/{video}', [PhotoController::class, 'otroMetodo'])->name('photos.otroMetodo');
 Route::resource('photos', PhotoController::class); 
*/
    ```
*   **API Resource Routes:** `Route::apiResource('photos', PhotoController::class)` omite las rutas `create` y `edit` (que típicamente devuelven vistas HTML).
*   **Nombres de Rutas de Recurso:** `photos.index`, `photos.show`, etc.
*   **Pregunta de entrevista:** *"¿Qué es un controlador de recursos y qué rutas genera?"*

**G. Otros Tipos de Rutas y Funcionalidades:**

1.  **Rutas de Vista (View Routes):** Para rutas simples que solo devuelven una vista.
    ```php
    Route::view('/welcome', 'welcome');
    Route::view('/welcome', 'welcome', ['name' => 'Taylor']); // Con datos
    ```

2.  **Rutas de Redirección (Redirect Routes):**
    ```php
    Route::redirect('/aqui', '/alla', 301); // 301 para redirección permanente
    ```

3.  **Rutas Fallback (Fallback Routes):** Se ejecutan si ninguna otra ruta coincide. Útil para páginas 404 personalizadas.
    ```php
    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
    ```

4.  **Form Method Spoofing:** Los formularios HTML solo soportan GET y POST. Para `PUT`, `PATCH`, `DELETE` se usa un campo oculto:
    ```html
    <form action="/recurso/{{ $id }}" method="POST">
        @csrf
        @method('PUT') <!-- o PATCH o DELETE -->
        <!-- ... otros campos ... -->
    </form>
    ```

5.  **Protección CSRF:** Automáticamente habilitada para rutas en `web.php`. Se debe incluir `@csrf` en los formularios.

**H. Middleware en Rutas (Repaso):**

*   Ya mencionado en grupos, pero es crucial entender cómo se asigna middleware:
    ```php
    // A una sola ruta
    Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');

    // A un grupo (ver sección D)

    // Middleware con parámetros
    Route::put('/post/{id}', function () {
        // ...
    })->middleware('role:editor');
    ```
*   **Pregunta de entrevista:** *"¿Cómo protegerías una ruta para que solo usuarios autenticados puedan acceder?"* (Respuesta: Usando el middleware `auth`).

**I. Optimización y Testing:**

1.  **Cacheo de Rutas:** Mejora el rendimiento.
    *   `php artisan route:cache`: Crea un archivo cacheado de las rutas. **Importante:** No funciona si usas closures en tus rutas.
    *   `php artisan route:clear`: Limpia la caché de rutas.
    *   **Pregunta de entrevista:** *"¿Has usado `php artisan route:cache`? ¿Cuáles son sus ventajas y desventajas?"*

2.  **Listado de Rutas:** Útil para depurar.
    *   `php artisan route:list`: Muestra todas las rutas registradas, sus métodos, URIs, nombres y acciones.

3.  **Testing de Rutas:** Laravel provee helpers para testear tus rutas.
    ```php
    // En un test
    public function test_homepage_is_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    ```

**J. Buenas Prácticas y Consideraciones para la Entrevista:**

*   **Organización:** Mantén tus archivos `web.php` y `api.php` lo más limpios posible, delegando la lógica a los controladores.
*   **Nombres:** Siempre nombra tus rutas, especialmente si vas a generar URLs a partir de ellas.
*   **Grupos:** Utiliza grupos para organizar rutas con middleware o prefijos comunes.
*   **Recursos:** Prefiere `Route::resource` o `Route::apiResource` para operaciones CRUD estándar.
*   **Claridad:** Sé capaz de explicar *cuándo* y *por qué* usarías cada característica.
*   **Seguridad:** Entiende cómo aplicar middleware para la autenticación y autorización.

**K. Posibles Preguntas de Entrevista (Específicas de Rutas - Resumen):**

*   "Explícame la diferencia entre `routes/web.php` y `routes/api.php`."
*   "¿Cuándo usarías una closure en una ruta y cuándo un controlador?"
*   "¿Qué es Route Model Binding y cómo funciona? ¿Cómo lo personalizarías?"
*   "¿Para qué sirven los grupos de rutas? Dame ejemplos de atributos que puedes aplicar."
*   "¿Qué es un controlador de recursos?"
*   "¿Cómo protegerías una ruta para que solo usuarios autenticados puedan acceder?"
*   "¿Cómo manejas los parámetros opcionales en las rutas?"
*   "¿Qué beneficios aporta nombrar las rutas?"
*   "¿Has usado `php artisan route:cache`? ¿Cuáles son sus ventajas y desventajas?"
*   "Si tienes una URL como `/users/{user}/posts/{post}`, ¿cómo te asegurarías de que el post pertenece al usuario? (Scoped Bindings)"
*   "¿Cómo defines una ruta que responda a múltiples métodos HTTP?" (`Route::match`, `Route::any`)
*   "¿Qué es una Fallback Route y para qué se usa?"
