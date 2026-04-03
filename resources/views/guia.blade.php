@extends('layouts.app')

@section('title', 'Guía - Phasmophobia Wiki')

@section('content')
    <h2>Bienvenido a la guía de Phasmophobia</h2>
    <p>
        En esta guía encontrarás todo lo que necesitas saber para convertirte en un experto cazador de fantasmas en el juego Phasmophobia.
        <span class="linea-destacada">Desde consejos para principiantes hasta estrategias avanzadas</span>,
        esta guía te ayudará a enfrentar los desafíos sobrenaturales que encontrarás en cada misión.
    </p>

    <hr class="section-divider">

    <!-- Artículo -->
    <article class="card bg-dark border-secondary mb-4">
        <div class="card-header bg-transparent border-secondary">
            <h3 class="card-title text-success mb-1">
                <i class="bi bi-backpack"></i> Equipamiento esencial
            </h3>
            <p class="text-muted mb-0">Para sobrevivir en el mundo de Phasmophobia, es crucial contar con el equipamiento adecuado</p>
        </div>
        <div class="card-body">
            <h4><i class="bi bi-broadcast"></i> Equipo básico de detección</h4>
            <p>Todo cazador de fantasmas debe tener a mano un conjunto básico de herramientas de detección. Esto incluye:</p>

            <ul class="list-group list-group-flush bg-transparent">
                <li class="list-group-item bg-transparent border-secondary text-light">
                    <i class="bi bi-lightning text-warning"></i> <strong>EMF Reader:</strong> Detecta campos electromagnéticos, una señal común de actividad paranormal.
                </li>
                <li class="list-group-item bg-transparent border-secondary text-light">
                    <i class="bi bi-chat-dots text-info"></i> <strong>Spirit Box:</strong> Permite comunicarse con los fantasmas a través de preguntas y respuestas.
                </li>
                <li class="list-group-item bg-transparent border-secondary text-light">
                    <i class="bi bi-lightbulb text-primary"></i> <strong>UV Flashlight:</strong> Revela huellas dactilares y manchas de sangre que pueden indicar la presencia de un fantasma.
                </li>
            </ul>
        </div>
    </article>

    <!-- Segundo artículo -->
    <article class="card bg-dark border-secondary mb-4">
        <div class="card-header bg-transparent border-secondary">
            <h3 class="card-title text-success mb-1">
                <i class="bi bi-shield-check"></i> Equipo de protección
            </h3>
            <p class="text-muted mb-0">Protégete de los fantasmas con estos objetos esenciales</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-plus-circle text-success fs-4 me-3"></i>
                        <div>
                            <h5 class="text-light">Crucifijo</h5>
                            <p class="text-muted mb-0">Previene que el fantasma inicie una cacería si está dentro del rango.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-lamp text-warning fs-4 me-3"></i>
                        <div>
                            <h5 class="text-light">Velas</h5>
                            <p class="text-muted mb-0">Mantén tu cordura iluminando el área con velas encendidas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-droplet text-info fs-4 me-3"></i>
                        <div>
                            <h5 class="text-light">Incienso</h5>
                            <p class="text-muted mb-0">Ahuyenta temporalmente al fantasma durante una cacería.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-box text-secondary fs-4 me-3"></i>
                        <div>
                            <h5 class="text-light">Escondites</h5>
                            <p class="text-muted mb-0">Armarios y lockers son tu mejor opción durante una cacería.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Alertas -->
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-info-circle-fill me-2"></i>
        <div>
            <strong>Consejo:</strong> Siempre lleva al menos un crucifijo y un incienso en misiones de dificultad profesional.
        </div>
    </div>

    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <div>
            <strong>Advertencia:</strong> Los fantasmas pueden escuchar tu micrófono. Habla con cuidado durante las cacerías.
        </div>
    </div>
@endsection

@section('sidebar')
    @parent
@endsection
