@extends('layouts.app')

@section('title', 'Dashboard Usuario')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Mi Panel de Usuario</h2>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- Mis Reportes -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Mis Reportes</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['mis_reportes'] }}</p>
        </div>

        <!-- Pendientes -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Pendientes</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['pendientes'] }}</p>
        </div>

        <!-- En Proceso -->
        <div class="bg-gradient-to-br from-blue-400 to-blue-500 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">En Proceso</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['en_proceso'] }}</p>
        </div>

        <!-- Resueltos -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Resueltos</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['resueltos'] }}</p>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Acciones Rápidas</h3>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('reportes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                ➕ Crear Nuevo Reporte
            </a>
            <a href="{{ route('reportes.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                📋 Ver Mis Reportes
            </a>
        </div>
    </div>

    <!-- Último reporte (si existe) -->
    @if($stats['ultimo_reporte'])
        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">📌 Tu último reporte</h3>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-700">
                        <strong>Ubicación:</strong> {{ $stats['ultimo_reporte']->location }}
                    </p>
                    <p class="text-gray-700">
                        <strong>Estado:</strong> 
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $stats['ultimo_reporte']->status->badgeClass() }}">
                            {{ $stats['ultimo_reporte']->status->label() }}
                        </span>
                    </p>
                </div>
                <a href="{{ route('reportes.show', $stats['ultimo_reporte']->id) }}" 
                   class="text-blue-600 hover:underline">
                    Ver detalle →
                </a>
            </div>
        </div>
    @endif

    <!-- Mis reportes pendientes -->
    @if($misPendientes->count() > 0)
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-4">⏳ Mis Reportes Pendientes</h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2 text-left">ID</th>
                            <th class="border p-2 text-left">Ubicación</th>
                            <th class="border p-2 text-left">Prioridad</th>
                            <th class="border p-2 text-left">Fecha</th>
                            <th class="border p-2 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($misPendientes as $reporte)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-2">#{{ $reporte->id }}</td>
                                <td class="border p-2">{{ $reporte->location }}</td>
                                <td class="border p-2">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $reporte->priority->badgeClass() }}">
                                        {{ $reporte->priority->label() }}
                                    </span>
                                </td>
                                <td class="border p-2">{{ $reporte->created_at->format('d/m/Y') }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('reportes.show', $reporte->id) }}" 
                                       class="text-blue-600 hover:underline">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- Todos mis reportes -->
    <div>
        <h3 class="text-xl font-semibold mb-4">📋 Historial de Reportes</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">ID</th>
                        <th class="border p-2 text-left">Ubicación</th>
                        <th class="border p-2 text-left">Descripción</th>
                        <th class="border p-2 text-left">Estado</th>
                        <th class="border p-2 text-left">Prioridad</th>
                        <th class="border p-2 text-left">Fecha</th>
                        <th class="border p-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($misReportes as $reporte)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2">#{{ $reporte->id }}</td>
                            <td class="border p-2">{{ $reporte->location }}</td>
                            <td class="border p-2">{{ Str::limit($reporte->description, 40) }}</td>
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
                            <td class="border p-2">{{ $reporte->created_at->format('d/m/Y') }}</td>
                            <td class="border p-2">
                                <a href="{{ route('reportes.show', $reporte->id) }}" 
                                   class="text-blue-600 hover:underline">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border p-4 text-center text-gray-500">
                                No has creado reportes aún
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
