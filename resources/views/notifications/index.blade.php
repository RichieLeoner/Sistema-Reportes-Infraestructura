@extends('layouts.app')

@section('title', 'Mis Notificaciones')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">🔔 Mis Notificaciones</h2>
        <div class="flex gap-2">
            @if($unreadCount > 0)
                <form action="{{ route('notifications.read-all') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        ✅ Marcar todas como leídas
                    </button>
                </form>
            @endif
            
            @if(auth()->user()->readNotifications()->count() > 0)
                <form action="{{ route('notifications.delete-read') }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition"
                            onclick="return confirm('¿Eliminar todas las notificaciones leídas?')">
                        🗑️ Eliminar leídas
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contador de no leídas -->
    @if($unreadCount > 0)
        <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg mb-6">
            <p class="text-blue-800">
                🔵 Tienes <strong>{{ $unreadCount }}</strong> notificación(es) no leída(s)
            </p>
        </div>
    @endif

    <!-- Lista de notificaciones -->
    <div class="space-y-4">
        @forelse($notifications as $notification)
            <div class="border rounded-lg p-4 {{ $notification->read_at ? 'bg-gray-50' : 'bg-blue-50 border-blue-300' }}">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <!-- Icono según tipo -->
                        @if($notification->data['type'] === 'nuevo_reporte')
                            <span class="text-2xl mr-2">📬</span>
                        @elseif($notification->data['type'] === 'reporte_actualizado')
                            <span class="text-2xl mr-2">🔄</span>
                        @else
                            <span class="text-2xl mr-2">📢</span>
                        @endif

                        <!-- Mensaje -->
                        <p class="text-gray-800 font-medium inline">
                            {{ $notification->data['message'] }}
                        </p>

                        <!-- Fecha -->
                        <p class="text-sm text-gray-500 mt-2">
                            🕒 {{ $notification->created_at->diffForHumans() }} 
                            ({{ $notification->created_at->format('d/m/Y H:i') }})
                        </p>

                        <!-- Estado -->
                        @if(!$notification->read_at)
                            <span class="inline-block mt-2 px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full font-semibold">
                                Nuevo
                            </span>
                        @else
                            <span class="inline-block mt-2 px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full font-semibold">
                                Leído
                            </span>
                        @endif
                    </div>

                    <!-- Acciones -->
                    <div class="flex flex-col gap-2 ml-4">
                        <a href="{{ $notification->data['url'] }}" 
                           class="text-blue-600 hover:underline text-sm">
                            👁️ Ver
                        </a>

                        @if(!$notification->read_at)
                            <form action="{{ route('notifications.read', $notification->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:underline text-sm">
                                    ✅ Marcar como leída
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm"
                                    onclick="return confirm('¿Eliminar esta notificación?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <span class="text-6xl">📭</span>
                <p class="text-gray-500 mt-4">No tienes notificaciones</p>
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    @if($notifications->hasPages())
        <div class="mt-6">
            {{ $notifications->links() }}
        </div>
    @endif
</div>
@endsection
