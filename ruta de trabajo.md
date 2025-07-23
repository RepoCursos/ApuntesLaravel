# Roles y permisos

### Primero tenemos que instalar el kit de autenticacion

### Instalamos Laravel Spatie de la siguiente direccion 
https://spatie.be/docs/laravel-permission/v6/installation-laravel

Nota: Si usamos en las vistas las directivas:
@can('edit articles')
  //
@endcan
o 
@role('admin')
    I am a admin!
@else
    I am not a admin...
@endrole
Esto solo oculta pero no restringe el acceso, por lo que si en un panel administrativo el rol usuario quiere acceder a una funcionlidad a la cual no tiene permiso, ingresando la url puede acceder como si fuera el usuario "admin"
