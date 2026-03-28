@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6">Crear Cuenta</h2>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar errores -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        
        <!-- Campo Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                   required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                   required>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
            <input type="password" name="password" id="password" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                   required>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Confirmar Contraseña -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <!-- Campo Rol (solo usuario por defecto) -->
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-medium mb-2">Tipo de Usuario</label>
            <select name="role" id="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="usuario">Usuario Normal (Estudiante/Profesor)</option>
            </select>
            <p class="text-xs text-gray-500 mt-1">Admin y Mantenimiento son creados internamente</p>
        </div>

        <!-- Botón Submit -->
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
            Registrarse
        </button>
    </form>

    <!-- Enlace a login -->
    <p class="text-center mt-4 text-gray-600">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
    </p>
</div>
@endsection
