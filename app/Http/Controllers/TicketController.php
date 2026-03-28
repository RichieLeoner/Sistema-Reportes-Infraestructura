<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Listar todos los reportes (o los del usuario según rol)
     */
    public function index()
    {
        $user = Auth::user();

        // Admin y mantenimiento ven todos, usuarios solo los suyos
        if ($user->role->name === 'admin' || $user->role->name === 'mantenimiento') {
            $tickets = Ticket::with('user')->latest()->paginate(10);
        } else {
            $tickets = Ticket::where('user_id', $user->id)
                ->with('user')
                ->latest()
                ->paginate(10);
        }

        return view('reportes.index', compact('tickets'));
    }

    /**
     * Mostrar formulario para crear nuevo reporte
     */
    public function create()
    {
        return view('reportes.create');
    }

    /**
     * Guardar nuevo reporte
     */
    public function store(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'location' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'priority' => 'required|in:baja,media,alta',
            'problem_type' => 'nullable|string|max:50',
            'photo' => 'nullable|image|max:2048', // 2MB max
        ], [
            'location.required' => 'La ubicación es obligatoria',
            'description.required' => 'La descripción es obligatoria',
            'priority.required' => 'La prioridad es obligatoria',
            'photo.image' => 'El archivo debe ser una imagen',
            'photo.max' => 'La imagen no debe superar los 2MB',
        ]);

        // Crear ticket
        $ticket = new Ticket();
        $ticket->user_id = Auth::id();
        $ticket->location = $validated['location'];
        $ticket->description = $validated['description'];
        $ticket->priority = $validated['priority'];
        $ticket->status = 'pendiente'; // Estado inicial
        
        if (isset($validated['problem_type'])) {
            $ticket->problem_type = $validated['problem_type'];
        }

        // Subir foto si existe
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('tickets', 'public');
            $ticket->photo_path = $photoPath;
        }

        $ticket->save();

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte #' . $ticket->id . ' creado exitosamente');
    }

    /**
     * Mostrar detalle de un reporte
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user();

        // Verificar permisos: solo el creador, mantenimiento o admin pueden ver
        if ($ticket->user_id !== $user->id && 
            $user->role->name !== 'mantenimiento' && 
            $user->role->name !== 'admin') {
            abort(403, 'No tienes permiso para ver este reporte');
        }

        return view('reportes.show', compact('ticket'));
    }

    /**
     * Mostrar formulario para editar reporte
     */
    public function edit(Ticket $ticket)
    {
        $user = Auth::user();

        // Solo mantenimiento y admin pueden editar
        if ($user->role->name !== 'mantenimiento' && $user->role->name !== 'admin') {
            abort(403, 'No tienes permiso para editar este reporte');
        }

        return view('reportes.edit', compact('ticket'));
    }

    /**
     * Actualizar reporte
     */
    public function update(Request $request, Ticket $ticket)
    {
        $user = Auth::user();

        // Solo mantenimiento y admin pueden actualizar
        if ($user->role->name !== 'mantenimiento' && $user->role->name !== 'admin') {
            abort(403, 'No tienes permiso para actualizar este reporte');
        }

        $validated = $request->validate([
            'location' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'priority' => 'required|in:baja,media,alta',
        ]);

        $ticket->update($validated);

        return redirect()->route('reportes.show', $ticket)
            ->with('success', 'Reporte actualizado correctamente');
    }

    /**
     * Eliminar reporte
     */
    public function destroy(Ticket $ticket)
    {
        $user = Auth::user();

        // Solo admin puede eliminar, o el creador si es su propio ticket
        if ($user->role->name !== 'admin' && $ticket->user_id !== $user->id) {
            abort(403, 'No tienes permiso para eliminar este reporte');
        }

        // Eliminar foto si existe
        if ($ticket->photo_path) {
            Storage::disk('public')->delete($ticket->photo_path);
        }

        $ticket->delete();

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte eliminado correctamente');
    }

    /**
     * Actualizar estado del ticket (método personalizado)
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $user = Auth::user();

        // Solo mantenimiento y admin pueden cambiar estado
        if ($user->role->name !== 'mantenimiento' && $user->role->name !== 'admin') {
            abort(403, 'No tienes permiso para cambiar el estado');
        }

        $validated = $request->validate([
            'status' => 'required|in:pendiente,en_proceso,resuelto',
            'notes' => 'nullable|string|max:500',
        ]);

        $ticket->status = $validated['status'];
        
        // Aquí podrías guardar las notas en una tabla de historial
        // Por ahora solo actualizamos el ticket
        $ticket->save();

        return redirect()->route('reportes.show', $ticket)
            ->with('success', 'Estado actualizado a: ' . $validated['status']);
    }
}