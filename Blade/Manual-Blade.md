### BLADE LARAVEL

## Sintaxis Fundamental
**Mostrar datos:**
- `{{ $variable }}` - Escapado automático (seguro contra XSS)
- `{!! $variable !!}` - Sin escapar (HTML crudo)
- `{{ $variable ?? 'valor por defecto' }}` - Con valor por defecto

**Comentarios:**
- `{{-- Este es un comentario de Blade --}}`

## Directivas Principales
**Condicionales:**
```php
@if($condicion)
@elseif($otra_condicion)
@else
@endif

@unless($condicion) // Si NO se cumple
@endunless

@isset($variable)
@endisset

@empty($variable)
@endempty
```

**Bucles:**
```php
@foreach($items as $item)
@endforeach

@forelse($items as $item)
@empty
    <p>No hay elementos</p>
@endforelse

@for($i = 0; $i < 10; $i++)
@endfor

@while($condicion)
@endwhile
```

## Layouts y Herencia
**Layout padre:**
```php
<!DOCTYPE html>
<html>
<head>
    @yield('title')
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>
```

**Vista hija:**
```php
@extends('layouts.app')

@section('title', 'Mi Página')

@section('content')
    <h1>Contenido aquí</h1>
@endsection

@push('scripts')
    <script src="mi-script.js"></script>
@endpush
```
## Componentes
**Definir componente:**
```php
// resources/views/components/alert.blade.php
<div class="alert alert-{{ $type }}">
    {{ $message }}
</div>
```

**Usar componente:**
```php
<x-alert type="success" message="¡Éxito!" />
```

## Inclusión de Vistas
```php
@include('partials.header')
@include('partials.sidebar', ['variable' => $valor])
@includeIf('partials.opcional')
@includeWhen($condicion, 'partials.condicional')
```

## Directivas Útiles
- `@csrf` - Token CSRF para formularios
- `@method('PUT')` - Spoofing de métodos HTTP
- `@auth` / `@guest` - Verificar autenticación
- `@can('permiso')` - Verificar permisos
- `@json($array)` - Convertir a JSON de forma segura

## Compilación y Caché
- Blade compila las plantillas a PHP puro para mejor rendimiento
- Se almacenan en `storage/framework/views/`
- Comando para limpiar caché: `php artisan view:clear`

## Ventajas Clave
1. **Seguridad**: Escapado automático contra XSS
2. **Herencia**: Sistema potente de layouts
3. **Rendimiento**: Compilación a PHP nativo
4. **Flexibilidad**: Permite PHP nativo cuando sea necesario
5. **Componentes**: Reutilización de código
6. **Integración**: Perfecta integración con Laravel