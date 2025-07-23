<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- la @-yield directiva se utiliza para mostrar el contenido de una sección determinada, en este caso el titulo -->
    <title>@yield('title')</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fon-image {
            background: url(/img/fondoGeneral.jpeg) center;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
        }
    </style>
</head>

<body class="fon-image">
    <!-- este es el codigo base de nuestra apliacion por lo que se mantendra la escturcuta de nuestros css, js
         y toda confuguracion base como los meta y linck nesesarios -->

    <!-- la @-include directiva: le permite incluir una vista de Blade desde otra vista. Todas las variables
         que estén disponibles para la vista de los padres se pondrán a disposición de la opsinión incluida
         en esta ocacion estamos incluyendo el menu para que se muestre en toda la aplicacion -->
    @include('layouts._partials.menu-guest')

    <!-- la @-yield directiva: se utiliza para mostrar el contenido de una sección determinada en este caso el contenido -->
    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
