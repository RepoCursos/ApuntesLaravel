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
                        <a class="nav-link dropdown-toggle" href="#" role="button" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Iniciar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/clasificaciones" class="dropdown-item">Visita</a></li>
                            <li><a href="/layouts/admin" class="dropdown-item">Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CABECERA -->
    <header class="bg-dark text-white text-center py-5 hero-image">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Gran Torneo de Fútbol</h1>
            <p class="lead mb-4 fw-bold">¡Demuestra tu instinto en el campo!</p>
            <button class="btn btn-lg btn-secondary">Inscríbete Ahora</button>
        </div>
    </header>

    <!-- Carrusel con categorias -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4 text-gray-800">Categorías del Torneo</h2>
            <div id="categoriesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/carrusel1.png" class="d-block w-100 imagen" alt="Fútbol Masculino">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¡Bienvenidos al Torneo de Fútbol para Adultos!</h5>
                            <p>
                                Únete a la emoción del fútbol con jugadores de todas las edades mayores de 18 años. 
                                Disfruta de partidos intensos, habilidades variadas y una celebración del deporte en 
                                todas sus formas. ¡No te pierdas la oportunidad de ser parte de esta vibrante competición 
                                y apoyar a los equipos en cada jugada emocionante!
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/carrusel2.png" class="d-block w-100 imagen" alt="Fútbol Femenino">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¡Bienvenidos al Torneo de Fútbol Femenino!</h5>
                            <p>
                                Celebra la pasión y el talento de nuestras futbolistas en un torneo lleno de energía
                                y habilidades destacadas. Vive la emoción de cada partido y apoya a las futuras estrellas del fútbol. 
                                ¡Únete a nosotros para celebrar el deporte y el espíritu de equipo en grande!
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/carrusel3.png" class="d-block w-100 imagen" alt="Fútbol Juvenil">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¡Bienvenidos al Torneo Juvenil de Fútbol!</h5>
                            <p>
                                Únete a la emoción del fútbol y conviértete en uno de los mejores jóvenes talentos entre
                                12 a 18 años. Disfruta de partidos vibrantes,
                                habilidades impresionantes y momentos inolvidables. ¡No te pierdas la oportunidad de ser
                                parte de esta celebración del deporte y la camaradería!
                            </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#categoriesCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#categoriesCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Informacion del Torneo-->
    <section class="py-5 bg-gray-200">
        <div class="container">
            <h2 class="text-center mb-5 text-gray-800" id="infoTorneo">Información del Torneo</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-calendar fa-3x text-gray-800 mb-3"></i>
                            <h3 class="card-title h5 text-gray-800">Fecha</h3>
                            <p class="card-text text-gray-600">15 de Julio - 30 de Agosto, 2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-map-marker-alt fa-3x text-gray-800 mb-3"></i>
                            <h3 class="card-title h5 text-gray-800">Ubicación</h3>
                            <p class="card-text text-gray-600">Estadio Municipal, Ciudad Deportiva</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x text-gray-800 mb-3"></i>
                            <h3 class="card-title h5 text-gray-800">Equipos</h3>
                            <p class="card-text text-gray-600">16 equipos por categoría</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <i class="fas fa-trophy fa-3x text-gray-800 mb-3"></i>
                            <h3 class="card-title h5 text-gray-800">Premio</h3>
                            <p class="card-text text-gray-600">Trofeos y medallas para los ganadores</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reglas -->
    <section class="p-5 text-white reg-image">
        <div class="container">
            <h2 class="text-center mb-5" id="reglas">Reglas y Regulaciones</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title h5 text-gray-800"><i
                                    class="fas fa-book me-2 text-gray-800"></i>Reglas Generales</h3>
                            <ul class="list-unstyled text-gray-600">
                                <li><i class="fas fa-check me-2"></i>Los partidos tendrán una duración de 90
                                    minutos, divididos en dos tiempos de 45 minutos cada uno.</li>
                                <li><i class="fas fa-check me-2"></i>Cada equipo puede realizar hasta 5
                                    sustituciones por partido.</li>
                                <li><i class="fas fa-check me-2"></i>Se aplicará la regla del fuera de juego
                                    según las normas de la FIFA.</li>
                                <li><i class="fas fa-check me-2"></i>El uso de espinilleras es obligatorio para
                                    todos los jugadores.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title h5 text-gray-800"><i
                                    class="fas fa-clipboard-list me-2 text-gray-800"></i>Sistema de Competición
                            </h3>
                            <ul class="list-unstyled text-gray-600">
                                <li><i class="fas fa-check me-2"></i>El torneo se dividirá en fase de grupos y
                                    fase eliminatoria.</li>
                                <li><i class="fas fa-check me-2"></i>Los dos mejores equipos de cada grupo
                                    avanzarán a la fase eliminatoria.</li>
                                <li><i class="fas fa-check me-2"></i>En caso de empate en la fase eliminatoria,
                                    se procederá a la tanda de penaltis.</li>
                                <li><i class="fas fa-check me-2"></i>Se otorgarán 3 puntos por victoria, 1 por
                                    empate y 0 por derrota en la fase de grupos.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title h5 text-gray-800"><i
                                    class="fas fa-user-friends me-2 text-gray-800"></i>Elegibilidad de
                                Jugadores</h3>
                            <ul class="list-unstyled text-gray-600">
                                <li><i class="fas fa-check me-2"></i>Los jugadores deben tener entre 18 y 35
                                    años para la categoría adulta.</li>
                                <li><i class="fas fa-check me-2"></i>Para la categoría juvenil, los jugadores
                                    deben tener entre 15 y 17 años.</li>
                                <li><i class="fas fa-check me-2"></i>Todos los jugadores deben presentar un
                                    certificado médico de aptitud física.</li>
                                <li><i class="fas fa-check me-2"></i>Se permite un máximo de 2 jugadores
                                    profesionales por equipo en la categoría adulta.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title h5 text-gray-800">
                                <i class="fa-solid fa-handshake me-2 text-gray-800"></i>Conducta y Disciplina
                            </h3>
                            <ul class="list-unstyled text-gray-600">
                                <li><i class="fas fa-check me-2"></i>Se aplicará un sistema de tarjetas
                                    amarillas y rojas según las reglas de la FIFA.</li>
                                <li><i class="fas fa-check me-2"></i>La acumulación de 3 tarjetas amarillas
                                    resultará en 1 partido de suspensión.</li>
                                <li><i class="fas fa-check me-2"></i>Una tarjeta roja directa conllevará como
                                    mínimo 1 partido de suspensión.</li>
                                <li><i class="fas fa-check me-2"></i>Se espera un comportamiento deportivo de
                                    todos los participantes, dentro y fuera del campo.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-secondary">Descargar Reglamento Completo</button>
            </div>
        </div>
    </section>

    <!-- Patrocinadores -->
    <section class="py-5 bg-gray-200">
        <div class="container">
            <h2 class="text-center mb-5 text-gray-800">Nuestros Patrocinadores</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/Adidas.jpeg" class="card-img" alt="Sponsor 1">
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/Coca-Cola.jpeg" class="card-img" alt="Sponsor 2">
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/Nike.jpeg" class="card-img" alt="Sponsor 3">
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/duff.jpeg" class="card-img-top" alt="Sponsor 4">
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/Puma.jpeg" class="card-img-top" alt="Sponsor 5">
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="/img/Burguesa.jpeg" alt="Sponsor 6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registrarse -->
    <section class="py-5 bg-gray-300">
        <div class="container" id="registro">
            <h2 class="text-center mb-4 text-gray-800">¿Listo para participar?</h2>
            <p class="text-center mb-4 text-gray-800">Regístrate ahora y sé parte de este emocionante torneo</p>
            <form class="row g-3 justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-secondary">Registrarse</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <img src="/img/logoTorneo.png" alt="Logo del Torneo de Fútbol" class="img-fluid mb-3"
                        style="max-width: 150px;">
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-3">Contacto</h5>
                    <p><i class="fas fa-phone me-2"></i> +34 123 456 789</p>
                    <p><i class="fas fa-envelope me-2"></i> info@torneofutbol2024.com</p>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3 text-center">Síguenos:</h5>
                    <div class="d-flex justify-content-start justify-content-md-end">
                        <a href="#" class="text-white me-4" aria-label="Facebook"><i
                                class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-white me-4" aria-label="Twitter"><i
                                class="fab fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-white me-4" aria-label="Instagram"><i
                                class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white" aria-label="YouTube"><i
                                class="fab fa-youtube fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center py-2">
                <img src="/img/logo.jpeg" style="width: 35px; height: 30px" alt="">
                <p>&copy; 2024 Torneo de Fútbol. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
