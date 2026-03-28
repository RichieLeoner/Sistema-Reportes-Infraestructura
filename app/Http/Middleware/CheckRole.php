<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $roles  (puede ser uno o varios: 'admin', 'mantenimiento', 'usuario')
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión para acceder.');
        }

        // Obtener el rol del usuario autenticado
        $userRole = Auth::user()->role->name;

        // Convertir los roles permitidos a array (soporta múltiples: 'admin|mantenimiento')
        $allowedRoles = explode('|', $roles);

        // Verificar si el rol del usuario está en los roles permitidos
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->route('usuario.dashboard')
                ->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
