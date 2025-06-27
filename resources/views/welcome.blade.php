<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitácora de Actividades</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero {
            padding: 50px 0;
            text-align: center;
        }

        .btn-custom {
            background-color: #4f46e5;
            color: white;
        }

        .btn-custom:hover {
            background-color: #4338ca;
            color: white;
        }

        .carousel img {
            object-fit: cover;
            height: 400px;
        }
    </style>
</head>
<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">Bitácora</a>
            @if (Route::has('login'))
                <div class="ms-auto">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
          <!-- Esto es lo de el encabezado  -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3 text-dark">Bienvenido a tu Bitácora de Actividades</h1>
            <p class="lead text-secondary mb-4">
                Registra, clasifica y da seguimiento a tus actividades diarias. Administra tu tiempo y prioridades con facilidad.
            </p>
            <a href="{{ route('login') }}" class="btn btn-lg btn-custom px-5">Comenzar ahora</a>
        </div>
    </section>

    <!-- Carrusel -->
    <div id="landingCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('imagenes/Organiza.jpg') }}" class="d-block w-100" alt="Organiza tu día">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Organiza tu día</h5>
                    <p>Empieza cada jornada con tus tareas claras y en orden.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imagenes/Planifica.jpg') }}" class="d-block w-100" alt="Planifica facilmente">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Planifica con facilidad</h5>
                    <p>Usa tu bitácora para gestionar tu tiempo con eficiencia.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imagenes/seguimiento.jpg') }}" class="d-block w-100" alt="Haz seguimiento a tus logros">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Haz seguimiento a tu progreso</h5>
                    <p>Monitorea tus avances y mantén tu motivación al máximo.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#landingCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#landingCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>


    <!-- Footer -->
    <footer class="text-center py-4 text-muted small bg-white border-top">
        &copy; {{ date('Y') }} Bitácora de Actividades | Desarrollado por Diego Iván
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
