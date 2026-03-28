@extends('layouts.app')

@section('title', 'Historial de Reportes')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📜 Historial de Reportes</h2>
        <a href="{{ route('reportes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            ➕ Nuevo Reporte
        </a>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Estadísticas del historial -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gray-50 border border-gray-200 p-3 rounded-lg text-center">
            <p class="text-sm text-gray-600">Total</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-yellow-50 border border-yellow-200 p-3 rounded-lg text-center">
            <p class="text-sm text-yellow-600">Pendientes</p>
            <p class="text-2xl font-bold text-yellow-800">{{ $stats['pendientes'] }}</p>
        </div>
        <div class="bg-blue-50 border border-blue-200 p-3 rounded-lg text-center">
            <p class="text-sm text-blue-600">En Proceso</p>
            <p class="text-2xl font-bold text-blue-800">{{ $stats['en_proceso'] }}</p>
        </div>
        <div class="bg-green-50 border border-green-200 p-3 rounded-lg text-center">
            <p class="text-sm text-green-600">Resueltos</p>
            <p class="text-2xl font-bold text-green-800">{{ $stats['resueltos'] }}</p>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-gray-50 p-4 rounded-lg mb-6">
        <form action="{{ route('reportes.historial') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <!-- Buscar -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">🔍 Buscar</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Ubicación o descripción..."
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Estado -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todos</option>
                    <option value="pendiente" {{ request('status') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ request('status') == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="resuelto" {{ request('status') == 'resuelto' ? 'selected' : '' }}>Resuelto</option>
                </select>
            </div>

            <!-- Prioridad -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Prioridad</label>
                <select name="priority" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todas</option>
                    <option value="baja" {{ request('priority') == 'baja' ? 'selected' : '' }}>Baja</option>
                    <option value="media" {{ request('priority') == 'media' ? 'selected' : '' }}>Media</option>
                    <option value="alta" {{ request('priority') == 'alta' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>

            <!-- Fecha Desde -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Desde</label>
                <input type="date" name="from_date" value="{{ request('from_date') }}"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Fecha Hasta -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Hasta</label>
                <input type="date" name="to_date" value="{{ request('to_date') }}"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Botones -->
            <div class="md:col-span-2 flex gap-2 items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    🔍 Filtrar
                </button>
                <a href="{{ route('reportes.historial') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Limpiar
                </a>
            </div>
        </form>
    </div>

    <!-- Tabla de reportes -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2 text-left">ID</th>
                    <th class="border p-2 text-left">Ubicación</th>
                    <th class="border p-2 text-left">Descripción</th>
                    <th class="border p-2 text-left">Usuario</th>
                    <th class="border p-2 text-left">Estado</th>
                    <th class="border p-2 text-left">Prioridad</th>
                    <th class="border p-2 text-left">Fecha</th>
                    <th class="border p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportes as $reporte)
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2">#{{ $reporte->id }}</td>
                        <td class="border p-2">{{ $reporte->location }}</td>
                        <td class="border p-2">{{ Str::limit($reporte->description, 40) }}</td>
                        <td class="border p-2">
                            {{ $reporte->user->name }}
                            <span class="text-xs text-gray-500">({{ $reporte->user->role->name }})</span>
                        </td>
                        <td class="border p-2">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $reporte->status->badgeClass() }}">
                                {{ $reporte->status->label() }}
                            </span>
                        </td>
                        <td class="border p-2">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $reporte->priority->badgeClass() }}">
                                {{ $reporte->priority->label() }}
                            </span>
                        </td>
                        <td class="border p-2">{{ $reporte->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border p-2">
                            <a href="{{ route('reportes.show', $reporte->id) }}" 
                               class="text-blue-600 hover:underline">
                                👁️ Ver
                            </a>
                            @if(auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'mantenimiento')
                                <a href="{{ route('reportes.edit', $reporte->id) }}" 
                                   class="text-yellow-600 hover:underline ml-2">
                                    ✏️ Editar
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="border p-4 text-center text-gray-500">
                            No se encontraron reportes con los filtros seleccionados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    @if($reportes->hasPages())
        <div class="mt-4">
            {{ $reportes->links() }}
        </div>
    @endif
</div>
@endsection
