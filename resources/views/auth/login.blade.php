@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6">Iniciar Sesión</h2>

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

    <form action="{{ route('login') }}" method="POST">
        @csrf
        
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

        <!-- Recordarme -->
        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-gray-700">Recordarme</span>
            </label>
        </div>

        <!-- Botón Submit -->
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Ingresar
        </button>
    </form>

    <!-- Enlace a registro -->
    <p class="text-center mt-4 text-gray-600">
        ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate aquí</a>
    </p>

    <!-- Usuarios de prueba (solo desarrollo) -->
    <div class="mt-6 p-4 bg-gray-100 rounded-lg text-sm">
        <p class="font-semibold mb-2">Usuarios de prueba:</p>
        <p><strong>Admin:</strong> admin@itsc.edu.do / 123456</p>
        <p><strong>Mantenimiento:</strong> mantenimiento@itsc.edu.do / 123456</p>
        <p><strong>Usuario:</strong> demo1@itsc.edu.do / demo1234</p>
    </div>
</div>
@endsection
