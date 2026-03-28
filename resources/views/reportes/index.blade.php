@extends('layouts.app')

@section('title', 'Lista de Reportes')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📋 Lista de Reportes</h2>
        <div class="flex gap-2">
            <a href="{{ route('reportes.historial') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                📜 Ver Historial Completo
            </a>
            <a href="{{ route('reportes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                ➕ Nuevo Reporte
            </a>
        </div>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de reportes -->
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
                @forelse($reportes as $reporte)
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2">#{{ $reporte->id }}</td>
                        <td class="border p-2">{{ $reporte->location }}</td>
                        <td class="border p-2">{{ Str::limit($reporte->description, 50) }}</td>
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
                            No hay reportes registrados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
