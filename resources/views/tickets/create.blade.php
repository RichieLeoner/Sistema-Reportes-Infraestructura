@extends('layouts.app')

@section('title', 'Crear Nuevo Reporte - ITSC')

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
        <div class="px-4 py-5 sm:px-6 bg-gray-50">
            <h2 class="text-2xl font-bold text-gray-900">Nuevo Reporte de Infraestructura</h2>
            <p class="mt-1 text-sm text-gray-600">
                Completa el formulario para reportar un problema de infraestructura.
            </p>
        </div>

        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="px-4 py-5 sm:p-6">
            @csrf

            <!-- Ubicación -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                    Ubicación <span class="text-red-500">*</span>
                </label>
                <select name="location" id="location" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <option value="">Seleccione una ubicación</option>
                    <option value="Aula">Aula</option>
                    <option value="Laboratorio">Laboratorio</option>
                    <option value="Baño">Baño</option>
                    <option value="Pasillo">Pasillo</option>
                    <option value="Oficina">Oficina</option>
                    <option value="Biblioteca">Biblioteca</option>
                    <option value="Cafetín">Cafetín</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <!-- Tipo de Problema -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tipo de Problema <span class="text-red-500">*</span>
                </label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="electrico" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Eléctrico</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="iluminacion" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Iluminación</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="mobiliario" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Mobiliario</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="aire" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Aire Acondicionado</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="agua" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Agua</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="red" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Red</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="problem_type" value="otro" class="h-4 w-4 text-green-600">
                        <span class="ml-2 text-sm text-gray-700">Otro</span>
                    </label>
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Descripción Detallada <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                          placeholder="Describa el problema con el mayor detalle posible..."></textarea>
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                    Foto del Problema (opcional)
                </label>
                <div class="flex items-center">
                    <input type="file" name="photo" id="photo" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                <p class="mt-1 text-xs text-gray-500">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</p>
            </div>

            <!-- Prioridad -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Prioridad <span class="text-red-500">*</span>
                </label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="priority" value="baja" class="h-4 w-4 text-gray-600">
                        <span class="ml-2 text-sm text-gray-700">Baja</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="priority" value="media" checked class="h-4 w-4 text-blue-600">
                        <span class="ml-2 text-sm text-gray-700">Media</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="priority" value="alta" class="h-4 w-4 text-red-600">
                        <span class="ml-2 text-sm text-gray-700">Alta</span>
                    </label>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('dashboard') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                    Enviar Reporte
                </button>
            </div>

            <p class="mt-4 text-xs text-gray-500">* Campos obligatorios</p>
        </form>
    </div>
</div>
@endsection