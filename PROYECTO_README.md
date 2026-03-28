# Sistema de Reporte de Problemas de Infraestructura

Proyecto completo desarrollado en **Laravel 12** para gestionar reportes de problemas de infraestructura.

---

## 🚀 Instalación

### Requisitos previos
- PHP 8.2 o superior
- Composer
- MySQL o SQLite
- Node.js (opcional, para assets)

### Pasos de instalación

1. **Clonar el repositorio:**
   ```bash
   git clone <url-del-repositorio>
   cd sistema-reportes-infraestructura
   ```

2. **Instalar dependencias:**
   ```bash
   composer install
   ```

3. **Configurar archivo .env:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurar base de datos en .env:**
   ```env
   # Para SQLite (más simple)
   DB_CONNECTION=sqlite
   
   # Para MySQL
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sistema_reportes
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Ejecutar migraciones y seeders:**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Crear enlace simbólico para storage:**
   ```bash
   php artisan storage:link
   ```

7. **Iniciar el servidor:**
   ```bash
   php artisan serve
   ```

8. **Acceder al sistema:**
   ```
   http://localhost:8000
   ```

---

## 👥 Usuarios de Prueba

| Email | Contraseña | Rol |
|-------|------------|-----|
| admin@itsc.edu.do | 123456 | Administrador |
| mantenimiento@itsc.edu.do | 123456 | Mantenimiento |
| demo1@itsc.edu.do | demo1234 | Usuario (Estudiante) |
| demo2@itsc.edu.do | demo1234 | Usuario (Profesor) |
| demo3@itsc.edu.do | demo1234 | Mantenimiento |

---

## 📋 Funcionalidades

### Autenticación y Roles
- ✅ Login y registro de usuarios
- ✅ 3 roles con permisos diferentes:
  - **Admin**: Acceso completo al sistema
  - **Mantenimiento**: Gestiona reportes (cambia estados)
  - **Usuario**: Crea y ve sus propios reportes

### Gestión de Reportes (CRUD)
- ✅ Crear nuevos reportes con foto opcional
- ✅ Ver lista de reportes (todos o propios según rol)
- ✅ Ver detalle de cada reporte
- ✅ Editar estado y prioridad (Admin y Mantenimiento)
- ✅ Eliminar reportes (solo Admin)

### Estados y Prioridades
**Estados:**
- 🟡 Pendiente
- 🔵 En Proceso
- 🟢 Resuelto

**Prioridades:**
- ⚫ Baja
- 🔵 Media
- 🔴 Alta

### Dashboards
- **Admin**: Estadísticas generales, todos los reportes
- **Mantenimiento**: Reportes pendientes por atender
- **Usuario**: Mis reportes, historial personal

### Historial y Filtros
- 🔍 Búsqueda por ubicación o descripción
- 🎯 Filtro por estado
- ⚡ Filtro por prioridad
- 📅 Filtro por rango de fechas
- 📄 Paginación de resultados

### Notificaciones
- 🔔 Notificación cuando se crea un reporte (a admins y mantenimiento)
- 📧 Notificación cuando se actualiza un reporte (al usuario dueño)
- ✅ Marcar como leídas
- 🗑️ Eliminar notificaciones

---

## 🗂️ Estructura del Proyecto

```
sistema-reportes-infraestructura/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── ReporteController.php
│   │   │   └── NotificationController.php
│   │   ├── Middleware/
│   │   │   └── CheckRole.php
│   │   └── Requests/
│   │       ├── LoginUserRequest.php
│   │       ├── RegisterUserRequest.php
│   │       ├── StoreReporteRequest.php
│   │       └── UpdateReporteRequest.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Role.php
│   │   └── Ticket.php
│   └── Notifications/
│       ├── NuevoReporteNotification.php
│       └── ReporteActualizadoNotification.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── auth/
│       ├── dashboard/
│       ├── reportes/
│       └── notifications/
└── routes/
    └── web.php
```

---

## 🛠️ Comandos Útiles

```bash
# Iniciar servidor
php artisan serve

# Ejecutar migraciones
php artisan migrate

# Reiniciar BD con datos de prueba
php artisan migrate:fresh --seed

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ver rutas
php artisan route:list

# Ver logs
tail -f storage/logs/laravel.log
```

---

## 🔐 Permisos por Rol

| Acción | Admin | Mantenimiento | Usuario |
|--------|-------|---------------|---------|
| Ver dashboard admin | ✅ | ❌ | ❌ |
| Ver dashboard mantenimiento | ✅ | ✅ | ❌ |
| Ver dashboard usuario | ✅ | ✅ | ✅ |
| Crear reporte | ✅ | ✅ | ✅ |
| Ver todos los reportes | ✅ | ✅ | ❌ |
| Ver reporte propio | ✅ | ✅ | ✅ |
| Editar estado/prioridad | ✅ | ✅ | ❌ |
| Eliminar reporte | ✅ | ❌ | ❌ |
| Recibir notificaciones | ✅ | ✅ | ✅ |

---

## 📸 Capturas

### Login
- URL: `/login`
- Formulario de acceso con validación

### Dashboard Admin
- URL: `/admin/dashboard`
- Estadísticas en tiempo real
- Últimos reportes creados

### Lista de Reportes
- URL: `/reportes`
- Tabla con todos los reportes (o propios)
- Filtros y paginación

### Historial
- URL: `/reportes/historial`
- Búsqueda avanzada
- Filtros por fecha, estado, prioridad

### Notificaciones
- URL: `/notificaciones`
- Lista de notificaciones
- Contador en navbar

---

## 🎨 Tecnologías Utilizadas

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Tailwind CSS (vía CDN)
- **Base de Datos:** MySQL / SQLite
- **Notificaciones:** Sistema nativo de Laravel
- **Validaciones:** Form Requests
- **Enums:** PHP 8.2+

---

## 📝 Changelog

### v1.0.0 (2026-03-28)
- ✅ Implementación inicial completa
- ✅ 15 pasos del tutorial completados
- ✅ Sistema funcional listo para producción

---

## 👨‍💻 Desarrollador

Sistema desarrollado como proyecto de aprendizaje de Laravel MVC.

---

## 📄 Licencia

Proyecto educativo de código abierto.

---

## 🆘 Soporte

Para problemas o preguntas:
1. Revisa este README
2. Verifica los logs en `storage/logs/`
3. Ejecuta `php artisan` para ver comandos disponibles

---

**¡Gracias por usar el Sistema de Reporte de Infraestructura!** 🎉
