@extends('layouts.app')

@section('title', 'Dashboard Mantenimiento')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Panel de Mantenimiento</h2>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Pendientes -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Pendientes</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['pendientes'] }}</p>
        </div>

        <!-- En Proceso -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">En Proceso</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['en_proceso'] }}</p>
        </div>

        <!-- Resueltos -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Resueltos</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['resueltos'] }}</p>
        </div>
    </div>

    <!-- Segunda fila de estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Total Reportes -->
        <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-blue-800">Total Reportes</h3>
            <p class="text-2xl font-bold text-blue-600 mt-1">{{ $stats['total'] }}</p>
        </div>

        <!-- Prioritarios -->
        <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-red-800">🔴 Prioritarios</h3>
            <p class="text-2xl font-bold text-red-600 mt-1">{{ $stats['prioritarios'] }}</p>
        </div>

        <!-- Nuevos esta semana -->
        <div class="bg-purple-50 border border-purple-200 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-purple-800">Nuevos esta semana</h3>
            <p class="text-2xl font-bold text-purple-600 mt-1">{{ $stats['nuevos_semana'] }}</p>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Acciones Rápidas</h3>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('reportes.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                📋 Ver Todos los Reportes
            </a>
        </div>
    </div>

    <!-- Reportes Pendientes (ordenados por prioridad) -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">🔴 Reportes Pendientes (Prioritarios primero)</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">ID</th>
                        <th class="border p-2 text-left">Ubicación</th>
                        <th class="border p-2 text-left">Descripción</th>
                        <th class="border p-2 text-left">Prioridad</th>
                        <th class="border p-2 text-left">Reportado por</th>
                        <th class="border p-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reportesPendientes as $reporte)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2">#{{ $reporte->id }}</td>
                            <td class="border p-2">{{ $reporte->location }}</td>
                            <td class="border p-2">{{ Str::limit($reporte->description, 40) }}</td>
                            <td class="border p-2">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $reporte->priority->badgeClass() }}">
                                    {{ $reporte->priority->label() }}
                                </span>
                            </td>
                            <td class="border p-2">
                                {{ $reporte->user->name }}
                            </td>
                            <td class="border p-2">
                                <a href="{{ route('reportes.show', $reporte->id) }}" 
                                   class="text-blue-600 hover:underline">
                                    Ver
                                </a>
                                <a href="{{ route('reportes.edit', $reporte->id) }}" 
                                   class="text-yellow-600 hover:underline ml-2">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border p-4 text-center text-gray-500">
                                ✅ No hay reportes pendientes
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Reportes En Proceso -->
    @if($reportesEnProceso->count() > 0)
        <div>
            <h3 class="text-xl font-semibold mb-4">🔵 Reportes En Proceso</h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2 text-left">ID</th>
                            <th class="border p-2 text-left">Ubicación</th>
                            <th class="border p-2 text-left">Prioridad</th>
                            <th class="border p-2 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reportesEnProceso as $reporte)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-2">#{{ $reporte->id }}</td>
                                <td class="border p-2">{{ $reporte->location }}</td>
                                <td class="border p-2">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $reporte->priority->badgeClass() }}">
                                        {{ $reporte->priority->label() }}
                                    </span>
                                </td>
                                <td class="border p-2">
                                    <a href="{{ route('reportes.show', $reporte->id) }}" 
                                       class="text-blue-600 hover:underline">
                                        Ver
                                    </a>
                                    <a href="{{ route('reportes.edit', $reporte->id) }}" 
                                       class="text-yellow-600 hover:underline ml-2">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
