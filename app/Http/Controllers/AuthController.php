<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{

    private array $security_questions;

    public function __construct()
    {
        $this->security_questions = [
            1 => '¿Cuál es el nombre de tu primera mascota?',
            2 => '¿En qué ciudad naciste?',
            3 => '¿Cuál es el nombre de tu madre?',
            4 => '¿Cuál fue tu primera escuela?',
            5 => '¿Cuál es tu comida favorita?'
        ];
    }


    public function login(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Credenciales inválidas.'], 422);
            }
            return back()->withErrors(['email' => 'Credenciales inválidas']);
        }

        $request->session()->regenerate();

        if ($request->expectsJson()) {
            return response()->json(['redirect' => route('inicio')]);
        }
        return to_route('inicio');
    }

    public function register(Request $request): RedirectResponse
    {
        // Lógica de registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'security_question' => 'required|string|max:255',
            'security_answer' => 'required|string|max:255',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'security_question' => $request->security_question,
            'security_answer' => bcrypt($request->security_answer),
        ]);
        $user->password = bcrypt($request->password);
        $user->save();


        auth()->login($user);

        return to_route('inicio');
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id'      => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $userId = decrypt($request->input('user_id'));
        } catch (\Exception) {
            return back()->withErrors(['new_password' => 'Solicitud inválida.']);
        }

        $user = User::find($userId);

        if (!$user) {
            return back()->withErrors(['new_password' => 'Usuario no encontrado.']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return to_route('login')->with('status', 'Contraseña restablecida exitosamente');
    }

    public function logout(Request $request): RedirectResponse
    {   
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    public function showForgotPasswordForm(): View
    {
        return view('auth.forgot-password');
    }

    public function validateEmail(Request $request): JsonResponse
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['exists' => false, 'error' => 'No encontramos una cuenta con ese correo.'], 422);
        }

        $securityQuestion = $this->security_questions[$user->security_question] ?? null;

        return response()->json([
            'exists'            => true,
            'security_question' => $securityQuestion ?? 'Pregunta de seguridad no disponible.',
            'user_id'           => encrypt($user->id),
        ]);
    }

    public function validateSecurityAnswer(Request $request): JsonResponse
    {
        $request->validate([
            'user_id'         => 'required',
            'security_answer' => 'required|string',
        ]);

        try {
            $userId = decrypt($request->input('user_id'));
        } catch (\Exception) {
            return response()->json(['valid' => false, 'error' => 'Solicitud inválida.'], 422);
        }

        $user = User::find($userId);

        if (!$user || !Hash::check($request->security_answer, $user->security_answer)) {
            return response()->json(['valid' => false, 'error' => 'Respuesta de seguridad incorrecta.'], 422);
        }

        return response()->json(['valid' => true]);
    }

}
