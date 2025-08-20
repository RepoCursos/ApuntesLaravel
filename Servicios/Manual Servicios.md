# Guía Completa de Services en Laravel - Preparación para Entrevista

## Índice
1. [¿Qué son los Services?](#qué-son-los-services)
2. [¿Por qué usar Services?](#por-qué-usar-services)
3. [Estructura y Organización](#estructura-y-organización)
4. [Implementación Práctica](#implementación-práctica)
5. [Service Container e Inyección de Dependencias](#service-container-e-inyección-de-dependencias)
6. [Patrones de Implementación](#patrones-de-implementación)
7. [Testing de Services](#testing-de-services)
8. [Casos de Uso Avanzados](#casos-de-uso-avanzados)
9. [Mejores Prácticas](#mejores-prácticas)
10. [Preguntas Típicas de Entrevista](#preguntas-típicas-de-entrevista)

---
### Comandos Artisan Útiles:
```bash
# Crear Service (personalizado)
php artisan make:service UserService

# Crear test
php artisan make:test UserServiceTest --unit

# Limpiar caché de services
php artisan config:clear
php artisan route:clear
```
## ¿Qué son los Services?

Los **Services** en Laravel son clases PHP que encapsulan la lógica de negocio de la aplicación. No son una característica específica del framework, sino un patrón de diseño arquitectónico que ayuda a mantener el código organizado y siguiendo los principios SOLID.

### Características principales:
- Contienen lógica de negocio reutilizable
- Son independientes de la capa de presentación (controladores)
- Facilitan el testing y mantenimiento
- Pueden ser inyectados como dependencias

---

## ¿Por qué usar Services?

### Ventajas:

**1. Separación de Responsabilidades**
- Los controladores se enfocan solo en manejar HTTP requests/responses
- La lógica de negocio queda centralizada en los Services

**2. Reutilización de Código**
```php
// Sin Services - código duplicado
class UserController {
    public function store() {
        // Lógica compleja aquí
    }
}

class AdminController {
    public function createUser() {
        // Misma lógica duplicada
    }
}

// Con Services - código reutilizable
class UserController {
    public function store(UserService $userService) {
        return $userService->createUser($data);
    }
}

class AdminController {
    public function createUser(UserService $userService) {
        return $userService->createUser($data);
    }
}
```

**3. Testabilidad Mejorada**
- Fácil creación de mocks y stubs
- Tests unitarios independientes
- Mayor cobertura de código

**4. Mantenimiento Simplificado**
- Cambios centralizados
- Código más legible
- Debugging más eficiente

---

## Estructura y Organización

### Estructura de Carpetas Recomendada:

```
app/
├── Services/
│   ├── User/
│   │   ├── UserService.php
│   │   ├── UserRegistrationService.php
│   │   └── UserNotificationService.php
│   ├── Payment/
│   │   ├── PaymentService.php
│   │   └── PaymentProcessorService.php
│   └── Order/
│       ├── OrderService.php
│       └── OrderCalculatorService.php
```

### Convenciones de Nomenclatura:
- Usar sufijo `Service`: `UserService`, `OrderService`
- Nombres descriptivos: `PaymentProcessorService`
- Namespace consistente: `App\Services\User\UserService`

---

## Implementación Práctica

### Ejemplo Básico: UserService

```php
<?php

namespace App\Services;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * Crear un nuevo usuario
     */
    public function createUser(array $userData): User
    {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            'email_verified_at' => now(),
        ]);

        // Enviar email de bienvenida
        Mail::to($user)->send(new WelcomeEmail($user));

        return $user;
    }

    /**
     * Actualizar perfil de usuario
     */
    public function updateProfile(User $user, array $data): User
    {
        $user->update($data);
        
        return $user->fresh();
    }

    /**
     * Obtener usuarios activos
     */
    public function getActiveUsers(): Collection
    {
        return User::where('is_active', true)
                   ->orderBy('created_at', 'desc')
                   ->get();
    }

    /**
     * Desactivar usuario
     */
    public function deactivateUser(User $user): bool
    {
        return $user->update(['is_active' => false]);
    }
}
```

### Uso en Controlador:

```php
<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function store(CreateUserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->createUser($request->validated());
            
            return response()->json([
                'message' => 'Usuario creado exitosamente',
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $updatedUser = $this->userService->updateProfile($user, $request->validated());
        
        return response()->json([
            'message' => 'Usuario actualizado',
            'data' => $updatedUser
        ]);
    }
}
```

---

## Service Container e Inyección de Dependencias

### Registro Manual en Service Provider:

```php
<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\PaymentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Binding simple
        $this->app->bind(UserService::class, function ($app) {
            return new UserService();
        });

        // Singleton (una sola instancia)
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService(
                config('services.payment.key'),
                config('services.payment.secret')
            );
        });
    }
}
```

### Auto-resolución:
Laravel puede resolver automáticamente las dependencias si:
- El Service no tiene dependencias en el constructor
- Las dependencias son otras clases que Laravel puede resolver

```php
// Laravel resuelve automáticamente
class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
}
```

---

## Patrones de Implementación

### 1. Service con Repository Pattern:

```php
<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function createUser(array $data): User
    {
        // Lógica de validación adicional
        if ($this->userRepository->emailExists($data['email'])) {
            throw new \Exception('Email ya existe');
        }

        return $this->userRepository->create($data);
    }
}
```

### 2. Service con Events:

```php
<?php

namespace App\Services;

use App\Events\UserCreated;
use App\Models\User;

class UserService
{
    public function createUser(array $data): User
    {
        $user = User::create($data);
        
        // Disparar evento
        event(new UserCreated($user));
        
        return $user;
    }
}
```

### 3. Service con Traits:

```php
<?php

namespace App\Services;

use App\Traits\HandlesFiles;
use App\Traits\SendsNotifications;

class UserService
{
    use HandlesFiles, SendsNotifications;

    public function updateAvatar(User $user, $file): User
    {
        $path = $this->uploadFile($file, 'avatars');
        
        $user->update(['avatar' => $path]);
        
        $this->sendNotification($user, 'Avatar actualizado');
        
        return $user;
    }
}
```

---

## Testing de Services

### Test Unitario Básico:

```php
<?php

namespace Tests\Unit\Services;

use App\Services\UserService;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = new UserService();
    }

    /** @test */
    public function it_can_create_a_user(): void
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123'
        ];

        $user = $this->userService->createUser($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com'
        ]);
    }

    /** @test */
    public function it_can_get_active_users(): void
    {
        // Crear usuarios de prueba
        User::factory()->create(['is_active' => true]);
        User::factory()->create(['is_active' => false]);
        User::factory()->create(['is_active' => true]);

        $activeUsers = $this->userService->getActiveUsers();

        $this->assertCount(2, $activeUsers);
        $this->assertTrue($activeUsers->every(fn($user) => $user->is_active));
    }
}
```

### Test con Mocking:

```php
<?php

namespace Tests\Unit\Services;

use App\Services\UserService;
use App\Repositories\UserRepository;
use Tests\TestCase;
use Mockery;

class UserServiceWithMockTest extends TestCase
{
    /** @test */
    public function it_creates_user_through_repository(): void
    {
        // Crear mock del repository
        $mockRepository = Mockery::mock(UserRepository::class);
        $mockRepository->shouldReceive('emailExists')
                      ->once()
                      ->with('john@example.com')
                      ->andReturn(false);
        
        $mockRepository->shouldReceive('create')
                      ->once()
                      ->andReturn(new User(['name' => 'John']));

        // Inyectar mock
        $userService = new UserService($mockRepository);
        
        $result = $userService->createUser([
            'email' => 'john@example.com',
            'name' => 'John'
        ]);

        $this->assertEquals('John', $result->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
```

---

## Casos de Uso Avanzados

### 1. Service con Múltiples Dependencias:

```php
<?php

namespace App\Services;

use App\Services\NotificationService;
use App\Services\FileService;
use App\Repositories\OrderRepository;
use App\Models\Order;

class OrderService
{
    public function __construct(
        private OrderRepository $orderRepository,
        private NotificationService $notificationService,
        private FileService $fileService
    ) {}

    public function processOrder(array $orderData): Order
    {
        // Crear orden
        $order = $this->orderRepository->create($orderData);
        
        // Generar factura PDF
        $invoicePath = $this->fileService->generateInvoice($order);
        
        // Enviar notificaciones
        $this->notificationService->sendOrderConfirmation($order);
        
        return $order;
    }
}
```

### 2. Service con Cache:

```php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Product;

class ProductService
{
    public function getFeaturedProducts()
    {
        return Cache::remember('featured_products', 3600, function () {
            return Product::where('is_featured', true)
                         ->with('images', 'category')
                         ->get();
        });
    }

    public function clearProductCache(): void
    {
        Cache::forget('featured_products');
        Cache::tags(['products'])->flush();
    }
}
```

### 3. Service con Queue Jobs:

```php
<?php

namespace App\Services;

use App\Jobs\ProcessPayment;
use App\Jobs\SendInvoiceEmail;
use App\Models\Order;

class OrderProcessingService
{
    public function processOrderAsync(Order $order): void
    {
        // Procesar pago en background
        ProcessPayment::dispatch($order)
            ->delay(now()->addMinutes(2));
        
        // Enviar factura después del pago
        SendInvoiceEmail::dispatch($order)
            ->delay(now()->addMinutes(5));
    }
}
```

---

## Mejores Prácticas

### 1. Principio de Responsabilidad Única
```php
// ❌ Mal: Service con muchas responsabilidades
class UserService
{
    public function createUser() {}
    public function sendEmail() {}
    public function processPayment() {}
    public function generateReport() {}
}

// ✅ Bien: Services especializados
class UserService
{
    public function createUser() {}
    public function updateUser() {}
}

class EmailService
{
    public function sendWelcomeEmail() {}
}

class ReportService
{
    public function generateUserReport() {}
}
```

### 2. Inyección de Dependencias
```php
// ❌ Mal: Dependencias hardcodeadas
class UserService
{
    public function sendEmail()
    {
        $mailer = new SmtpMailer(); // Hardcodeado
        $mailer->send();
    }
}

// ✅ Bien: Dependencias inyectadas
class UserService
{
    public function __construct(
        private MailerInterface $mailer
    ) {}
    
    public function sendEmail()
    {
        $this->mailer->send();
    }
}
```

### 3. Manejo de Errores
```php
class UserService
{
    public function createUser(array $data): User
    {
        try {
            // Validaciones
            if (empty($data['email'])) {
                throw new \InvalidArgumentException('Email es requerido');
            }
            
            // Lógica de creación
            return User::create($data);
            
        } catch (\Exception $e) {
            // Log del error
            logger()->error('Error creando usuario: ' . $e->getMessage());
            
            // Re-lanzar o manejar según el caso
            throw $e;
        }
    }
}
```

### 4. Documentación y Type Hints
```php
<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * Crea un nuevo usuario con los datos proporcionados
     *
     * @param array $userData Datos del usuario (name, email, password)
     * @return User El usuario creado
     * @throws \InvalidArgumentException Si los datos son inválidos
     */
    public function createUser(array $userData): User
    {
        // Implementation
    }
    
    /**
     * Obtiene todos los usuarios activos
     *
     * @return Collection<User>
     */
    public function getActiveUsers(): Collection
    {
        // Implementation
    }
}
```

---

## Preguntas Típicas de Entrevista

### Preguntas Técnicas:

**1. ¿Qué diferencia hay entre un Service y un Repository?**

**Respuesta:**
- **Repository**: Se enfoca en el acceso a datos y abstrae la capa de persistencia
- **Service**: Contiene lógica de negocio y puede usar múltiples repositories
- Un Service puede usar varios Repositories y añadir lógica adicional

**2. ¿Cómo registrarías un Service en Laravel?**

**Respuesta:**
```php
// En AppServiceProvider
public function register()
{
    // Binding simple
    $this->app->bind(UserService::class);
    
    // Singleton
    $this->app->singleton(PaymentService::class);
    
    // Con dependencias
    $this->app->bind(OrderService::class, function ($app) {
        return new OrderService(
            $app->make(OrderRepository::class),
            $app->make(NotificationService::class)
        );
    });
}
```

**3. ¿Cómo testearías un Service?**

**Respuesta:**
- Tests unitarios con PHPUnit
- Mocking de dependencias con Mockery
- Testing de la lógica de negocio aislada
- Feature tests para flujos completos

**4. ¿Cuándo usarías un Service vs un Helper?**

**Respuesta:**
- **Service**: Para lógica de negocio compleja, con estado, que requiere inyección de dependencias
- **Helper**: Para funciones simples, stateless, que no requieren dependencias externas

### Preguntas de Diseño:

**1. ¿Cómo organizarías Services en una aplicación grande?**

**Respuesta:**
- Por dominio/módulo: `App\Services\User\`, `App\Services\Order\`
- Services específicos vs generales
- Interfaces para contratos
- Service Providers dedicados por módulo

**2. ¿Qué patrones de diseño usarías con Services?**

**Respuesta:**
- **Strategy Pattern**: Para diferentes algoritmos de procesamiento
- **Observer Pattern**: Para eventos y listeners
- **Factory Pattern**: Para crear instancias complejas
- **Command Pattern**: Para operaciones que se pueden deshacer

### Preguntas de Casos Prácticos:

**1. Tienes que procesar un pago. ¿Cómo estructurarías los Services?**

```php
interface PaymentProcessorInterface
{
    public function process(PaymentData $data): PaymentResult;
}

class StripePaymentProcessor implements PaymentProcessorInterface
{
    public function process(PaymentData $data): PaymentResult
    {
        // Implementación Stripe
    }
}

class PaymentService
{
    public function __construct(
        private PaymentProcessorInterface $processor,
        private OrderService $orderService,
        private NotificationService $notificationService
    ) {}
    
    public function processOrderPayment(Order $order): PaymentResult
    {
        $paymentData = PaymentData::fromOrder($order);
        $result = $this->processor->process($paymentData);
        
        if ($result->isSuccessful()) {
            $this->orderService->markAsPaid($order);
            $this->notificationService->sendPaymentConfirmation($order);
        }
        
        return $result;
    }
}
```

**2. ¿Cómo manejarías transacciones en Services?**

```php
use Illuminate\Support\Facades\DB;

class UserService
{
    public function createUserWithProfile(array $userData, array $profileData): User
    {
        return DB::transaction(function () use ($userData, $profileData) {
            $user = User::create($userData);
            
            $user->profile()->create($profileData);
            
            // Si algo falla aquí, se hace rollback automático
            event(new UserCreated($user));
            
            return $user;
        });
    }
}
```

---

## Recursos Adicionales

### Libros Recomendados:
- "Clean Architecture" by Robert C. Martin
- "Domain-Driven Design" by Eric Evans
- "Patterns of Enterprise Application Architecture" by Martin Fowler

### Herramientas Útiles:
- **Laravel Debugbar**: Para debugging
- **Laravel Telescope**: Para monitoring
- **PHPStan/Psalm**: Para análisis estático
- **Laravel IDE Helper**: Para mejor autocompletado

---

¡Con esta guía tienes todo lo necesario para dominar los Services en Laravel y brillar en tu entrevista! Recuerda practicar implementando ejemplos y creando tests para consolidar el conocimiento.