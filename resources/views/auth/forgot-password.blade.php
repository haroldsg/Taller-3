@extends('layouts.auth')

@section('title', 'Recuperar Contraseña - Phasmophobia Wiki')

@section('content')
    <div class="auth-card wide">
        <div class="auth-card-header">
            <h2>Recuperar Contraseña</h2>
            <p>Responde tu pregunta de seguridad</p>
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

        {{-- Step 1: verificar correo --}}
        <div class="mb-3" id="step-1">
            <label for="email" class="form-label">
                Correo Electrónico
            </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email') }}" placeholder="tucorreo@ejemplo.com" autofocus>
            <div class="invalid-feedback" id="email-feedback"></div>
            <div class="form-text">
                Ingresa el correo con el que te registraste.
            </div>
        </div>

        {{-- Step 2: pregunta de seguridad (oculto hasta validar correo) --}}
        <div class="mb-3" id="step-2" style="display: none;">
            <label for="security_question" class="form-label">
                Pregunta de Seguridad
            </label>
            <input readonly class="form-control" id="security_question" name="security_question" value="" />

            <label for="security_answer" class="form-label mt-2">
                Respuesta de Seguridad
            </label>
            <input type="text" class="form-control" id="security_answer" name="security_answer"
                value="{{ old('security_answer') }}" placeholder="Tu respuesta secreta">
            <div class="invalid-feedback" id="security-answer-feedback"></div>
        </div>

        <hr class="my-4" id="step-divider" style="display: none; border-color: #3f3f46;">

        {{-- Step 3: nueva contraseña (oculto hasta validar respuesta) --}}
        <form method="POST" action="{{ route('password.reset') }}" id="reset-form">
            @csrf
            <input type="hidden" name="user_id" id="user_id">

            <div class="mb-3" id="step-3" style="display: none;">
                <label for="new_password" class="form-label">
                    Nueva Contraseña
                </label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                    id="new_password" name="new_password" placeholder="Mínimo 8 caracteres">
                <div class="invalid-feedback" id="password-feedback"></div>

                <label for="new_password_confirmation" class="form-label mt-2">
                    Confirmar Nueva Contraseña
                </label>
                <input type="password" class="form-control" id="new_password_confirmation"
                    name="new_password_confirmation" placeholder="Repite tu nueva contraseña">
                <div class="invalid-feedback" id="confirm-feedback"></div>
            </div>
        </form>

        <div class="d-grid gap-2">
            <button type="button" class="btn btn-success btn-lg" id="submit-btn">
                Verificar Correo
            </button>
        </div>

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

@section('scripts')
<script>
    let currentStep = 1;
    let storedUserId = null;

    $('input').on('keydown', function (e) {
        if (e.key === 'Enter') $('#submit-btn').trigger('click');
    });

    $('#submit-btn').on('click', function () {
        if (currentStep === 1) handleStepOne();
        else if (currentStep === 2) handleStepTwo();
        else if (currentStep === 3) handleStepThree();
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
            url: '{{ route("validate.email") }}',
            method: 'POST',
            data: { email },
            success: function (data) {
                storedUserId = data.user_id;
                $('#security_question').val(data.security_question);
                $('#user_id').val(data.user_id);

                $('#step-1').hide();
                $('#step-2').show();

                currentStep = 2;
                $('#submit-btn').text('Verificar Respuesta');
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.error || 'No encontramos una cuenta con ese correo.';
                setInvalid('email', 'email-feedback', msg);
                $('#submit-btn').text('Verificar Correo');
            },
            complete: function () {
                $('#submit-btn').prop('disabled', false);
            }
        });
    }

    function handleStepTwo() {
        clearInvalid('security_answer', 'security-answer-feedback');

        const answer = $('#security_answer').val().trim();
        if (!answer) {
            setInvalid('security_answer', 'security-answer-feedback', 'Por favor ingresa tu respuesta de seguridad.');
            return;
        }

        $('#submit-btn').prop('disabled', true).text('Verificando...');

        $.ajax({
            url: '{{ route("validate.security-answer") }}',
            method: 'POST',
            data: { user_id: storedUserId, security_answer: answer },
            success: function () {
                $('#step-2').hide();
                $('#step-divider').show();
                $('#step-3').show();

                currentStep = 3;
                $('#submit-btn').text('Restablecer Contraseña');
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.error || 'Respuesta de seguridad incorrecta.';
                setInvalid('security_answer', 'security-answer-feedback', msg);
                $('#submit-btn').text('Verificar Respuesta');
            },
            complete: function () {
                $('#submit-btn').prop('disabled', false);
            }
        });
    }

    function handleStepThree() {
        clearInvalid('new_password', 'password-feedback');
        clearInvalid('new_password_confirmation', 'confirm-feedback');

        const password = $('#new_password').val();
        const confirmation = $('#new_password_confirmation').val();

        if (password.length < 8) {
            setInvalid('new_password', 'password-feedback', 'La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        if (password !== confirmation) {
            setInvalid('new_password_confirmation', 'confirm-feedback', 'Las contraseñas no coinciden.');
            return;
        }

        $('#reset-form').submit();
    }
</script>
@endsection
