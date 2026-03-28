@extends('layouts.app')

@section('title', 'Editar Reporte - ITSC')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-900 flex items-center">
            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Volver
        </a>
    </div>

    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 bg-gray-50">
            <h2 class="text-2xl font-bold text-gray-900">Editar Reporte #1024</h2>
        </div>

        <form action="#" method="POST" class="px-4 py-5 sm:p-6">
            @csrf
            @method('PUT')

            <!-- Estado -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Estado <span class="text-red-500">*</span>
                </label>
                <select name="status" id="status" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <option value="pendiente">Pendiente</option>
                    <option value="en_proceso" selected>En Proceso</option>
                    <option value="resuelto">Resuelto</option>
                </select>
            </div>

            <!-- Notas -->
            <div class="mb-6">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                    Notas de Mantenimiento
                </label>
                <textarea name="notes" id="notes" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                          placeholder="Describa el trabajo realizado..."></textarea>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('dashboard') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection