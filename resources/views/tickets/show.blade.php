@extends('layouts.app')

@section('title', 'Detalle del Reporte - ITSC')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-900 flex items-center">
            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Volver al Dashboard
        </a>
    </div>

    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 bg-gray-50 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Detalle de Reporte #1024</h2>
                <p class="mt-1 text-sm text-gray-600">Creado el 15/03/2026 10:30</p>
            </div>
            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                Pendiente
            </span>
        </div>

        <div class="px-4 py-5 sm:p-6">
            <!-- Información general -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Reportado por</h3>
                    <p class="mt-1 text-sm text-gray-900">Juan Pérez</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Ubicación</h3>
                    <p class="mt-1 text-sm text-gray-900">Aula 302</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Tipo</h3>
                    <p class="mt-1 text-sm text-gray-900">Iluminación</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Prioridad</h3>
                    <p class="mt-1 text-sm text-gray-900">
                        <span class="text-blue-600 font-semibold">Media</span>
                    </p>
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Descripción del Problema</h3>
                <div class="bg-gray-50 rounded-md p-4">
                    <p class="text-sm text-gray-900">
                        La luz del techo parpadea constantemente y a veces se apaga sola. 
                        Necesita revisión urgente porque afecta las clases.
                    </p>
                </div>
            </div>

            <!-- Foto -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Foto Adjunta</h3>
                <div class="border border-gray-300 rounded-md p-4 inline-block">
                    <div class="w-64 h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">Foto del problema</span>
                    </div>
                </div>
            </div>

            <!-- Actualizar estado (solo mantenimiento) -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Actualizar Estado</h3>
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Nuevo Estado
                        </label>
                        <select name="status" id="status" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                            <option value="pendiente" selected>Pendiente</option>
                            <option value="en_proceso">En Proceso</option>
                            <option value="resuelto">Resuelto</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                            Notas de Mantenimiento (opcional)
                        </label>
                        <textarea name="notes" id="notes" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                                  placeholder="Agrega notas sobre el trabajo realizado..."></textarea>
                    </div>

                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                        Actualizar Estado
                    </button>
                </form>
            </div>

            <!-- Historial de cambios -->
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Historial de Cambios</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Estado Anterior</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nuevo Estado</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-2 text-sm">15/03/2026 10:30</td>
                            <td class="px-4 py-2 text-sm">-</td>
                            <td class="px-4 py-2 text-sm">Pendiente</td>
                            <td class="px-4 py-2 text-sm">Juan Pérez</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection