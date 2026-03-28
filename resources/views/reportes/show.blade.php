@extends('layouts.app')

@section('title', 'Detalle del Reporte')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Reporte #{{ $reporte->id }}</h2>
        <a href="{{ route('reportes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            ← Volver
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Información del reporte -->
    <div class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium">Ubicación:</label>
            <p class="text-gray-900">{{ $reporte->location }}</p>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Descripción:</label>
            <p class="text-gray-900">{{ $reporte->description }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Estado:</label>
                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $reporte->status->badgeClass() }}">
                    {{ $reporte->status->label() }}
                </span>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Prioridad:</label>
                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $reporte->priority->badgeClass() }}">
                    {{ $reporte->priority->label() }}
                </span>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Fecha de Creación:</label>
            <p class="text-gray-900">{{ $reporte->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Reportado por:</label>
            <p class="text-gray-900">{{ $reporte->user->name }}</p>
        </div>

        <!-- Foto (si existe) -->
        @if($reporte->photo_path)
            <div>
                <label class="block text-gray-700 font-medium mb-2">Foto:</label>
                <img src="{{ asset('storage/' . $reporte->photo_path) }}" alt="Foto del reporte" 
                     class="max-w-full h-auto rounded-lg border">
            </div>
        @endif
    </div>

    <!-- Botones de acción (solo para admin y mantenimiento) -->
    @auth
        @if(auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'mantenimiento')
            <div class="mt-6 flex gap-4">
                <a href="{{ route('reportes.edit', $reporte->id) }}" 
                   class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition">
                    Editar Estado
                </a>
                @if(auth()->user()->role->name === 'admin')
                    <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" 
                          onsubmit="return confirm('¿Seguro que deseas eliminar este reporte?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                            Eliminar
                        </button>
                    </form>
                @endif
            </div>
        @endif
    @endauth
</div>
@endsection
