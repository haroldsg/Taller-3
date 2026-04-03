<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('bootstrap/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="icon" href="{{ asset('images/phasmophobia-icon.png') }}" type="image/png">

    <title>@yield('title', 'Phasmophobia Wiki')</title>
</head>

<body>
    <div id="wrapper">
        <!-- HEADER -->
        <header>
            <h1>Phasmophobia Wiki</h1>
            <p class="subtitle">Guia definitiva para el cazador de fantasmas</p>

            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                        aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarMain">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}"
                                    href="{{ route('inicio') }}">
                                    <i class="bi bi-house-door"></i> Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('curiosidades') ? 'active' : '' }}"
                                    href="{{ route('curiosidades') }}">
                                    <i class="bi bi-lightbulb"></i> Curiosidades
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('guia') ? 'active' : '' }}"
                                    href="{{ route('guia') }}">
                                    <i class="bi bi-book"></i> Guía
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('contactos.*') ? 'active' : '' }}" href="{{ route('contactos.index') }}">
                                    <i class="bi bi-person-lines-fill"></i> Contactos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://store.steampowered.com/app/739630/Phasmophobia/" target="_blank">
                                    <i class="bi bi-steam"></i> Steam
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- LAYOUT PRINCIPAL: CONTENT + SIDEBAR -->
        <div class="main-layout">
            <main class="content">
                @yield('content')
            </main>

            <aside class="sidebar">
                @yield('sidebar')

                @section('default-sidebar')
                    <h3><i class="bi bi-link-45deg"></i> Enlaces de interés</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://phasmophobia.fandom.com/" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-wikipedia"></i> Wiki oficial
                            </a>
                        </li>
                        <li>
                            <a href="https://discord.com/invite/phasmophobia" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-discord"></i> Discord Oficial
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@officialkineticgames" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-youtube"></i> YouTube Oficial
                            </a>
                        </li>
                        <li>
                            <a href="https://www.reddit.com/r/PhasmophobiaGame/" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-reddit"></i> Reddit Community
                            </a>
                        </li>
                    </ul>

                @show
            </aside>
        </div>

        <!-- FOOTER -->
        <footer>
            <div class="container text-center">
                <div>
                    <a href="http://validator.w3.org/check?uri=referer" target="_blank">
                        <img src="{{ asset('images/W3C/w3c-html.png') }}"
                                alt="Valid HTML5" height="31" width="88">
                    </a>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">
                        <img src="{{ asset('images/W3C/w3c-css.png') }}"
                                alt="Valid CSS3" height="31" width="88">
                    </a>
                </div>            


                <p>&copy; {{ date('Y') }} Phasmophobia Guia - Proyecto Educativo</p>
                <p>
                    Phasmophobia es propiedad de
                    <a href="https://kineticgames.co.uk/" target="_blank">Kinetic Games.</a>
                </p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
