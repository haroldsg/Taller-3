@extends('layouts.auth')

@section('title', 'Iniciar Sesión - Phasmophobia Wiki')

@section('content')
    <div class="auth-card">
        <div class="auth-card-header">
            <h2>Iniciar Sesión</h2>
            <p>Accede a tu cuenta de cazador</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form id="login-form">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email" value="{{ old('email') }}"
                    placeholder="tucorreo@ejemplo.com" autofocus>
                <div class="invalid-feedback" id="email-feedback">
                    @error('email'){{ $message }}@enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" name="password" placeholder="Tu contraseña">
                <div class="invalid-feedback" id="password-feedback">
                    @error('password'){{ $message }}@enderror
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="button" class="btn btn-success btn-lg" id="submit-btn">
                    Iniciar Sesión
                </button>
            </div>
        </form>

        <div class="auth-links">
            <a href="{{ route('password.request') }}">
                <i class="bi bi-question-circle"></i> ¿Olvidaste tu contraseña?
            </a>
            <hr>
            <p>
                ¿No tienes cuenta?
                <a href="{{ route('register') }}">Regístrate aquí</a>
            </p>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#login-form input').on('keydown', function (e) {
        if (e.key === 'Enter') $('#submit-btn').trigger('click');
    });

    $('#submit-btn').on('click', function () {
        clearInvalid('email', 'email-feedback');
        clearInvalid('password', 'password-feedback');

        let valid = true;

        if (!$('#email').val().trim()) {
            setInvalid('email', 'email-feedback', 'Por favor ingresa tu correo electrónico.');
            valid = false;
        }

        if (!$('#password').val()) {
            setInvalid('password', 'password-feedback', 'Por favor ingresa tu contraseña.');
            valid = false;
        }

        if (!valid) return;

        $('#submit-btn').prop('disabled', true).text('Verificando...');

        $.ajax({
            url: '{{ route("login.submit") }}',
            method: 'POST',
            dataType: 'json',
            data: {
                email: $('#email').val().trim(),
                password: $('#password').val(),
            },
            success: function (data) {
                window.location.href = data.redirect;
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.error || 'Credenciales inválidas.';
                setInvalid('email', 'email-feedback', msg);
                $('#submit-btn').prop('disabled', false).text('Iniciar Sesión');
            }
        });
    });

</script>
@endsection
