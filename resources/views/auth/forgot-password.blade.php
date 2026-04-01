@extends('layouts.auth')

@section('title', 'Recuperar Contraseña - Phasmophobia Wiki')

@section('content')
<div class="auth-card wide">
    <div class="auth-card-header">
        <h2>Recuperar Contraseña</h2>
        <p>Responde tu pregunta de seguridad</p>
    </div>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensaje de éxito --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.reset') }}">
        @csrf

        {{-- Paso 1: Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">
                Correo Electrónico
            </label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="tucorreo@ejemplo.com"
                required
                autofocus
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">
                Ingresa el correo con el que te registraste.
            </div>
        </div>

        {{-- Paso 2: Pregunta de seguridad --}}
        <div class="mb-3">
            <label for="security_question" class="form-label">
                Pregunta de Seguridad
            </label>
            <select
                class="form-select @error('security_question') is-invalid @enderror"
                id="security_question"
                name="security_question"
                required
            >
                <option value="" disabled selected>Selecciona tu pregunta...</option>
                <option value="mascota" {{ old('security_question') == 'mascota' ? 'selected' : '' }}>¿Cuál es el nombre de tu primera mascota?</option>
                <option value="ciudad" {{ old('security_question') == 'ciudad' ? 'selected' : '' }}>¿En qué ciudad naciste?</option>
                <option value="madre" {{ old('security_question') == 'madre' ? 'selected' : '' }}>¿Cuál es el nombre de tu madre?</option>
                <option value="escuela" {{ old('security_question') == 'escuela' ? 'selected' : '' }}>¿Cuál fue tu primera escuela?</option>
                <option value="comida" {{ old('security_question') == 'comida' ? 'selected' : '' }}>¿Cuál es tu comida favorita?</option>
            </select>
            @error('security_question')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Paso 3: Respuesta de seguridad --}}
        <div class="mb-3">
            <label for="security_answer" class="form-label">
                Respuesta de Seguridad
            </label>
            <input
                type="text"
                class="form-control @error('security_answer') is-invalid @enderror"
                id="security_answer"
                name="security_answer"
                value="{{ old('security_answer') }}"
                placeholder="Tu respuesta secreta"
                required
            >
            @error('security_answer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <hr class="my-4" style="border-color: #3f3f46;">

        <p class="text-muted mb-3">
            <strong>Nueva contraseña</strong>
        </p>

        {{-- Paso 4: Nueva contraseña --}}
        <div class="mb-3">
            <label for="password" class="form-label">
                Nueva Contraseña
            </label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                placeholder="Mínimo 8 caracteres"
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Paso 5: Confirmar nueva contraseña --}}
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Confirmar Nueva Contraseña
            </label>
            <input
                type="password"
                class="form-control"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Repite tu nueva contraseña"
                required
            >
        </div>

        {{-- Botón Submit --}}
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-lg">
                Restablecer Contraseña
            </button>
        </div>
    </form>

    {{-- Enlaces adicionales --}}
    <div class="auth-links">
        <hr>
        <p>
            <a href="{{ route('login') }}">
                Volver a Iniciar Sesión
            </a>
        </p>
    </div>
</div>
@endsection
