### Middlewares LARAVEL

## Utilizamos el paquete de Spatie para los Roles y permisos para tener una logica mas robusta a la hora de protejer rutas y acciones "botones";
-- https://spatie.be/docs/laravel-permission/v6/installation-laravel
- La carpeta "Autenticacion con Spatie" es un ejemplo de como configurar spatie asignar roles y permisos para dar seguridad segun corresponda, tambien se configuro para usar Tailwind CSS "esto con ayuda de IA"

## Documentación Laravel
https://laravel.com/docs/12.x/middleware
https://laravel.com/docs/12.x/controllers#dependency-injection-and-controllers

En Laravel, tanto aplicar **middlewares en las rutas** como en los **controladores** son prácticas válidas, y la mejor opción depende del contexto y del nivel de organización que necesites en tu aplicación. Las **mejores prácticas profesionales** según estándares comunes en proyectos Laravel bien estructurados:

Los middlewares no solo se usan para controlar roles de usuarios y sino tambien otras funcionalidades, donde su logica puede ser construida en un archivo en la carpeta **"app/Http/Middleware/nombre_archivo.php"**. Y se tiene que registrar en el **"app/Http/Kernel.php"**

# Middleware que creamos
---
Ej: 'verifica.edad' => \App\Http\Middleware\VerificaEdad::class,
```
### Middleware VerificaEdad.php:
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaEdad
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route('edad') < 18) {
            # SI entro aqui es porque es menor de edad
            abort(403, 'No tienes acceso a este contenido');
        }
        # Si no entro aqui es porque es mayor de edad
        return $next($request);
    }
}

### Contolador:
namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosConMiddlewareController extends Controller
{
    public function __construct()
    {
      //creamos un middleware para verificar la edad, lo declaramos en el Kernel.php dentro de la carpeta Http
      $this->middleware('verifica.edad');
    }
}
```
---
### ✅ **Mejor práctica general: Usar middleware en rutas (o grupos de rutas)**
#### Ventajas:
* **Claridad y trazabilidad:** Es más fácil ver qué middleware aplica a una ruta específica.
* **Organización:** Cuando usas `Route::middleware([...])` en los archivos de rutas (`web.php`, `api.php`), puedes agrupar rutas por tipo de acceso, autenticación, roles, etc.
* **Evita acoplamiento en controladores:** Mantiene los controladores limpios y más reutilizables.

```php
// routes/web.php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
```
---
### 👌 **Cuándo usar middleware en controladores:**
1. **Middleware exclusivo del controlador o muy específico.**
2. Si el controlador tiene lógica especial que requiere condicionar el middleware a ciertos métodos.
```php
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin')->only(['index', 'edit']);
    }
}
```
#### Ventajas:
* **Encapsulación:** Ideal cuando el middleware está muy ligado a la lógica del controlador.
* **Control detallado:** Puedes aplicar middleware a métodos específicos fácilmente con `only()` y `except()`.
* Videos: 
* **only()**    https://www.youtube.com/watch?v=I8_Ptf7Z85U&list=PLX64KYDfSBMvUiS4LJXvNGmDsEEI8_HD1&index=10
* **except()**  https://www.youtube.com/watch?v=zy5ObqgSQwk&list=PLX64KYDfSBMvUiS4LJXvNGmDsEEI8_HD1&index=11
---
### 🎯 Recomendación profesional:
* **Rutas públicas, autenticación, verificación, CORS, roles, etc. → en rutas.**
* **Middleware lógico o condicional muy específico del controlador → en el constructor del controlador.**
* Evita duplicar middleware en ambos lados sin necesidad.
  
---
Perfecto. Te mostraré un **ejemplo profesional actualizado (Laravel 10/11, válido en 2025)** con la siguiente estructura típica:
### 🎯 Caso: Aplicación con autenticación y panel de administración
Contamos con:

* Usuarios autenticados
* Roles (`admin`, `editor`, etc.)
* Middleware de autorización basado en roles
* Rutas públicas y protegidas
* Controladores separados por contexto
---

## 🧱 1. **Definición del middleware personalizado**
Creamos un middleware para validar el rol de usuario:

```bash
php artisan make:middleware RoleMiddleware
```

```php
// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->role, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
```
### 🧩 Registrar el middleware

En `app/Http/Kernel.php`:

```php
protected $routeMiddleware = [
    // ...
    'role' => \App\Http\Middleware\RoleMiddleware::class,
];
```
---
## 🧾 2. **Rutas estructuradas profesionalmente (web.php)**
```php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas autenticadas
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    // Rutas de administrador
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/users', UsersController::class);
    });
});
```
---
## 🧑‍💻 3. **Controladores bien organizados**
```php
// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
```
---
## 🛡️ 4. **Migración de usuarios con campo `role`**
```php
// database/migrations/xxxx_add_role_to_users_table.php

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('user');
    });
}
```
---
## 🧪 5. **Seeders para roles de prueba**
```php
User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin',
]);
```
---
## ✅ Ventajas de esta estructura:
* Rutas limpias y organizadas.
* Middleware reutilizable para múltiples roles.
* Controladores responsables de lógica específica.
* Seguridad clara: acceso controlado por middleware + roles.
* Escalable para más roles (editor, moderador, etc.)
---
