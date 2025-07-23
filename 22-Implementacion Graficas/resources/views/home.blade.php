<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo de Fútbol 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .bg-gray-100 {
            background-color: #f8f9fa;
        }

        .bg-gray-200 {
            background-color: #e9ecef;
        }

        .bg-gray-300 {
            background-color: #99f7d0;
        }

        .bg-gray-800 {
            background-color: #343a40;
        }

        .text-gray-600 {
            color: #6c757d;
        }

        .text-gray-800 {
            color: #343a40;
        }

        .hero-image {
            background: url(/img/fondoHeader.jpeg) no-repeat center;
            width: 100%;
            height: 300px;
            background-size: 100% 100%;
        }

        .reg-image {
            background: url(/img/fondo3.png) no-repeat center;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
        }

        .imagen {
            height: 500px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- MENU -->
    <nav class="navbar navbar-expand-md navbar-dark bg-gray-800">
        <div class="container">
            <img src="/img/logoTorneo.png" style="width: 85px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#infoTorneo">Información</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reglas">Reglas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Iniciar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/clasificaciones" class="dropdown-item">Visita</a></li>
                            <li><a href="/layouts/admin" class="dropdown-item">Admin</a></li> //Direccion a la dashboard del admin
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>
