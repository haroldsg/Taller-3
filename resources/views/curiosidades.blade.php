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

    <!-- Sección Tarjetas -->
    <div class="seccion-tarjetas">
        <h3><i class="bi bi-ghost"></i> Datos sobre los fantasmas</h3>
        <p>Cada fantasma tiene una personalidad propia, aquí podrás ver algunos datos curiosos sobre ellos.</p>

        <div class="d-flex flex-column flex-md-row flex-wrap w-100 gap-3">

            <x-tarjeta-fantasma nombre="El Revenant Implacable"
                descripcion="El Revenant es el fantasma más rápido durante una cacería si sabe dónde estás. Su velocidad
                    puede alcanzar 3.0 m/s, pero si pierde tu rastro se ralentiza drásticamente a 1.0 m/s. La
                    clave es romper la línea de visión y esconderte rápidamente."
                detalleAdicional="Es muy veloz" />

            <x-tarjeta-fantasma nombre="El Espectro y la Sal"
                descripcion="El Espectro es el unico fantasma que puede teletransportarse hasta un jugador aleatorio, lo que
                    lo hace impredecible. Sin embargo, pisar sal lo enfurece y aumenta la actividad paranormal
                    significativamente, convirtiendolo en un arma de doble filo para los cazadores."
                detalleAdicional="Le enfurece la sal" />

            <x-tarjeta-fantasma nombre="El Mímico: Maestro del Engaño"
                descripcion="El Mímico puede imitar el comportamiento de cualquier otro fantasma, haciendo casi imposible
                    identificarlo por comportamiento. Su única pista extra es que siempre muestra Orbes Espectrales
                    como evidencia adicional oculta, actuando como una cuarta evidencia secreta."
                detalleAdicional="Siempre muestra Orbes Espectrales" />

            <x-tarjeta-fantasma nombre="El Jinn y la Electricidad"
                descripcion="El Jinn obtiene su poder del cuadro electrico del edificio. Si la electricidad esta encendida,
                    puede realizar un ataque de velocidad hacia el jugador. Apagar el cuadro electrico neutraliza
                    esta habilidad, pero tambien oscurece todo el mapa."
                detalleAdicional="No puede atacar sin electricidad" />

            <x-tarjeta-fantasma nombre="El Onryo y las Velas"
                descripcion="El Onryo teme al fuego. Cada vela encendida actua como un escudo que le impide iniciar una
                    caceria. Sin embargo, si apaga tres velas consecutivamente, puede iniciar una caceria
                    incluso si la cordura del equipo no ha bajado lo suficiente."
                detalleAdicional="Teme al fuego" />

            <x-tarjeta-fantasma nombre="El Deogen Omnisciente"
                descripcion="El Deogen siempre sabe donde te encuentras, haciendo que esconderse sea completamente inutil.
                    Sin embargo, su velocidad disminuye drasticamente cuando se acerca a un jugador, dando una
                    oportunidad de esquivarlo corriendo a su alrededor."
                detalleAdicional="Siempre sabe donde estás" />

        </div>
    </div>

    <!-- Sección Lista -->
    <div class="seccion-lista mt-4">
        <h3><i class="bi bi-controller"></i> 10 Datos que no conocías del juego</h3>
        <p>Más allá de los fantasmas, el propio juego esconde secretos y mecánicas que muchos jugadores desconocen.</p>

        <div class="list-group list-group-flush">
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">1</span>
                <div>
                    El juego fue desarrollado inicialmente por una sola persona, Dknighter (CJ), antes de expandir
                    el equipo de Kinetic Games. Todo el concepto nació como un proyecto personal de pasión por el género de
                    terror.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">2</span>
                <div>
                    Los fantasmas realmente escuchan tu voz a través del micrófono usando reconocimiento de voz.
                    Decir el nombre del fantasma puede provocar eventos paranormales y aumentar la actividad.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">3</span>
                <div>
                    El crucifijo solo funciona si está en el suelo dentro de un radio de 3 metros
                    (5 metros para el Banshee) de la posición del fantasma cuando intenta iniciar una cacería.
                    Sostenerlo en la mano no tiene ningún efecto.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">4</span>
                <div>
                    La temperatura de congelación como evidencia se detecta por debajo de 0 grados Celsius.
                    Un termómetro puede marcar temperaturas bajas sin que sea evidencia de congelación real.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">5</span>
                <div>
                    Los fantasmas tienen un "cuarto favorito" donde suelen aparecer, pero pueden desplazarse a
                    otras habitaciones durante el transcurso de la investigacion, especialmente durante
                    cacerías prolongadas.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">6</span>
                <div>
                    El Spirit Box tiene una probabilidad del 100% de respuesta si estas en la habitacion correcta
                    y cumples con el requisito de que sea solo una persona o el grupo completo, dependiendo del
                    tipo de fantasma.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">7</span>
                <div>
                    Durante una caceria, el fantasma puede escuchar tus pasos y tu voz. Hablar por el microfono
                    o correr pueden revelar tu posicion. La estrategia optima es permanecer en silencio y
                    apagar tu equipo electronico.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">8</span>
                <div>
                    El tablero Ouija consume un 40% de cordura por cada pregunta sobre la ubicacion del fantasma,
                    pero solo un 5% para preguntas sobre su edad o personalidad. Elegir las preguntas
                    correctas es vital para sobrevivir.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">9</span>
                <div>
                    Las cacerías duran entre 20 y 60 segundos dependiendo del tamano del mapa. En mapas grandes
                    como la Prision o el Asilo, las cacerías pueden ser especialmente largas y
                    peligrosas.
                </div>
            </div>
            <div class="list-group-item bg-transparent border-warning text-light d-flex">
                <span class="badge bg-warning text-dark align-self-start">10</span>
                <div>
                    El juego tiene Easter Eggs ocultos en varios mapas, incluyendo referencias a peliculas de
                    terror clasicas. Algunos jugadores han reportado objetos que se mueven de maneras
                    no documentadas oficialmente.
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Spotlight -->
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
