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

    <link rel="icon" href="{{ asset('images/phasmophobia-icon.png') }}" type="image/png">

    <title>@yield('title', 'Phasmophobia Wiki')</title>

    <script src="{{ asset('js/jquery-4.0.0.min.js') }}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        });

        function setInvalid(inputId, feedbackId, message) {
            $('#' + inputId).addClass('is-invalid');
            $('#' + feedbackId).text(message);
        }

        function clearInvalid(inputId, feedbackId) {
            $('#' + inputId).removeClass('is-invalid');
            $('#' + feedbackId).text('');
        }
    </script>

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

@yield('scripts')
