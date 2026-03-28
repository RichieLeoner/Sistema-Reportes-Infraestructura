<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * AuthController
 * 
 * Maneja la autenticación de usuarios:
 * - Login (mostrar y procesar)
 * - Registro (mostrar y procesar)
 * - Logout
 */
class AuthController extends Controller
{
    /**
     * Muestra el formulario de login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Procesa el login del usuario
     */
    public function login(LoginUserRequest $request)
    {
        // Las validaciones del Form Request ya se ejecutaron automáticamente
        
        // Intentar iniciar sesión
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerar la sesión para seguridad
            $request->session()->regenerate();

            // Redirigir al dashboard según el rol
            return redirect()->intended($this->getDashboardByRole());
        }

        // Si falla, volver al login con error
        return back()
            ->withErrors(['email' => 'Email o contraseña incorrectos'])
            ->withInput($request->only('email'));
    }

    /**
     * Muestra el formulario de registro
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Procesa el registro de usuario
     */
    public function register(RegisterUserRequest $request)
    {
        // Las validaciones del Form Request ya se ejecutaron automáticamente
        
        // Obtener el rol de usuario (ID = 3)
        $role = Role::where('name', 'usuario')->first();

        // Crear el usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id
        ]);

        // Iniciar sesión automáticamente
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Regenerar sesión
        $request->session()->regenerate();

        // Redirigir al dashboard de usuario
        return redirect()->route('usuario.dashboard')
            ->with('success', '¡Registro exitoso! Bienvenido al sistema.');
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout(Request $request)
    {
        // Cerrar sesión
        Auth::logout();

        // Invalidar la sesión
        $request->session()->invalidate();

        // Regenerar token CSRF
        $request->session()->regenerateToken();

        // Redirigir al login
        return redirect()->route('login')
            ->with('success', 'Sesión cerrada correctamente');
    }

    /**
     * Obtiene la ruta del dashboard según el rol del usuario
     */
    private function getDashboardByRole()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return route('admin.dashboard');
        }

        if ($user->isMaintenance()) {
            return route('mantenimiento.dashboard');
        }

        return route('usuario.dashboard');
    }
}
