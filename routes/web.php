<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Rutas de Portada/Landing Page
|--------------------------------------------------------------------------
*/

// Página de inicio (portada)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Redireccionar al dashboard correcto si está autenticado
Route::get('/dashboard', function () {
    if (auth()->check()) {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        
        if ($user->isMaintenance()) {
            return redirect()->route('mantenimiento.dashboard');
        }
        
        return redirect()->route('usuario.dashboard');
    }
    
    return redirect()->route('login');
})->name('dashboard')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Rutas de Autenticación (públicas)
|--------------------------------------------------------------------------
*/

// Grupo de rutas para invitados (no autenticados)
Route::middleware('guest')->group(function () {
    // Mostrar formulario de login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    
    // Procesar login
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    // Mostrar formulario de registro
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    
    // Procesar registro
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Cerrar sesión (para autenticados)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Rutas de Dashboards (por rol) - Requieren autenticación y rol específico
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard de Administrador (solo admin)
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('admin.dashboard');
    
    // Dashboard de Mantenimiento (solo mantenimiento)
    Route::get('/mantenimiento/dashboard', [DashboardController::class, 'mantenimiento'])
        ->middleware('role:mantenimiento')
        ->name('mantenimiento.dashboard');
    
    // Dashboard de Usuario (usuario, admin y mantenimiento pueden acceder)
    Route::get('/usuario/dashboard', [DashboardController::class, 'usuario'])
        ->middleware('role:usuario|admin|mantenimiento')
        ->name('usuario.dashboard');
});


/*
|--------------------------------------------------------------------------
| Rutas de Reportes (CRUD) - Requieren autenticación
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Historial de reportes con filtros
    Route::get('/reportes/historial', [ReporteController::class, 'historial'])->name('reportes.historial');

    // Listar reportes (todos los roles pueden ver)
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

    // Mostrar formulario para crear reporte (todos los roles pueden crear)
    Route::get('/reportes/crear', [ReporteController::class, 'create'])->name('reportes.create');

    // Guardar nuevo reporte (todos los roles pueden crear)
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');

    // Mostrar detalle de un reporte (todos los roles pueden ver)
    Route::get('/reportes/{id}', [ReporteController::class, 'show'])->name('reportes.show');

    // Mostrar formulario para editar reporte (solo admin y mantenimiento)
    Route::get('/reportes/{id}/editar', [ReporteController::class, 'edit'])
        ->middleware('role:admin|mantenimiento')
        ->name('reportes.edit');

    // Actualizar reporte (solo admin y mantenimiento)
    Route::put('/reportes/{id}', [ReporteController::class, 'update'])
        ->middleware('role:admin|mantenimiento')
        ->name('reportes.update');

    // Eliminar reporte (solo admin)
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('reportes.destroy');
});

/*
|--------------------------------------------------------------------------
| Rutas de Notificaciones - Requieren autenticación
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Listar notificaciones
    Route::get('/notificaciones', [NotificationController::class, 'index'])->name('notifications.index');
    
    // Marcar como leída
    Route::post('/notificaciones/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    
    // Marcar todas como leídas
    Route::post('/notificaciones/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    
    // Eliminar notificación
    Route::delete('/notificaciones/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    
    // Eliminar leídas
    Route::delete('/notificaciones/read', [NotificationController::class, 'deleteRead'])->name('notifications.delete-read');
});
