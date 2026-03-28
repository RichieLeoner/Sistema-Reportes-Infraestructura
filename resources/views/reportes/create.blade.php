@extends('layouts.app')

@section('title', 'Crear Reporte')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Nuevo Reporte</h2>

    <!-- Mostrar errores si existen -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reportes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Campo Ubicación -->
        <div class="mb-4">
            <label for="location" class="block text-gray-700 font-medium mb-2">Ubicación *</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}" 
                   placeholder="Ej: Aula 3B, Laboratorio 2, Baño del primer piso..."
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <!-- Campo Descripción -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Descripción del Problema *</label>
            <textarea name="description" id="description" rows="5" 
                      placeholder="Describe el problema con detalle..."
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required>{{ old('description') }}</textarea>
        </div>

        <!-- Campo Prioridad -->
        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-medium mb-2">Prioridad *</label>
            <select name="priority" id="priority" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="baja" {{ old('priority') == 'baja' ? 'selected' : '' }}>Baja</option>
                <option value="media" {{ old('priority') == 'media' ? 'selected' : '' }}>Media</option>
                <option value="alta" {{ old('priority') == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </div>

        <!-- Campo Foto (opcional) -->
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-medium mb-2">Foto del problema (opcional)</label>
            <input type="file" name="photo" id="photo" accept="image/*"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-xs text-gray-500 mt-1">Formatos aceptados: JPG, PNG, GIF</p>
        </div>

        <!-- Botones -->
        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Crear Reporte
            </button>
            <a href="{{ route('usuario.dashboard') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
