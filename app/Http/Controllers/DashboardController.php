<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * DashboardController
 * 
 * Maneja los paneles de control según el rol del usuario
 */
class DashboardController extends Controller
{
    /**
     * Dashboard para Administradores
     * 
     * Solo usuarios con rol 'admin' pueden acceder.
     */
    public function admin()
    {
        // Validación extra de seguridad (el middleware ya validó, pero es buena práctica)
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('usuario.dashboard')
                ->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        // Estadísticas generales
        $stats = [
            'total_usuarios' => User::count(),
            'total_reportes' => Ticket::count(),
            'pendientes' => Ticket::where('status', 'pendiente')->count(),
            'en_proceso' => Ticket::where('status', 'en_proceso')->count(),
            'resueltos' => Ticket::where('status', 'resuelto')->count(),
        ];

        // Estadísticas por prioridad
        $stats['prioridad_alta'] = Ticket::where('priority', 'alta')->count();
        $stats['prioridad_media'] = Ticket::where('priority', 'media')->count();
        $stats['prioridad_baja'] = Ticket::where('priority', 'baja')->count();

        // Reportes creados hoy
        $stats['reportes_hoy'] = Ticket::whereDate('created_at', today())->count();

        // Reportes resueltos esta semana
        $stats['resueltos_semana'] = Ticket::where('status', 'resuelto')
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        // Últimos reportes
        $reportesRecientes = Ticket::with(['user.role'])
            ->latest()
            ->limit(10)
            ->get();

        // Gráfico: Reportes por estado
        // Usar Query Builder para evitar los casts a enum y devolver claves string simples
        $reportesPorEstado = DB::table('tickets')
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // Gráfico: Reportes por prioridad
        $reportesPorPrioridad = DB::table('tickets')
            ->select('priority', DB::raw('count(*) as count'))
            ->groupBy('priority')
            ->pluck('count', 'priority')
            ->toArray();

        return view('dashboard.admin', compact(
            'stats', 
            'reportesRecientes', 
            'reportesPorEstado', 
            'reportesPorPrioridad'
        ));
    }

    /**
     * Dashboard para Mantenimiento
     * 
     * Solo usuarios con rol 'mantenimiento' pueden acceder.
     */
    public function mantenimiento()
    {
        // Validación extra de seguridad
        if (!Auth::user()->isMaintenance()) {
            return redirect()->route('usuario.dashboard')
                ->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        // Estadísticas por estado
        $stats = [
            'pendientes' => Ticket::where('status', 'pendiente')->count(),
            'en_proceso' => Ticket::where('status', 'en_proceso')->count(),
            'resueltos' => Ticket::where('status', 'resuelto')->count(),
            'total' => Ticket::count(),
        ];

        // Reportes prioritarios pendientes
        $stats['prioritarios'] = Ticket::where('priority', 'alta')
            ->where('status', 'pendiente')
            ->count();

        // Reportes creados esta semana
        $stats['nuevos_semana'] = Ticket::whereBetween('created_at', [
            now()->startOfWeek(), 
            now()->endOfWeek()
        ])->count();

        // Reportes pendientes ordenados por prioridad y fecha
        $reportesPendientes = Ticket::with(['user.role'])
            ->where('status', 'pendiente')
            ->orderByRaw("FIELD(priority, 'alta', 'media', 'baja')")
            ->latest()
            ->limit(10)
            ->get();

        // Reportes en proceso
        $reportesEnProceso = Ticket::with(['user.role'])
            ->where('status', 'en_proceso')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard.mantenimiento', compact(
            'stats', 
            'reportesPendientes', 
            'reportesEnProceso'
        ));
    }

    /**
     * Dashboard para Usuarios Normales
     * 
     * Usuarios con rol 'usuario' pueden acceder.
     */
    public function usuario()
    {
        // Obtener ID del usuario autenticado
        $userId = Auth::id();

        // Estadísticas del usuario
        $stats = [
            'mis_reportes' => Ticket::where('user_id', $userId)->count(),
            'pendientes' => Ticket::where('user_id', $userId)
                ->where('status', 'pendiente')
                ->count(),
            'en_proceso' => Ticket::where('user_id', $userId)
                ->where('status', 'en_proceso')
                ->count(),
            'resueltos' => Ticket::where('user_id', $userId)
                ->where('status', 'resuelto')
                ->count(),
        ];

        // Último reporte creado
        $stats['ultimo_reporte'] = Ticket::where('user_id', $userId)
            ->latest()
            ->first();

        // Reportes recientes del usuario
        $misReportes = Ticket::where('user_id', $userId)
            ->latest()
            ->limit(10)
            ->get();

        // Reportes pendientes del usuario
        $misPendientes = Ticket::where('user_id', $userId)
            ->where('status', 'pendiente')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard.usuario', compact('stats', 'misReportes', 'misPendientes'));
    }
}
