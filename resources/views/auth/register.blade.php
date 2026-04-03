@extends('layouts.auth')

@section('title', 'Registro - Phasmophobia Wiki')

@section('content')
    <div class="auth-card wide">
        <div class="auth-card-header">
            <h2>Crear Cuenta</h2>
            <p>Únete a los cazadores de fantasmas</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" id="register-form">
            @csrf

            {{-- Step 1: Verificar disponibilidad del correo --}}
            <div id="step-1">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="tucorreo@ejemplo.com" autofocus>
                    <div class="invalid-feedback" id="email-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Step 2: Resto del formulario (oculto hasta confirmar correo disponible) --}}
            <div id="step-2" style="display: none;">

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" placeholder="Tu nombre de cazador">
                    <div class="invalid-feedback" id="name-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Mínimo 8 caracteres">
                    <div class="invalid-feedback" id="password-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Repite tu contraseña">
                    <div class="invalid-feedback" id="confirm-feedback"></div>
                </div>

                <hr class="my-4" style="border-color: #3f3f46;">

                <p class="mb-3">
                    <strong>Pregunta de seguridad</strong> - Para recuperar tu contraseña si la olvidas
                </p>

                <div class="mb-3">
                    <label for="security_question" class="form-label">Pregunta de Seguridad</label>
                    <select class="form-select @error('security_question') is-invalid @enderror" id="security_question"
                        name="security_question">

                        <option value="" disabled selected>
                            Selecciona una pregunta...
                        </option>

                        <option value="1" @selected(old('security_question') == '1')>
                            ¿Cuál es el nombre de tu primera mascota?
                        </option>

                        <option value="2" @selected(old('security_question') == '2')>
                            ¿En qué ciudad naciste?
                        </option>

                        <option value="3" @selected(old('security_question') == '3')>
                            ¿Cuál es el nombre de tu madre?
                        </option>

                        <option value="4" @selected(old('security_question') == '4')>
                            ¿Cuál fue tu primera escuela?
                        </option>

                        <option value="5" @selected(old('security_question') == '5')>
                            ¿Cuál es tu comida favorita?
                        </option>

                    </select>
                    <div class="invalid-feedback" id="security-question-feedback">
                        @error('security_question')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="security_answer" class="form-label">Respuesta de Seguridad</label>
                    <input type="text" class="form-control @error('security_answer') is-invalid @enderror"
                        id="security_answer" name="security_answer" value="{{ old('security_answer') }}"
                        placeholder="Tu respuesta secreta">
                    <div class="invalid-feedback" id="security-answer-feedback">
                        @error('security_answer')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-text">
                        Recuerda esta respuesta, la necesitarás para recuperar tu contraseña.
                    </div>
                </div>

            </div>

            <div class="d-grid gap-2">
                <button type="button" class="btn btn-success btn-lg" id="submit-btn">
                    Siguiente
                </button>
            </div>
        </form>

        <div class="auth-links">
            <hr>
            <p>¿Ya tienes cuenta?
                <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let currentStep = 1;

        $('#register-form input, #register-form select').on('keydown', function (e) {
            if (e.key === 'Enter') $('#submit-btn').trigger('click');
        });

        $('#submit-btn').on('click', function() {
            if (currentStep === 1) handleStepOne();
            else if (currentStep === 2) handleStepTwo();
        });

        function handleStepOne() {
            clearInvalid('email', 'email-feedback');

            const email = $('#email').val().trim();
            if (!email) {
                setInvalid('email', 'email-feedback', 'Por favor ingresa tu correo electrónico.');
                return;
            }

            $('#submit-btn').prop('disabled', true).text('Verificando...');

            $.ajax({
                url: '{{ route('validate.email') }}',
                method: 'POST',
                data: { email },
                success: function() {
                    // 200 → exists: true → correo ya está registrado
                    setInvalid('email', 'email-feedback', 'Este correo ya está registrado.');
                    $('#submit-btn').prop('disabled', false).text('Siguiente');
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON?.exists === false) {
                        // Correo disponible → avanzar a step 2
                        $('#step-1').hide();
                        $('#step-2').show();
                        currentStep = 2;
                        $('#submit-btn').text('Crear Cuenta');
                    } else {
                        const msg = xhr.responseJSON?.message || 'Error al verificar el correo.';
                        setInvalid('email', 'email-feedback', msg);
                        $('#submit-btn').text('Siguiente');
                    }
                    $('#submit-btn').prop('disabled', false);
                }
            });
        }

        function handleStepTwo() {
            clearInvalid('name', 'name-feedback');
            clearInvalid('password', 'password-feedback');
            clearInvalid('password_confirmation', 'confirm-feedback');
            clearInvalid('security_question', 'security-question-feedback');
            clearInvalid('security_answer', 'security-answer-feedback');

            let valid = true;

            if (!$('#name').val().trim()) {
                setInvalid('name', 'name-feedback', 'Por favor ingresa tu nombre.');
                valid = false;
            }

            const password = $('#password').val();
            const confirmation = $('#password_confirmation').val();

            if (password.length < 8) {
                setInvalid('password', 'password-feedback', 'La contraseña debe tener al menos 8 caracteres.');
                valid = false;
            }

            if (password !== confirmation) {
                setInvalid('password_confirmation', 'confirm-feedback', 'Las contraseñas no coinciden.');
                valid = false;
            }

            if (!$('#security_question').val()) {
                setInvalid('security_question', 'security-question-feedback', 'Selecciona una pregunta de seguridad.');
                valid = false;
            }

            if (!$('#security_answer').val().trim()) {
                setInvalid('security_answer', 'security-answer-feedback', 'Por favor ingresa tu respuesta de seguridad.');
                valid = false;
            }

            if (valid) {
                $('#register-form').submit();
            }
        }
    </script>
@endsection
