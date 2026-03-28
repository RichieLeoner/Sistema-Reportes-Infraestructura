@extends('layouts.app')

@section('title', 'Dashboard Administrador')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Título -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Panel de Administrador</h1>
        <p class="text-gray-600 mt-2">Gestión completa del sistema</p>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Usuarios -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Usuarios</dt>
                        <dd class="text-2xl font-semibold text-gray-900">156</dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Total Reportes -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Reportes</dt>
                        <dd class="text-2xl font-semibold text-gray-900">342</dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Pendientes</dt>
                        <dd class="text-2xl font-semibold text-gray-900">23</dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Tasa Resolución -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Tasa Resolución</dt>
                        <dd class="text-2xl font-semibold text-gray-900">85%</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Gestión de Usuarios</h3>
            <div class="space-y-3">
                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Crear Usuario
                </button>
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Gestionar Roles
                </button>
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Ver Permisos
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Reportes del Sistema</h3>
            <div class="space-y-3">
                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Ver Todos los Reportes
                </button>
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Estadísticas Avanzadas
                </button>
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Exportar Datos
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Configuración</h3>
            <div class="space-y-3">
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Configuración General
                </button>
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Auditoría del Sistema
                </button>
                <button class="w-full bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Respaldos
                </button>
            </div>
        </div>
    </div>
</div>
@endsection