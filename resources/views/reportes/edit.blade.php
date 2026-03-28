@extends('layouts.app')

@section('title', 'Editar Reporte')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Reporte #{{ $reporte->id }}</h2>

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

    <form action="{{ route('reportes.update', $reporte->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Campo Ubicación (solo lectura) -->
        <div class="mb-4">
            <label for="location" class="block text-gray-700 font-medium mb-2">Ubicación</label>
            <input type="text" name="location" id="location" value="{{ $reporte->location }}" 
                   class="w-full px-4 py-2 border rounded-lg bg-gray-100"
                   readonly>
            <p class="text-xs text-gray-500 mt-1">La ubicación no se puede modificar</p>
        </div>

        <!-- Campo Descripción (solo lectura) -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Descripción</label>
            <textarea name="description" id="description" rows="5" 
                      class="w-full px-4 py-2 border rounded-lg bg-gray-100"
                      readonly>{{ $reporte->description }}</textarea>
            <p class="text-xs text-gray-500 mt-1">La descripción no se puede modificar</p>
        </div>

        <!-- Campo Estado (editable) -->
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-medium mb-2">Estado *</label>
            <select name="status" id="status" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="pendiente" {{ $reporte->status->value == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en_proceso" {{ $reporte->status->value == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="resuelto" {{ $reporte->status->value == 'resuelto' ? 'selected' : '' }}>Resuelto</option>
            </select>
            <p class="text-xs text-gray-500 mt-1">
                Estado actual: <span class="font-semibold {{ $reporte->status->badgeClass() }}">{{ $reporte->status->label() }}</span>
            </p>
        </div>

        <!-- Campo Prioridad (editable) -->
        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-medium mb-2">Prioridad *</label>
            <select name="priority" id="priority" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="baja" {{ $reporte->priority->value == 'baja' ? 'selected' : '' }}>Baja</option>
                <option value="media" {{ $reporte->priority->value == 'media' ? 'selected' : '' }}>Media</option>
                <option value="alta" {{ $reporte->priority->value == 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
            <p class="text-xs text-gray-500 mt-1">
                Prioridad actual: <span class="font-semibold {{ $reporte->priority->badgeClass() }}">{{ $reporte->priority->label() }}</span>
            </p>
        </div>

        <!-- Botones -->
        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Guardar Cambios
            </button>
            <a href="{{ route('reportes.show', $reporte->id) }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
