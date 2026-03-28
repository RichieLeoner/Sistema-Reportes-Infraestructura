<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Reportes')</title>
    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Sistema de Reportes</h1>
            <div>
                @auth
                    <span class="mr-4">Hola, {{ auth()->user()->name }}</span>
                    <span class="mr-4 bg-blue-700 px-2 py-1 rounded text-sm">
                        {{ ucfirst(auth()->user()->role->name) }}
                    </span>
                    
                    <!-- Enlace al dashboard según rol -->
                    @if(auth()->user()->role->name === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                    @elseif(auth()->user()->role->name === 'mantenimiento')
                        <a href="{{ route('mantenimiento.dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                    @else
                        <a href="{{ route('usuario.dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                    @endif
                    
                    <a href="{{ route('reportes.index') }}" class="mr-4 hover:underline">Reportes</a>
                    <a href="{{ route('reportes.historial') }}" class="mr-4 hover:underline">Historial</a>
                    
                    <!-- Notificaciones con contador -->
                    @php
                        $unreadNotifications = auth()->user()->unreadNotifications()->count();
                    @endphp
                    <a href="{{ route('notifications.index') }}" class="mr-4 hover:underline relative">
                        🔔 Notificaciones
                        @if($unreadNotifications > 0)
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{ $unreadNotifications > 9 ? '9+' : $unreadNotifications }}
                            </span>
                        @endif
                    </a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-2 hover:underline">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="hover:underline">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container mx-auto mt-6 p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; 2026 Sistema de Reporte de Infraestructura</p>
    </footer>
</body>
</html>
