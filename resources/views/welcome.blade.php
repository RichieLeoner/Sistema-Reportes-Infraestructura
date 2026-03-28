<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reportes de Infraestructura - ITSC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-3xl font-bold text-blue-800">ITSC</h1>
                <span class="ml-4 text-gray-600">Instituto Técnico Superior Comunitario</span>
            </div>
            <nav class="space-x-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Registrarse
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-4 py-16">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold text-gray-900 mb-6">
                Sistema de Reportes de Infraestructura
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Plataforma digital para reportar y dar seguimiento a problemas de infraestructura 
                en el ITSC de manera rápida y eficiente.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                    Crear Cuenta
                </a>
                <a href="{{ route('login') }}" class="bg-white text-blue-600 border-2 border-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-50 transition">
                    Iniciar Sesión
                </a>
            </div>
        </div>

        <!-- Características -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Característica 1 -->
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Reporte Rápido</h3>
                <p class="text-gray-600">
                    Reporta problemas de infraestructura en minutos desde cualquier dispositivo.
                </p>
            </div>

            <!-- Característica 2 -->
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Seguimiento en Tiempo Real</h3>
                <p class="text-gray-600">
                    Consulta el estado de tus reportes en cualquier momento.
                </p>
            </div>

            <!-- Característica 3 -->
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Gestión Eficiente</h3>
                <p class="text-gray-600">
                    El personal de mantenimiento gestiona y resuelve los reportes de forma organizada.
                </p>
            </div>
        </div>

        <!-- Información del proyecto -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">
                Sobre el Sistema
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="font-bold text-gray-900 mb-2">Propósito</h4>
                    <p class="text-gray-600">
                        Digitalizar el proceso de reporte de incidencias de infraestructura 
                        para mejorar la comunicación entre la comunidad del ITSC y el 
                        personal de mantenimiento.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-2">Beneficios</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>✓ Reportes centralizados</li>
                        <li>✓ Seguimiento del estado</li>
                        <li>✓ Mayor eficiencia en la atención</li>
                        <li>✓ Historial de incidencias</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-lg font-semibold mb-2">ITSC - Instituto Técnico Superior Comunitario</p>
            <p class="text-gray-400">Sistema de Reportes de Infraestructura</p>
            <p class="text-gray-500 text-sm mt-4">© 2026 SOF-111 - Construcción de Software</p>
        </div>
    </footer>
</body>
</html>