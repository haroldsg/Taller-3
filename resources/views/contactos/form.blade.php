@extends('layouts.app')

@section('title', isset($contacto) ? 'Editar Contacto' : 'Nuevo Contacto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ isset($contacto) ? 'Editar Contacto' : 'Nuevo Contacto' }}</h2>
        <a href="{{ route('contactos.index') }}" class="btn btn-secondary">
            Volver a la lista
        </a>
    </div>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card bg-dark border-secondary">
        <div class="card-body">
            <form
                method="POST"
                action="{{ isset($contacto) ? route('contactos.update', $contacto->id) : route('contactos.store') }}"
                id="contactoForm"
            >
                @csrf
                @if(isset($contacto))
                    @method('PUT')
                @endif

                {{-- DATOS PERSONALES --}}
                <h5 class="text-success mb-3 border-bottom border-secondary pb-2">Datos Personales</h5>

                <div class="row">
                    {{-- Cédula --}}
                    <div class="col-md-4 mb-3">
                        <label for="cedula" class="form-label text-light">Cédula <span class="text-danger">*</span></label>
                        <input
                            type="number"
                            class="form-control @error('cedula') is-invalid @enderror"
                            id="cedula"
                            name="cedula"
                            value="{{ old('cedula', $contacto->cedula ?? '') }}"
                            placeholder="Ej: 28330946"
                            required
                            {{ isset($contacto) ? 'readonly' : '' }}
                        >
                        @error('cedula')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text text-light">La cédula debe ser única.</div>
                    </div>

                    {{-- Nombre --}}
                    <div class="col-md-4 mb-3">
                        <label for="nombre" class="form-label text-light">Nombre <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $contacto->nombre ?? '') }}"
                            placeholder="Ej: Juan"
                            required
                        >
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Apellido --}}
                    <div class="col-md-4 mb-3">
                        <label for="apellido" class="form-label text-light">Apellido <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('apellido') is-invalid @enderror"
                            id="apellido"
                            name="apellido"
                            value="{{ old('apellido', $contacto->apellido ?? '') }}"
                            placeholder="Ej: Pérez"
                            required
                        >
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Edad --}}
                    <div class="col-md-4 mb-3">
                        <label for="edad" class="form-label text-light">Edad <span class="text-danger">*</span></label>
                        <input
                            type="number"
                            class="form-control @error('edad') is-invalid @enderror"
                            id="edad"
                            name="edad"
                            value="{{ old('edad', $contacto->edad ?? '') }}"
                            placeholder="Ej: 25"
                            min="16"
                            max="89"
                            required
                        >
                        @error('edad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text text-light">Debe ser mayor a 15 y menor a 90.</div>
                    </div>

                    {{-- Género --}}
                    <div class="col-md-4 mb-3">
                        <label for="genero" class="form-label text-light">Género <span class="text-danger">*</span></label>
                        <select
                            class="form-select @error('genero') is-invalid @enderror"
                            id="genero"
                            name="genero"
                            required
                        >
                            <option value="" disabled {{ old('genero', $contacto->genero ?? '') == '' ? 'selected' : '' }}>Selecciona...</option>
                            <option value="masculino" {{ old('genero', $contacto->genero ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('genero', $contacto->genero ?? '') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="otro" {{ old('genero', $contacto->genero ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('genero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Estado Civil --}}
                    <div class="col-md-4 mb-3">
                        <label for="estado_civil" class="form-label text-light">Estado Civil <span class="text-danger">*</span></label>
                        <select
                            class="form-select @error('estado_civil') is-invalid @enderror"
                            id="estado_civil"
                            name="estado_civil"
                            required
                        >
                            <option value="" disabled {{ old('estado_civil', $contacto->estado_civil ?? '') == '' ? 'selected' : '' }}>Selecciona...</option>
                            <option value="soltero" {{ old('estado_civil', $contacto->estado_civil ?? '') == 'soltero' ? 'selected' : '' }}>Soltero</option>
                            <option value="casado" {{ old('estado_civil', $contacto->estado_civil ?? '') == 'casado' ? 'selected' : '' }}>Casado</option>
                            <option value="divorciado" {{ old('estado_civil', $contacto->estado_civil ?? '') == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                            <option value="concubinato" {{ old('estado_civil', $contacto->estado_civil ?? '') == 'concubinato' ? 'selected' : '' }}>Concubinato</option>
                            <option value="viudo" {{ old('estado_civil', $contacto->estado_civil ?? '') == 'viudo' ? 'selected' : '' }}>Viudo</option>
                        </select>
                        @error('estado_civil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- CONTACTO --}}
                <h5 class="text-success mb-3 mt-4 border-bottom border-secondary pb-2">Información de Contacto</h5>

                <div class="row">
                    {{-- Teléfono 1 --}}
                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label text-light">Teléfono <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('telefono') is-invalid @enderror"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono', $contacto->telefono ?? '') }}"
                            placeholder="Ej: 0412-1234567"
                            maxlength="12"
                            pattern="\d{4}-\d{7}"
                            title="Formato: 4 dígitos-guión-7 dígitos (Ej: 0412-1234567)"
                            required
                        >
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text text-light">Formato: XXXX-XXXXXXX</div>
                    </div>

                    {{-- Teléfono 2 --}}
                    <div class="col-md-6 mb-3">
                        <label for="telefono2" class="form-label text-light">Teléfono 2 (Opcional)</label>
                        <input
                            type="text"
                            class="form-control @error('telefono2') is-invalid @enderror"
                            id="telefono2"
                            name="telefono2"
                            value="{{ old('telefono2', $contacto->telefono2 ?? '') }}"
                            placeholder="Ej: 0414-7654321"
                            maxlength="12"
                            pattern="\d{4}-\d{7}"
                            title="Formato: 4 dígitos-guión-7 dígitos (Ej: 0414-7654321)"
                        >
                        @error('telefono2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Email 1 --}}
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label text-light">Email <span class="text-danger">*</span></label>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email', $contacto->email ?? '') }}"
                            placeholder="Ej: juan@example.com"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email 2 --}}
                    <div class="col-md-6 mb-3">
                        <label for="email2" class="form-label text-light">Email 2 (Opcional)</label>
                        <input
                            type="email"
                            class="form-control @error('email2') is-invalid @enderror"
                            id="email2"
                            name="email2"
                            value="{{ old('email2', $contacto->email2 ?? '') }}"
                            placeholder="Ej: juan.trabajo@example.com"
                        >
                        @error('email2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Dirección --}}
                <div class="mb-3">
                    <label for="direccion" class="form-label text-light">Dirección <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        class="form-control @error('direccion') is-invalid @enderror"
                        id="direccion"
                        name="direccion"
                        value="{{ old('direccion', $contacto->direccion ?? '') }}"
                        placeholder="Ej: Av. Principal 123, Valencia"
                        required
                    >
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DATOS LABORALES --}}
                <h5 class="text-success mb-3 mt-4 border-bottom border-secondary pb-2">Datos Laborales</h5>

                <div class="row">
                    {{-- Departamento --}}
                    <div class="col-md-6 mb-3">
                        <label for="departamento" class="form-label text-light">Departamento <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('departamento') is-invalid @enderror"
                            id="departamento"
                            name="departamento"
                            value="{{ old('departamento', $contacto->departamento ?? '') }}"
                            placeholder="Ej: Recursos Humanos"
                            required
                        >
                        @error('departamento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Cargo --}}
                    <div class="col-md-6 mb-3">
                        <label for="cargo" class="form-label text-light">Cargo <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('cargo') is-invalid @enderror"
                            id="cargo"
                            name="cargo"
                            value="{{ old('cargo', $contacto->cargo ?? '') }}"
                            placeholder="Ej: Analista"
                            required
                        >
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Botones --}}
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        {{ isset($contacto) ? 'Actualizar Contacto' : 'Guardar Contacto' }}
                    </button>
                    <a href="{{ route('contactos.index') }}" class="btn btn-secondary btn-lg">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('sidebar')
    @parent
@endsection
