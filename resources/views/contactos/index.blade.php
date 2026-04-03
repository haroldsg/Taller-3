@extends('layouts.app')

@section('title', 'Lista de Contactos - Phasmophobia Wiki')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Lista de Contactos</h2>
        <a href="{{ route('contactos.create') }}" class="btn btn-success">
            Nuevo Contacto
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Mensaje de error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabla de contactos --}}
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Cuando conectes la BD, aquí irá el @foreach --}}
                @forelse ($contactos ?? [] as $contacto)
                    <tr>
                        <td>{{ $contacto->cedula }}</td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->apellido }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td>{{ $contacto->departamento }}</td>
                        <td>
                            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-sm btn-warning mb-1">
                                Editar
                            </a>
                            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este contacto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No hay contactos registrados.
                            <a href="{{ route('contactos.create') }}">Crear el primero</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación (cuando conectes la BD) --}}
    {{-- {{ $contactos->links() }} --}}
@endsection

@section('sidebar')
    @parent
@endsection
