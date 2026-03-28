@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Panel de Administrador</h2>

    <!-- Tarjetas de estadísticas principales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Usuarios -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Total Usuarios</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['total_usuarios'] }}</p>
        </div>

        <!-- Reportes Totales -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Reportes Totales</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['total_reportes'] }}</p>
        </div>

        <!-- Pendientes -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Pendientes</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['pendientes'] }}</p>
        </div>

        <!-- Resueltos -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-lg shadow">
            <h3 class="text-sm font-medium opacity-90">Resueltos</h3>
            <p class="text-3xl font-bold mt-1">{{ $stats['resueltos'] }}</p>
        </div>
    </div>

    <!-- Segunda fila de estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- En Proceso -->
        <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-blue-800">En Proceso</h3>
            <p class="text-2xl font-bold text-blue-600 mt-1">{{ $stats['en_proceso'] }}</p>
        </div>

        <!-- Prioridad Alta -->
        <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-red-800">Prioridad Alta</h3>
            <p class="text-2xl font-bold text-red-600 mt-1">{{ $stats['prioridad_alta'] }}</p>
        </div>

        <!-- Reportes Hoy -->
        <div class="bg-purple-50 border border-purple-200 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-purple-800">Reportes Hoy</h3>
            <p class="text-2xl font-bold text-purple-600 mt-1">{{ $stats['reportes_hoy'] }}</p>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Acciones Rápidas</h3>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('reportes.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                📋 Ver Todos los Reportes
            </a>
            <a href="{{ route('reportes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                ➕ Nuevo Reporte
            </a>
        </div>
    </div>

    <!-- Últimos Reportes -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4">Últimos Reportes</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">ID</th>
                        <th class="border p-2 text-left">Ubicación</th>
                        <th class="border p-2 text-left">Usuario</th>
                        <th class="border p-2 text-left">Estado</th>
                        <th class="border p-2 text-left">Prioridad</th>
                        <th class="border p-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reportesRecientes as $reporte)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2">#{{ $reporte->id }}</td>
                            <td class="border p-2">{{ $reporte->location }}</td>
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
                            <td class="border p-2">
                                <a href="{{ route('reportes.show', $reporte->id) }}" 
                                   class="text-blue-600 hover:underline">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border p-4 text-center text-gray-500">
                                No hay reportes registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
