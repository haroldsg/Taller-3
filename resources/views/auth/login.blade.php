@extends('layouts.auth')

@section('title', 'Iniciar Sesión - Phasmophobia Wiki')

@section('content')
<div class="auth-card">
    <div class="auth-card-header">
        <h2>Iniciar Sesión</h2>
        <p>Accede a tu cuenta de cazador</p>
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

    {{-- Mensaje de sesión --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
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
        </div>

        {{-- Contraseña --}}
        <div class="mb-3">
            <label for="password" class="form-label">
                Contraseña
            </label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                placeholder="Tu contraseña"
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Botón Submit --}}
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-lg">
                Iniciar Sesión
            </button>
        </div>
    </form>

    {{-- Enlaces adicionales --}}
    <div class="auth-links">
        <a href="{{ route('password.request') }}">
            <i class="bi bi-question-circle"></i> ¿Olvidaste tu contraseña?
        </a>
        <hr>
        <p>¿No tienes cuenta?
            <a href="{{ route('register') }}">
                Regístrate aquí
            </a>
        </p>
    </div>
</div>
@endsection
