<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>@yield('title', 'Phasmophobia Wiki')</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <!-- Header simple -->
    <header class="auth-header">
        <h1><i class="bi bi-ghost"></i> Phasmophobia Wiki</h1>
    </header>

    <!-- Contenido principal -->
    <main class="auth-main">
        @yield('content')
    </main>

    <!-- Footer simple -->
    <footer class="auth-footer">
        <p>&copy; {{ date('Y') }} Phasmophobia Wiki</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
