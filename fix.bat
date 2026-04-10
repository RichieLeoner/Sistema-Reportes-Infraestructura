@echo off
echo ============================================
echo   REPARACION DEL PROYECTO LARAVEL
echo ============================================
echo.

echo [1/6] Limpiando caché de Composer...
call composer clear-cache

echo.
echo [2/6] Regenerando autoload...
call composer dump-autoload -o

echo.
echo [3/6] Limpiando caché de Laravel...
call php artisan optimize:clear

echo.
echo [4/6] Verificando sintaxis de controladores...
call php -l app/Http/Controllers/AuthController.php
call php -l app/Http/Controllers/DashboardController.php
call php -l app/Http/Controllers/NotificationController.php
call php -l app/Http/Controllers/ReporteController.php

echo.
echo [5/6] Verificando rutas...
call php -l routes/web.php

echo.
echo [6/6] Optimizando aplicación...
call php artisan config:cache
call php artisan route:cache
call php artisan view:cache

echo.
echo ============================================
echo   REPARACION COMPLETADA
echo ============================================
echo.
echo Si los archivos siguen en rojo en VS Code:
echo 1. Reinicia VS Code
echo 2. O mueve el proyecto fuera de OneDrive
echo.
pause
