<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReporteRequest;
use App\Http\Requests\UpdateReporteRequest;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Role;
use App\Notifications\NuevoReporteNotification;
use App\Notifications\ReporteActualizadoNotification;
use App\TicketStatus;
use App\TicketPriority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * ReporteController
 * 
 * Maneja el CRUD completo de reportes
 */
class ReporteController extends Controller
{
    /**
     * Lista todos los reportes (con filtros opcionales)
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Construir consulta base
        $query = Ticket::with(['user.role']);

        // Si es usuario normal, solo ve sus propios reportes
        if ($user->isUser()) {
            $query->where('user_id', $user->id);
        }

        // Aplicar filtros si existen
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Ordenar
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Obtener resultados
        $reportes = $query->latest()->paginate(15);

        // Mantener filtros en paginación
        $reportes->appends($request->query());

        return view('reportes.index', compact('reportes'));
    }

    /**
     * Muestra el formulario para crear un nuevo reporte
     */
    public function create()
    {
        return view('reportes.create');
    }

    /**
     * Guarda un nuevo reporte en la base de datos
     */
    public function store(StoreReporteRequest $request)
    {
        // Las validaciones del Form Request ya se ejecutaron automáticamente
        
        // Manejar foto si existe
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('reportes', 'public');
        }

        // Crear reporte usando el valor del Enum
        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'location' => $request->location,
            'description' => $request->description,
            'priority' => TicketPriority::from($request->priority),
            'status' => TicketStatus::PENDIENTE, // Estado inicial
            'photo_path' => $photoPath
        ]);

        // Notificar a admins y mantenimiento
        $admins = User::whereHas('role', function($q) {
            $q->whereIn('name', ['admin', 'mantenimiento']);
        })->get();

        foreach ($admins as $admin) {
            $admin->notify(new NuevoReporteNotification($ticket));
        }

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte creado exitosamente');
    }

    /**
     * Muestra el detalle de un reporte específico
     */
    public function show($id)
    {
        // Buscar reporte con su usuario
        $reporte = Ticket::with('user')->findOrFail($id);

        // Si es usuario normal, solo puede ver sus propios reportes
        if (Auth::user()->isUser() && $reporte->user_id !== Auth::id()) {
            return redirect()->route('reportes.index')
                ->with('error', 'No tienes permiso para ver este reporte.');
        }

        return view('reportes.show', compact('reporte'));
    }

    /**
     * Muestra el formulario para editar un reporte
     * (Solo admin y mantenimiento)
     */
    public function edit($id)
    {
        // Buscar reporte
        $reporte = Ticket::findOrFail($id);

        return view('reportes.edit', compact('reporte'));
    }

    /**
     * Actualiza un reporte existente
     * (Solo admin y mantenimiento)
     */
    public function update(UpdateReporteRequest $request, $id)
    {
        // Las validaciones del Form Request ya se ejecutaron automáticamente
        
        // Buscar reporte
        $reporte = Ticket::findOrFail($id);
        
        // Guardar estado anterior para la notificación
        $estadoAnterior = $reporte->status->value;

        // Actualizar reporte usando Enums
        $reporte->update([
            'status' => TicketStatus::from($request->status),
            'priority' => TicketPriority::from($request->priority)
        ]);

        // Notificar al usuario dueño del reporte
        $reporte->user->notify(new ReporteActualizadoNotification($reporte, $estadoAnterior));

        return redirect()->route('reportes.show', $id)
            ->with('success', 'Reporte actualizado exitosamente');
    }

    /**
     * Elimina un reporte (solo para admin)
     */
    public function destroy($id)
    {
        // Buscar y eliminar reporte
        $reporte = Ticket::findOrFail($id);
        $reporte->delete();

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte eliminado exitosamente');
    }

    /**
     * Muestra el historial completo de reportes con filtros avanzados
     */
    public function historial(Request $request)
    {
        $user = Auth::user();

        // Construir consulta base
        $query = Ticket::with(['user.role']);

        // Si es usuario normal, solo ve sus propios reportes
        if ($user->isUser()) {
            $query->where('user_id', $user->id);
        }

        // Aplicar filtros
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Obtener resultados paginados
        $reportes = $query->latest()->paginate(20);

        // Estadísticas del historial
        $stats = [
            'total' => (clone $query)->count(),
            'pendientes' => (clone $query)->where('status', 'pendiente')->count(),
            'en_proceso' => (clone $query)->where('status', 'en_proceso')->count(),
            'resueltos' => (clone $query)->where('status', 'resuelto')->count(),
        ];

        return view('reportes.historial', compact('reportes', 'stats'));
    }
}
