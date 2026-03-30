@extends('layouts.app')

@section('title', 'Curiosidades - Phasmophobia Wiki')

@section('content')
    <h2>Curiosidades</h2>
    <p>
        En esta sección encontrarás datos interesantes y curiosidades sobre el juego Phasmophobia.
        <span class="linea-destacada">Desde secretos del desarrollo hasta anécdotas de la comunidad</span>,
        estas curiosidades te permitirán conocer más a fondo el mundo paranormal del juego.
    </p>

    <hr class="section-divider">

    <!-- Sección Tarjetas con Bootstrap Cards -->
    <div class="seccion-tarjetas">
        <h3><i class="bi bi-ghost"></i> Datos sobre los fantasmas</h3>
        <p>Cada fantasma tiene una personalidad propia, aquí podrás ver algunos datos curiosos sobre ellos.</p>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="card bg-dark border-success h-100">
                    <div class="card-body">
                        <h4 class="card-title text-success">
                            <i class="bi bi-speedometer2"></i> El Revenant
                        </h4>
                        <p class="card-text text-light">
                            El Revenant es el fantasma más rápido durante una cacería si sabe dónde estás.
                            Su velocidad puede alcanzar 3.0 m/s, pero si pierde tu rastro se ralentiza
                            drásticamente a 1.0 m/s. La clave es romper la línea de visión y esconderte rápidamente.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-secondary">
                        <small class="text-muted"><i class="bi bi-lightning"></i> Velocidad: Variable</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-dark border-success h-100">
                    <div class="card-body">
                        <h4 class="card-title text-success">
                            <i class="bi bi-snow"></i> El Hantu
                        </h4>
                        <p class="card-text text-light">
                            El Hantu es más rápido en habitaciones frías y más lento en habitaciones cálidas.
                            Si ves aliento helado saliendo del fantasma durante una cacería, es una señal
                            distintiva de que estás tratando con un Hantu.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-secondary">
                        <small class="text-muted"><i class="bi bi-thermometer-snow"></i> Le gusta el frío</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Lista con Bootstrap -->
    <div class="seccion-lista mt-4">
        <h3><i class="bi bi-controller"></i> 10 Datos que no conocías del juego</h3>
        <p>Más allá de los fantasmas, el propio juego esconde secretos y mecánicas que muchos jugadores desconocen.</p>

        <div class="list-group list-group-flush">
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark me-3 align-self-start">1</span>
                <div>
                    El juego fue desarrollado inicialmente por una sola persona, Dknighter (CJ), antes de expandir
                    el equipo de Kinetic Games. Todo el concepto nació como un proyecto personal de pasión por el género de terror.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark me-3 align-self-start">2</span>
                <div>
                    Los fantasmas realmente escuchan tu voz a través del micrófono usando reconocimiento de voz.
                    Decir el nombre del fantasma puede provocar eventos paranormales y aumentar la actividad.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark me-3 align-self-start">3</span>
                <div>
                    El crucifijo solo funciona si está en el suelo dentro de un radio de 3 metros
                    (5 metros para el Banshee) de la posición del fantasma cuando intenta iniciar una cacería.
                    Sostenerlo en la mano no tiene ningún efecto.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark me-3 align-self-start">4</span>
                <div>
                    La temperatura de congelación como evidencia se detecta por debajo de 0 grados Celsius.
                    Un termómetro puede marcar temperaturas bajas sin que sea evidencia de congelación real.
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Spotlight con Bootstrap -->
    <div class="seccion-spotlight mt-4">
        <h3><i class="bi bi-star-fill"></i> Curiosidades del Desarrollo</h3>

        <div class="row g-3">
            <div class="col-12">
                <div class="card bg-dark border-primary">
                    <div class="card-body">
                        <h4 class="card-title text-info">
                            <i class="bi bi-code-slash"></i> Motor del juego
                        </h4>
                        <p class="card-text text-light">
                            Phasmophobia está desarrollado en Unity y utiliza el sistema de reconocimiento
                            de voz de Windows para detectar cuando los jugadores hablan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark border-primary h-100">
                    <div class="card-body">
                        <h4 class="card-title text-info">
                            <i class="bi bi-people"></i> Comunidad
                        </h4>
                        <p class="card-text text-light">
                            El juego vendió más de 5 millones de copias en sus primeros 6 meses,
                            convirtiéndose en un fenómeno viral durante 2020.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark border-primary h-100">
                    <div class="card-body">
                        <h4 class="card-title text-info">
                            <i class="bi bi-headset-vr"></i> VR Nativo
                        </h4>
                        <p class="card-text text-light">
                            Phasmophobia fue diseñado desde el inicio con soporte completo para VR,
                            permitiendo una experiencia de terror inmersiva única.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @parent
@endsection
