<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Lista todas las notificaciones del usuario autenticado
     */
    public function index()
    {
        $user = Auth::user();

        // Obtener notificaciones paginadas
        $notifications = $user->notifications()
            ->latest()
            ->paginate(15);

        // Contar no leídas
        $unreadCount = $user->unreadNotifications()->count();

        return view('notifications.index', compact('notifications', 'unreadCount'));
    }

    /**
     * Marcar notificación como leída
     */
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->back()
            ->with('success', 'Notificación marcada como leída');
    }

    /**
     * Marcar todas las notificaciones como leídas
     */
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()
            ->with('success', 'Todas las notificaciones marcadas como leídas');
    }

    /**
     * Eliminar notificación
     */
    public function destroy($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->delete();

        return redirect()->back()
            ->with('success', 'Notificación eliminada');
    }

    /**
     * Eliminar todas las notificaciones leídas
     */
    public function deleteRead()
    {
        Auth::user()->readNotifications()->delete();

        return redirect()->back()
            ->with('success', 'Notificaciones leídas eliminadas');
    }
}
