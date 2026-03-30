@extends('layouts.app')

@section('title', 'Inicio - Phasmophobia Wiki')

@section('content')
    <h2>Listado de los fantasmas</h2>
    <p>
        Phasmophobia cuenta con 24 tipos de fantasmas diferentes, cada uno con comportamientos y evidencias unicas. Como cazador paranormal, tu objetivo es identificar al fantasma usando las evidencias correctas. Conocer las evidencias de cada fantasma es la clave para sobrevivir cada mision.
    </p>

    <hr class="section-divider">

    <!-- Tabla con Bootstrap -->
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
            <caption>Tabla de Evidencias por Fantasma</caption>
            <thead>
                <tr>
                    <th>Fantasma</th>
                    <th>EMF 5</th>
                    <th>Spirit Box</th>
                    <th>Temp. Heladas</th>
                    <th>Huellas</th>
                    <th>Escritura</th>
                    <th>Orbes</th>
                    <th>D.O.T.S</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Spirit</strong></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                </tr>
                <tr>
                    <td><strong>Ente</strong></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                </tr>
                <tr>
                    <td><strong>Hantu</strong></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                </tr>
                <tr>
                    <td><strong>Yurei</strong></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                </tr>
                <tr>
                    <td><strong>Oni</strong></td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="nocheck">-</td>
                    <td class="check"><i class="bi bi-check-lg"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="section-divider">

    <h3>Distribución de evidencias</h3>
    <p>El siguiente grafico muestra la distribucion de cada tipo de evidencia entre los 24 fantasmas del juego. Algunas evidencias como EMF Nivel 5 y Huellas Dactilares aparecen con mayor frecuencia.</p>

    <!-- Barras de progreso con Bootstrap -->
    <div class="chart-wrapper">
        <div class="mb-3">
            <label class="form-label">EMF 5</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Spirit Box</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Temp. Heladas</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Huellas Dactilares</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Escritura</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Orbes</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">D.O.T.S</label>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @parent
@endsection
