# SISTEMA DE REPORTE DE PROBLEMAS DE INFRAESTRUCTURA
## DOCUMENTACIÓN TÉCNICA SRS - SOFTWARE REQUIREMENTS SPECIFICATION

---

**INSTITUTO TÉCNICO SUPERIOR COMUNITARIO (ITSC)**  
**SOF-111 – CONSTRUCCIÓN DE SOFTWARE**  
**CUATRIMESTRE 2026-1**

---

**Estudiante:** [Nombre del Estudiante]  
**Matrícula:** [Matrícula]  
**Profesor:** [Nombre del Profesor]  
**Fecha de Entrega:** 31 de marzo de 2026

---

# TABLA DE CONTENIDOS

1. [Portada](#1-portada)
2. [Introducción](#2-introducción)
3. [Problema a Resolver](#3-problema-a-resolver)
4. [Objetivo del Sistema](#4-objetivo-del-sistema)
5. [Alcance del Sistema](#5-alcance-del-sistema)
6. [Actores del Sistema](#6-actores-del-sistema)
7. [Requerimientos Funcionales](#7-requerimientos-funcionales)
8. [Requerimientos No Funcionales](#8-requerimientos-no-funcionales)
9. [Casos de Uso Detallados](#9-casos-de-uso-detallados)
10. [Diagramas del Sistema](#10-diagramas-del-sistema)
11. [Modelo de Datos](#11-modelo-de-datos)
12. [Mockups](#12-mockups)
13. [Explicación de la Arquitectura MVC](#13-explicación-de-la-arquitectura-mvc)
14. [Conclusión](#14-conclusión)
15. [Anexos](#15-anexos)

---

# 1. PORTADA

---

<div align="center">

![LOGO ITSC](ESPACIO_PARA_INSERTAR_LOGO_ITSC.png)

## INSTITUTO TÉCNICO SUPERIOR COMUNITARIO (ITSC)

### SOF-111 – CONSTRUCCIÓN DE SOFTWARE

<br>

# SISTEMA DE REPORTE DE PROBLEMAS DE INFRAESTRUCTURA

## Documentación Técnica SRS  
### Software Requirements Specification

<br><br><br>

**Presentado por:**

| Dato | Información |
|------|-------------|
| **Estudiante:** | [Nombre del Estudiante] |
| **Matrícula:** | [Matrícula] |
| **Cuatrimestre:** | 2026-1 |
| **Profesor:** | [Nombre del Profesor] |
| **Asignatura:** | SOF-111 - Construcción de Software |
| **Fecha de Entrega:** | 31 de marzo de 2026 |

<br><br><br>

**San Cristóbal, República Dominicana**  
**Marzo 2026**

</div>

---

# 2. INTRODUCCIÓN

## 2.1 Propósito del Documento

El presente documento tiene como propósito especificar de manera completa y detallada los requisitos de software para el Sistema de Reporte de Problemas de Infraestructura del Instituto Técnico Superior Comunitario (ITSC). Esta especificación de requisitos de software (SRS, por sus siglas en inglés Software Requirements Specification) sirve como un acuerdo formal entre el equipo de desarrollo y las partes interesadas, describiendo las funcionalidades, restricciones y comportamientos esperados del sistema.

Este documento está dirigido a los evaluadores de la asignatura SOF-111 (Construcción de Software), así como a futuros desarrolladores que puedan dar continuidad al proyecto en cuatrimestres posteriores. La documentación sigue los estándares IEEE para especificación de requisitos de software, adaptados al contexto académico de la institución.

## 2.2 Descripción General del Sistema

El Sistema de Reporte de Problemas de Infraestructura es una aplicación web diseñada para digitalizar y optimizar el proceso de comunicación entre la comunidad educativa del ITSC y el departamento de mantenimiento. La plataforma permite a estudiantes, profesores y personal administrativo reportar incidencias relacionadas con la infraestructura del instituto de manera rápida y sencilla, mientras que el personal de mantenimiento puede gestionar, actualizar y resolver dichos reportes de forma organizada y eficiente.

El sistema centraliza todas las solicitudes de mantenimiento en una base de datos única, eliminando los procesos manuales y descentralizados que anteriormente generaban pérdida de información y falta de seguimiento. Cada reporte incluye información detallada como ubicación, descripción del problema, nivel de prioridad y evidencia fotográfica opcional, lo que facilita la labor del personal de mantenimiento al contar con todos los elementos necesarios para atender cada incidencia.

## 2.3 Tecnologías Utilizadas

El sistema ha sido desarrollado utilizando tecnologías modernas y ampliamente adoptadas en la industria del desarrollo de software:

| Tecnología | Versión | Propósito |
|------------|---------|-----------|
| PHP | 8.2+ | Lenguaje de programación del backend |
| Laravel | 12.x | Framework PHP para desarrollo web |
| MySQL | 8.0+ | Sistema de gestión de base de datos relacional |
| Tailwind CSS | CDN | Framework de CSS para diseño responsive |
| Blade | Laravel | Motor de plantillas para vistas |

La arquitectura del sistema sigue el patrón de diseño Modelo-Vista-Controlador (MVC), el cual proporciona una separación clara de responsabilidades entre la lógica de negocio, la presentación y el manejo de datos. Esta separación facilita el mantenimiento del código, la escalabilidad del sistema y el trabajo colaborativo entre desarrolladores.

## 2.4 Actores Principales del Sistema

El sistema cuenta con tres actores principales, cada uno con permisos y funcionalidades específicas:

1. **Administrador**: Usuario con acceso completo a todas las funcionalidades del sistema. Puede gestionar usuarios, visualizar estadísticas generales, crear, editar y eliminar reportes, así como configurar parámetros del sistema.

2. **Personal de Mantenimiento**: Usuario encargado de atender los reportes de infraestructura. Puede visualizar todos los reportes, cambiar el estado de los mismos (Pendiente → En Proceso → Resuelto), y actualizar la prioridad de cada incidencia.

3. **Estudiante/Profesor**: Usuario final que utiliza el sistema principalmente para reportar problemas de infraestructura. Puede crear nuevos reportes, visualizar el historial de sus propios reportes y consultar el estado de cada uno.

## 2.5 Relación con la Asignatura SOF-111

Este proyecto se desarrolla en el contexto de la asignatura SOF-111 (Construcción de Software), la cual tiene como objetivo que los estudiantes apliquen los conocimientos adquiridos sobre metodologías de desarrollo, patrones de diseño y buenas prácticas de programación. El sistema cumple con los requisitos mínimos establecidos por la asignatura:

- Implementación de autenticación y manejo de sesiones
- Gestión de tickets/reportes con operaciones CRUD
- Implementación de control de roles y permisos
- Cambio de estados en los registros
- Consulta de historial de incidencias
- Documentación completa según estándar SRS

El desarrollo de este proyecto permite demostrar la competencia en la construcción de software profesional, aplicando patrones de diseño establecidos, frameworks modernos y documentación técnica adecuada.

## 2.6 Estructura del Documento

Este documento SRS está organizado en 15 secciones principales que cubren todos los aspectos del sistema:

| Sección | Título | Descripción |
|---------|--------|-------------|
| 1 | Portada | Información institucional y datos del proyecto |
| 2 | Introducción | Propósito, descripción y tecnologías |
| 3 | Problema a Resolver | Contexto actual y necesidad de solución |
| 4 | Objetivo del Sistema | Objetivos general y específicos |
| 5 | Alcance del Sistema | Límites y criterios de aceptación |
| 6 | Actores del Sistema | Roles y permisos de usuarios |
| 7 | Requerimientos Funcionales | Funcionalidades del sistema |
| 8 | Requerimientos No Funcionales | Calidad y restricciones técnicas |
| 9 | Casos de Uso Detallados | Flujos de interacción usuario-sistema |
| 10 | Diagramas del Sistema | Representaciones gráficas |
| 11 | Modelo de Datos | Estructura de la base de datos |
| 12 | Mockups | Diseños de interfaz de usuario |
| 13 | Arquitectura MVC | Explicación del patrón implementado |
| 14 | Conclusión | Resumen y valoración del proyecto |
| 15 | Anexos | Información complementaria |

---

# 3. PROBLEMA A RESOLVER

## 3.1 Contexto Actual

En el Instituto Técnico Superior Comunitario (ITSC), el proceso de reporte y atención de problemas de infraestructura se ha llevado a cabo tradicionalmente mediante métodos manuales y descentralizados. Cuando un estudiante, profesor o miembro del personal administrativo identifica una incidencia en la infraestructura del instituto (como daños en mobiliario, problemas eléctricos, fugas de agua, daños en paredes, etc.), el proceso actual sigue los siguientes pasos:

1. La persona identifica el problema en sus instalaciones
2. La persona debe desplazarse físicamente hasta las oficinas de mantenimiento o dirección
3. Se llena un formulario en papel con los datos básicos del problema
4. El formulario se deposita en una bandeja de entrada
5. El personal de mantenimiento revisa periódicamente la bandeja
6. Se asigna manualmente la incidencia a un técnico disponible
7. Se atiende el problema cuando hay recursos disponibles
8. No existe un mecanismo formal de seguimiento para el reportante

Este proceso manual presenta numerosas limitaciones que afectan tanto a la comunidad educativa como al personal encargado del mantenimiento.

### Limitaciones Identificadas

| # | Limitación | Descripción |
|---|------------|-------------|
| 1 | **Descentralización** | Los reportes se reciben en múltiples puntos físicos sin un registro centralizado |
| 2 | **Pérdida de información** | Los formularios en papel se extravían con frecuencia o se deterioran |
| 3 | **Falta de seguimiento** | El reportante no tiene forma de conocer el estado de su reporte |
| 4 | **Ineficiencia temporal** | El tiempo entre el reporte y la atención puede ser excesivamente largo |
| 5 | **Ausencia de priorización** | No existe un mecanismo claro para priorizar reportes urgentes |
| 6 | **Duplicidad de reportes** | Múltiples personas pueden reportar el mismo problema sin saberlo |
| 7 | **Falta de evidencia** | No se cuenta con fotografías o detalles técnicos del problema |
| 8 | **Sin estadísticas** | No se generan reportes estadísticos para la toma de decisiones |

## 3.2 Problemas Identificados

### Falta de Centralización

Los reportes de infraestructura se reciben en diferentes ubicaciones físicas del campus (oficinas de mantenimiento, dirección, coordinación de carreras), lo que genera confusión sobre dónde debe dirigirse el reportante. Esta dispersión provoca que algunos reportes nunca lleguen al departamento correspondiente, quedando las incidencias sin atender por problemas de comunicación interna.

### Ausencia de Seguimiento

Una vez que una persona realiza un reporte, no existe ningún mecanismo que le permita consultar el estado o progreso de su incidencia. Esta falta de transparencia genera frustración en la comunidad educativa, ya que perciben que sus reportes "caen en un saco roto" y no reciben retroalimentación alguna sobre las acciones tomadas.

### Pérdida de Información

El uso de formularios en papel conlleva riesgos inherentes de pérdida, deterioro o extravío de la información. Los formularios pueden dañarse por condiciones ambientales, perderse durante el traslado entre oficinas, o simplemente acumularse sin ser procesados. Además, la información en formato físico no puede ser respaldada ni recuperada en caso de pérdida.

### Ineficiencia en la Gestión

El proceso manual requiere que el personal de mantenimiento dedique tiempo significativo a tareas administrativas como organizar formularios, transcribir información a hojas de cálculo, y coordinar mediante métodos tradicionales (teléfono, notas) la asignación de tareas. Este tiempo podría ser mejor empleado en labores técnicas de mantenimiento preventivo y correctivo.

### Falta de Estadísticas

La administración del instituto no cuenta con herramientas que permitan generar estadísticas sobre los reportes de infraestructura. No es posible responder preguntas como: ¿Qué áreas del campus generan más reportes? ¿Qué tipo de problemas son más frecuentes? ¿Cuál es el tiempo promedio de resolución? Esta falta de datos dificulta la planificación presupuestaria y la toma de decisiones estratégicas sobre mantenimiento.

## 3.3 Impacto del Problema

### Impacto en Estudiantes y Profesores

| Área de Impacto | Descripción |
|-----------------|-------------|
| **Experiencia del usuario** | Frustración al no poder reportar problemas de manera sencilla y rápida |
| **Confianza institucional** | Percepción negativa de la capacidad de respuesta del instituto |
| **Ambiente de aprendizaje** | Problemas de infraestructura no atendidos afectan las condiciones educativas |
| **Tiempo** | Desplazamientos innecesarios para realizar reportes presenciales |

### Impacto en Personal de Mantenimiento

| Área de Impacto | Descripción |
|-----------------|-------------|
| **Carga administrativa** | Tiempo excesivo dedicado a organizar y procesar reportes en papel |
| **Planificación** | Dificultad para priorizar y asignar recursos eficientemente |
| **Comunicación** | Problemas para coordinar entre miembros del equipo |
| **Rendimiento de cuentas** | Imposibilidad de demostrar el trabajo realizado |

### Impacto en Administración

| Área de Impacto | Descripción |
|-----------------|-------------|
| **Toma de decisiones** | Falta de datos para planificación presupuestaria |
| **Control** | Imposibilidad de monitorear el desempeño del departamento |
| **Calidad** | Dificultad para garantizar estándares de infraestructura |
| **Comunicación** | Quejas de la comunidad estudiantil y docente |

## 3.4 Necesidad de Solución

Ante el contexto descrito, se hace evidente la necesidad de implementar un sistema digital que centralice y optimice el proceso de reporte y atención de problemas de infraestructura. El Sistema de Reporte de Problemas de Infraestructura propuesto aborda directamente cada una de las limitaciones identificadas:

| Necesidad | Solución Propuesta |
|-----------|-------------------|
| Centralizar reportes | Plataforma web única accesible desde cualquier dispositivo |
| Evitar pérdida de información | Base de datos digital con respaldo automático |
| Permitir seguimiento | Consulta en línea del estado de cada reporte |
| Mejorar eficiencia | Flujo de trabajo digitalizado y automatizado |
| Facilitar priorización | Sistema de niveles de prioridad (baja, media, alta) |
| Evitar duplicidad | Búsqueda y visualización de reportes existentes |
| Incluir evidencia | Opción de adjuntar fotografías a los reportes |
| Generar estadísticas | Dashboard con métricas y gráficos en tiempo real |

La implementación de este sistema no solo resolverá los problemas operativos actuales, sino que también proporcionará una base tecnológica sólida para futuras mejoras y ampliaciones funcionales en cuatrimestres posteriores.

---

# 4. OBJETIVO DEL SISTEMA

## 4.1 Objetivo General

Desarrollar e implementar un sistema web de gestión de reportes de infraestructura basado en la arquitectura MVC utilizando el framework Laravel, que permita a la comunidad del Instituto Técnico Superior Comunitario (ITSC) reportar, dar seguimiento y gestionar de manera eficiente las incidencias relacionadas con la infraestructura del instituto, centralizando la información en una base de datos única, facilitando la comunicación entre los diferentes actores del sistema y proporcionando herramientas estadísticas para la toma de decisiones administrativas.

## 4.2 Objetivos Específicos

### Objetivos Funcionales

| # | Objetivo | Descripción |
|---|----------|-------------|
| OF-01 | **Implementar sistema de autenticación** | Desarrollar un módulo de login y registro que permita a los usuarios acceder al sistema de manera segura mediante credenciales válidas, manejando sesiones activas durante la navegación |
| OF-02 | **Gestionar creación de reportes** | Permitir a los usuarios autenticados crear nuevos reportes de incidencias, incluyendo campos obligatorios como ubicación, descripción y prioridad, con opción de adjuntar evidencia fotográfica |
| OF-03 | **Visualizar listado de reportes** | Mostrar un listado completo de todos los reportes existentes, con capacidad de filtrado por estado, prioridad, fecha y búsqueda por texto, adaptando la visibilidad según el rol del usuario |
| OF-04 | **Actualizar estado de tickets** | Habilitar la funcionalidad para que el personal autorizado pueda cambiar el estado de los reportes a través del flujo: Pendiente → En Proceso → Resuelto, registrando cada cambio en el sistema |
| OF-05 | **Consultar historial de incidencias** | Proporcionar una vista de historial que permita a los usuarios consultar todos sus reportes anteriores, con información detallada de cada uno y su estado actual |
| OF-06 | **Implementar control de roles** | Diferenciar entre tres tipos de usuarios (Administrador, Mantenimiento, Estudiante/Profesor) con permisos y funcionalidades específicas para cada rol |
| OF-07 | **Gestionar notificaciones** | Notificar automáticamente a los usuarios relevantes cuando se creen nuevos reportes o cuando se actualice el estado de un reporte existente |

### Objetivos Técnicos

| # | Objetivo | Descripción |
|---|----------|-------------|
| OT-01 | **Implementar arquitectura MVC** | Estructurar el código siguiendo el patrón Modelo-Vista-Controlador, separando claramente la lógica de negocio (Modelos), la presentación (Vistas) y el control de flujo (Controladores) |
| OT-02 | **Utilizar framework Laravel 12** | Aprovechar las características del framework Laravel versión 12 o superior, incluyendo Eloquent ORM para manejo de base de datos, Blade como motor de plantillas, y el sistema de autenticación nativo |
| OT-03 | **Diseñar base de datos relacional** | Implementar una base de datos MySQL con las tablas necesarias (users, roles, tickets, notifications) estableciendo las relaciones apropiadas mediante claves foráneas |
| OT-04 | **Aplicar validaciones del servidor** | Implementar validaciones en el lado del servidor utilizando Form Requests de Laravel para garantizar la integridad de los datos ingresados |
| OT-05 | **Garantizar seguridad de contraseñas** | Almacenar las contraseñas de los usuarios utilizando el algoritmo de hash bcrypt, garantizando que las credenciales no se guarden en texto plano |

### Objetivos de Documentación

| # | Objetivo | Descripción |
|---|----------|-------------|
| OD-01 | **Elaborar documentación SRS completa** | Generar un documento de Especificación de Requisitos de Software que cubra las 15 secciones estándar, incluyendo todos los requerimientos funcionales y no funcionales |
| OD-02 | **Documentar casos de uso** | Detallar al menos 3 casos de uso principales con sus flujos principales, alternativos y excepciones, especificando actores, precondiciones y postcondiciones |
| OD-03 | **Crear diagramas del sistema** | Elaborar diagramas de contexto, casos de uso, clases y entidad-relación que representen gráficamente la arquitectura y funcionamiento del sistema |
| OD-04 | **Documentar modelo de datos** | Especificar el diccionario de datos completo de todas las tablas de la base de datos, incluyendo tipos, restricciones y relaciones |

## 4.3 Alcance del Objetivo

### Lo que SÍ incluye el proyecto para SOF-111

| # | Funcionalidad | Estado |
|---|---------------|--------|
| ✓ | Sistema de autenticación (login y registro) | Implementado |
| ✓ | Manejo de sesiones de usuario | Implementado |
| ✓ | Creación de tickets/reportes | Implementado |
| ✓ | Listado de reportes con filtros básicos | Implementado |
| ✓ | Cambio de estado del ticket (Pendiente → En Proceso → Resuelto) | Implementado |
| ✓ | Consulta de historial de incidencias | Implementado |
| ✓ | Control de roles (Admin, Mantenimiento, Usuario) | Implementado |
| ✓ | Validaciones de formularios | Implementado |
| ✓ | Notificaciones básicas del sistema | Implementado |
| ✓ | Documentación SRS completa | En elaboración |

### Lo que NO incluye para SOF-111 (para futuras iteraciones SOF-113)

| # | Funcionalidad | Estado |
|---|---------------|--------|
| ✗ | Módulo de mantenimiento preventivo programado | Fuera de alcance |
| ✗ | Sistema de asignación automática de técnicos | Fuera de alcance |
| ✗ | Generación de reportes PDF/Excel exportables | Fuera de alcance |
| ✗ | Integración con correo electrónico para notificaciones | Fuera de alcance |
| ✗ | Sistema de calificación de servicio recibido | Fuera de alcance |
| ✗ | Módulo de inventario de materiales | Fuera de alcance |
| ✗ | Aplicación móvil nativa | Fuera de alcance |
| ✗ | Sistema de chat en tiempo real | Fuera de alcance |
| ✗ | Geolocalización de reportes | Fuera de alcance |
| ✗ | Dashboard avanzado con gráficos complejos | Fuera de alcance |

---

# 5. ALCANCE DEL SISTEMA

## 5.1 Alcance Funcional

El sistema incluye las siguientes funcionalidades que serán implementadas y entregadas como parte del proyecto de la asignatura SOF-111:

| ID | Funcionalidad | Descripción | Prioridad |
|----|---------------|-------------|-----------|
| AF-01 | Autenticación de usuarios | Login con email y contraseña, registro de nuevos usuarios, cierre de sesión seguro | Alta |
| AF-02 | Gestión de sesiones | Mantener sesión activa durante la navegación, recordar usuario, invalidar sesión al salir | Alta |
| AF-03 | Creación de reportes | Formulario para crear nuevos tickets con ubicación, descripción, prioridad y foto opcional | Alta |
| AF-04 | Listado de reportes | Vista de tabla con todos los reportes visibles según el rol del usuario | Alta |
| AF-05 | Detalle de reporte | Vista individual de cada reporte con toda su información y estado actual | Alta |
| AF-06 | Edición de estado | Cambiar estado del ticket (pendiente, en proceso, resuelto) - solo Admin y Mantenimiento | Alta |
| AF-07 | Edición de prioridad | Cambiar prioridad del ticket (baja, media, alta) - solo Admin y Mantenimiento | Media |
| AF-08 | Eliminación de reportes | Eliminar tickets del sistema - solo Administrador | Media |
| AF-09 | Historial de reportes | Vista de historial con filtros avanzados por fecha, estado y prioridad | Media |
| AF-10 | Búsqueda de reportes | Buscar reportes por ubicación o descripción mediante texto libre | Media |
| AF-11 | Filtrado por estado | Filtrar reportes mostrando solo los de un estado específico | Media |
| AF-12 | Filtrado por prioridad | Filtrar reportes mostrando solo los de una prioridad específica | Baja |
| AF-13 | Notificaciones | Sistema de notificaciones internas cuando se crea o actualiza un reporte | Media |
| AF-14 | Dashboard por rol | Panel principal personalizado según el rol del usuario autenticado | Alta |
| AF-15 | Control de roles | Diferenciar permisos y vistas según el rol (Admin, Mantenimiento, Usuario) | Alta |

## 5.2 Alcance Técnico

El proyecto se desarrollará utilizando las siguientes tecnologías y estándares técnicos:

| Categoría | Tecnología/Estándar | Versión/Descripción |
|-----------|---------------------|---------------------|
| **Lenguaje de Programación** | PHP | Versión 8.2 o superior |
| **Framework Backend** | Laravel | Versión 12.x |
| **Base de Datos** | MySQL / MariaDB | Versión 8.0 o superior |
| **ORM** | Eloquent | Incluido en Laravel |
| **Motor de Plantillas** | Blade | Incluido en Laravel |
| **Framework CSS** | Tailwind CSS | Versión CDN (3.x) |
| **Servidor Web** | PHP Built-in Server / Apache | Para desarrollo/producción |
| **Control de Versiones** | Git | Para manejo del código fuente |
| **Arquitectura** | MVC | Modelo-Vista-Controlador |
| **Seguridad** | bcrypt | Para encriptación de contraseñas |
| **Validaciones** | Form Requests | Sistema nativo de Laravel |
| **Migraciones** | Laravel Migrations | Para versionado de BD |
| **Seeders** | Laravel Seeders | Para datos de prueba |

## 5.3 Alcance Temporal

El proyecto se desarrollará durante el cuatrimestre **2026-1** del calendario académico del ITSC, con las siguientes fechas clave:

| Hito | Fecha Estimada | Descripción |
|------|----------------|-------------|
| Inicio del desarrollo | Semana 1 del cuatrimestre | Configuración del entorno y estructura base |
| Implementación de autenticación | Semana 2-3 | Login, registro y control de roles |
| Desarrollo de CRUD de reportes | Semana 4-6 | Creación, edición, listado y eliminación |
| Sistema de notificaciones | Semana 7-8 | Notificaciones internas y dashboard |
| Pruebas y depuración | Semana 9-10 | Testing funcional y corrección de errores |
| Elaboración de documentación | Semana 11-12 | Redacción del SRS y manual de usuario |
| Entrega final | Semana 13 | Presentación del proyecto completo |

## 5.4 Fuera de Alcance

Las siguientes funcionalidades y características quedan excluidas del alcance del proyecto para SOF-111, pero están contempladas como posibles mejoras para futuras iteraciones en la asignatura SOF-113:

| ID | Funcionalidad | Justificación de exclusión |
|----|---------------|---------------------------|
| FA-01 | Módulo de mantenimiento preventivo programado | Requiere lógica compleja de calendarización |
| FA-02 | Sistema de asignación automática de técnicos | Necesita algoritmos de distribución de carga |
| FA-03 | Exportación de reportes a PDF/Excel | Requiere librerías adicionales |
| FA-04 | Notificaciones por correo electrónico | Necesita configuración de servidor SMTP |
| FA-05 | Sistema de calificación de servicio | Requiere módulo adicional de feedback |
| FA-06 | Módulo de inventario de materiales | Amplía significativamente el alcance |
| FA-07 | Aplicación móvil nativa (iOS/Android) | Requiere tecnologías diferentes |
| FA-08 | Sistema de chat en tiempo real | Necesita WebSockets y servidor especializado |
| FA-09 | Geolocalización de reportes con mapas | Requiere integración con APIs externas |
| FA-10 | Dashboard avanzado con gráficos complejos | Necesita librerías de visualización |
| FA-11 | Sistema multi-idioma | Añade complejidad de internacionalización |
| FA-12 | API REST para integración externa | Requiere diseño y documentación adicional |

## 5.5 Criterios de Aceptación

El proyecto se considerará completado y aceptable para evaluación cuando cumpla con las siguientes condiciones:

| # | Criterio | Verificación |
|---|----------|--------------|
| CA-01 | El sistema permite iniciar sesión con credenciales válidas | Prueba funcional de login |
| CA-02 | El sistema permite registrar nuevos usuarios | Prueba funcional de registro |
| CA-03 | El sistema diferencia correctamente entre los 3 roles | Prueba de permisos por rol |
| CA-04 | Un usuario autenticado puede crear un nuevo reporte | Prueba de creación de ticket |
| CA-05 | Los reportes creados se almacenan en la base de datos | Verificación en BD |
| CA-06 | El sistema muestra un listado de reportes visibles | Prueba de listado |
| CA-07 | Admin y Mantenimiento pueden cambiar el estado de un ticket | Prueba de actualización |
| CA-08 | El flujo de estados funciona: Pendiente → En Proceso → Resuelto | Prueba de flujo completo |
| CA-09 | Un usuario puede ver el historial de sus propios reportes | Prueba de historial |
| CA-10 | Las contraseñas están encriptadas en la base de datos | Verificación técnica |
| CA-11 | El sistema implementa arquitectura MVC | Revisión de código |
| CA-12 | La documentación SRS está completa con 15 secciones | Revisión de documento |
| CA-13 | El código está versionado en Git | Verificación de repositorio |
| CA-14 | El sistema funciona sin errores críticos | Pruebas de integración |
| CA-15 | La interfaz es usable y responsive | Prueba en diferentes dispositivos |

---

# 6. ACTORES DEL SISTEMA

El sistema cuenta con tres actores principales, cada uno con responsabilidades, permisos y funcionalidades específicas. A continuación se detalla cada actor:

## 6.1 Administrador

| Campo | Descripción |
|-------|-------------|
| **Nombre del Actor** | Administrador |
| **Descripción** | Usuario con acceso completo a todas las funcionalidades del sistema. Tiene privilegios máximos para gestionar usuarios, reportes y configuración del sistema. |
| **Responsabilidades** | - Gestionar usuarios del sistema<br>- Visualizar estadísticas generales<br>- Crear, editar y eliminar reportes<br>- Configurar parámetros del sistema<br>- Supervisar el desempeño del departamento de mantenimiento |

### Permisos del Administrador

| Permiso | Descripción |
|---------|-------------|
| Acceso total al sistema | Puede acceder a todas las vistas y funcionalidades |
| Gestión de usuarios | Puede crear, editar y eliminar usuarios |
| Gestión de reportes | Puede crear, leer, actualizar y eliminar cualquier reporte |
| Visualización de estadísticas | Puede ver dashboard con métricas completas del sistema |
| Cambio de estados | Puede modificar el estado de cualquier ticket |
| Cambio de prioridades | Puede modificar la prioridad de cualquier ticket |
| Eliminación de registros | Puede eliminar reportes del sistema |
| Gestión de notificaciones | Puede enviar y gestionar notificaciones del sistema |

### Funcionalidades Disponibles

| Funcionalidad | Acceso |
|---------------|--------|
| Iniciar sesión | ✓ |
| Registrarse | ✓ |
| Crear reporte | ✓ |
| Ver todos los reportes | ✓ |
| Ver reporte propio | ✓ |
| Editar estado/prioridad | ✓ |
| Eliminar reporte | ✓ |
| Ver dashboard admin | ✓ |
| Ver dashboard mantenimiento | ✓ |
| Ver dashboard usuario | ✓ |
| Gestionar usuarios | ✓ |
| Ver estadísticas | ✓ |

## 6.2 Personal de Mantenimiento

| Campo | Descripción |
|-------|-------------|
| **Nombre del Actor** | Personal de Mantenimiento |
| **Descripción** | Usuario encargado de atender y resolver los reportes de infraestructura. Puede visualizar todos los reportes y actualizar su estado y prioridad, pero no tiene acceso a funciones administrativas del sistema. |
| **Responsabilidades** | - Revisar reportes entrantes<br>- Actualizar estado de los tickets<br>- Priorizar incidencias<br>- Reportar resolución de problemas<br>- Mantener actualizado el sistema |

### Permisos del Personal de Mantenimiento

| Permiso | Descripción |
|---------|-------------|
| Visualizar todos los reportes | Puede ver la lista completa de reportes del sistema |
| Actualizar estado de tickets | Puede cambiar el estado de Pendiente a En Proceso a Resuelto |
| Actualizar prioridad | Puede modificar la prioridad de los reportes |
| Ver detalle de reportes | Puede acceder a la información completa de cada ticket |
| Recibir notificaciones | Recibe alertas cuando se crean nuevos reportes |
| Ver dashboard de mantenimiento | Acceso a panel específico con métricas de su rol |

### Funcionalidades Disponibles

| Funcionalidad | Acceso |
|---------------|--------|
| Iniciar sesión | ✓ |
| Registrarse | ✗ (solo por admin) |
| Crear reporte | ✓ |
| Ver todos los reportes | ✓ |
| Ver reporte propio | ✓ |
| Editar estado/prioridad | ✓ |
| Eliminar reporte | ✗ |
| Ver dashboard admin | ✗ |
| Ver dashboard mantenimiento | ✓ |
| Ver dashboard usuario | ✓ |
| Gestionar usuarios | ✗ |
| Ver estadísticas | Limitado |

## 6.3 Estudiante/Profesor (Usuario)

| Campo | Descripción |
|-------|-------------|
| **Nombre del Actor** | Estudiante/Profesor |
| **Descripción** | Usuario final del sistema, miembro de la comunidad educativa del ITSC. Utiliza la plataforma principalmente para reportar problemas de infraestructura y dar seguimiento a sus propios reportes. |
| **Responsabilidades** | - Reportar problemas de infraestructura<br>- Proporcionar información precisa del problema<br>- Adjuntar evidencia fotográfica cuando sea posible<br>- Consultar el estado de sus reportes |

### Permisos del Estudiante/Profesor

| Permiso | Descripción |
|---------|-------------|
| Crear reportes | Puede crear nuevos tickets de infraestructura |
| Ver reportes propios | Puede visualizar únicamente sus propios reportes |
| Consultar historial | Puede acceder al historial de sus incidencias |
| Ver detalle propio | Puede ver información completa de sus tickets |
| Recibir notificaciones | Recibe alertas cuando se actualiza su reporte |
| Ver dashboard usuario | Acceso a panel específico con sus métricas personales |

### Funcionalidades Disponibles

| Funcionalidad | Acceso |
|---------------|--------|
| Iniciar sesión | ✓ |
| Registrarse | ✓ |
| Crear reporte | ✓ |
| Ver todos los reportes | ✗ |
| Ver reporte propio | ✓ |
| Editar estado/prioridad | ✗ |
| Eliminar reporte | ✗ |
| Ver dashboard admin | ✗ |
| Ver dashboard mantenimiento | ✗ |
| Ver dashboard usuario | ✓ |
| Gestionar usuarios | ✗ |
| Ver estadísticas | Solo propias |

## 6.4 Tabla Comparativa de Actores

| Característica | Administrador | Mantenimiento | Estudiante/Profesor |
|----------------|---------------|---------------|---------------------|
| **Acceso al sistema** | Completo | Parcial | Limitado |
| **Crear reportes** | ✓ | ✓ | ✓ |
| **Ver todos los reportes** | ✓ | ✓ | ✗ |
| **Ver reportes propios** | ✓ | ✓ | ✓ |
| **Editar estado** | ✓ | ✓ | ✗ |
| **Editar prioridad** | ✓ | ✓ | ✗ |
| **Eliminar reportes** | ✓ | ✗ | ✗ |
| **Gestionar usuarios** | ✓ | ✗ | ✗ |
| **Ver estadísticas** | Completas | Limitadas | Solo propias |
| **Dashboard disponible** | Admin, Mant., Usuario | Mant., Usuario | Usuario |
| **Recibe notificaciones** | ✓ | ✓ | ✓ |

## 6.5 Diagrama de Actores

*[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE ACTORES]*

**Descripción del diagrama:** El diagrama de actores muestra los tres roles principales del sistema (Administrador, Personal de Mantenimiento, Estudiante/Profesor) representados como figuras humanas. Cada actor está conectado al sistema central (representado como un rectángulo) mediante líneas que indican su interacción. El Administrador aparece en la parte superior con una conexión que indica acceso completo, el Personal de Mantenimiento a un lado con acceso parcial, y el Estudiante/Profesor al otro lado con acceso limitado. Las conexiones pueden estar etiquetadas con los permisos principales de cada actor.

---

# 7. REQUERIMIENTOS FUNCIONALES

Los requerimientos funcionales describen las funciones específicas que el sistema debe implementar. Cada requerimiento está identificado con un código único y se especifica su descripción, prioridad y actor responsable.

| ID | Requerimiento | Descripción | Prioridad | Actor |
|----|---------------|-------------|-----------|-------|
| **RF-01** | **Autenticación de Usuarios** | El sistema debe permitir a los usuarios registrados iniciar sesión mediante email y contraseña válidos. El sistema debe validar las credenciales contra la base de datos y establecer una sesión segura. | Alta | Todos |
| **RF-02** | **Registro de Usuarios** | El sistema debe permitir a nuevos usuarios registrarse proporcionando nombre completo, email y contraseña. El sistema debe validar que el email no esté registrado previamente y asignar automáticamente el rol de "Usuario" (Estudiante/Profesor). | Alta | Público |
| **RF-03** | **Gestión de Sesiones** | El sistema debe manejar sesiones de usuario activas durante toda la navegación, manteniendo al usuario autenticado hasta que decida cerrar sesión o la sesión expire por inactividad. | Alta | Todos |
| **RF-04** | **Cerrar Sesión** | El sistema debe permitir a los usuarios autenticados cerrar sesión de manera segura, invalidando la sesión actual y redirigiendo a la página de login. | Alta | Todos |
| **RF-05** | **Crear Reporte** | El sistema debe permitir a los usuarios autenticados crear nuevos reportes de infraestructura, capturando: ubicación del problema, descripción detallada, nivel de prioridad (baja/media/alta) y foto opcional. | Alta | Usuario |
| **RF-06** | **Listar Reportes** | El sistema debe mostrar un listado de reportes en formato de tabla. Los administradores y personal de mantenimiento ven todos los reportes; los usuarios solo ven sus propios reportes. | Alta | Todos |
| **RF-07** | **Ver Detalle de Reporte** | El sistema debe mostrar la información completa de un reporte específico cuando un usuario selecciona un elemento del listado, incluyendo estado actual, prioridad, ubicación, descripción, foto y fechas. | Alta | Todos |
| **RF-08** | **Cambiar Estado del Ticket** | El sistema debe permitir al personal autorizado (Admin y Mantenimiento) cambiar el estado de un reporte a través del flujo: Pendiente → En Proceso → Resuelto. Cada cambio debe quedar registrado en la base de datos. | Alta | Admin/Mant. |
| **RF-09** | **Cambiar Prioridad del Ticket** | El sistema debe permitir al personal autorizado (Admin y Mantenimiento) modificar el nivel de prioridad de un reporte (baja, media, alta) según la urgencia de la incidencia. | Media | Admin/Mant. |
| **RF-10** | **Eliminar Reporte** | El sistema debe permitir únicamente al Administrador eliminar reportes del sistema de manera permanente. Esta acción no debe ser reversible. | Media | Admin |
| **RF-11** | **Consultar Historial** | El sistema debe proporcionar una vista de historial que permita a los usuarios consultar todos sus reportes anteriores con capacidad de filtrado por estado, prioridad y rango de fechas. | Media | Usuario |
| **RF-12** | **Buscar Reportes** | El sistema debe permitir buscar reportes mediante texto libre, filtrando por coincidencias en los campos de ubicación y descripción. | Media | Todos |
| **RF-13** | **Filtrar por Estado** | El sistema debe permitir filtrar el listado de reportes mostrando únicamente aquellos que se encuentren en un estado específico (Pendiente, En Proceso, Resuelto). | Media | Todos |
| **RF-14** | **Filtrar por Prioridad** | El sistema debe permitir filtrar el listado de reportes mostrando únicamente aquellos que tengan una prioridad específica (Baja, Media, Alta). | Baja | Todos |
| **RF-15** | **Control de Roles** | El sistema debe diferenciar entre tres tipos de usuarios (Administrador, Mantenimiento, Estudiante/Profesor) y restringir el acceso a funcionalidades según el rol del usuario autenticado. | Alta | Sistema |
| **RF-16** | **Validación de Formularios** | El sistema debe validar todos los datos ingresados en los formularios del lado del servidor, rechazando información incompleta o inválida y mostrando mensajes de error descriptivos. | Alta | Sistema |
| **RF-17** | **Notificaciones de Nuevo Reporte** | El sistema debe generar notificaciones automáticas para administradores y personal de mantenimiento cuando se cree un nuevo reporte. | Media | Sistema |
| **RF-18** | **Notificaciones de Actualización** | El sistema debe generar notificaciones automáticas para el usuario dueño del reporte cuando el estado o prioridad de su ticket sea actualizado. | Media | Sistema |
| **RF-19** | **Dashboard por Rol** | El sistema debe mostrar un panel de control (dashboard) personalizado según el rol del usuario, presentando estadísticas y métricas relevantes para sus funciones. | Alta | Todos |
| **RF-20** | **Subida de Archivos** | El sistema debe permitir a los usuarios adjuntar una fotografía opcional al crear un reporte, almacenando el archivo en el servidor y asociándolo al ticket. | Media | Usuario |

## 7.1 Matriz de Trazabilidad de Requerimientos Funcionales

| RF | Módulo | Vista | Controlador | Modelo |
|----|--------|-------|-------------|--------|
| RF-01 | Autenticación | login.blade.php | AuthController | User |
| RF-02 | Autenticación | register.blade.php | AuthController | User |
| RF-03 | Sesiones | - | AuthController | - |
| RF-04 | Sesiones | - | AuthController | - |
| RF-05 | Reportes | create.blade.php | ReporteController | Ticket |
| RF-06 | Reportes | index.blade.php | ReporteController | Ticket |
| RF-07 | Reportes | show.blade.php | ReporteController | Ticket |
| RF-08 | Reportes | edit.blade.php | ReporteController | Ticket |
| RF-09 | Reportes | edit.blade.php | ReporteController | Ticket |
| RF-10 | Reportes | index.blade.php | ReporteController | Ticket |
| RF-11 | Reportes | historial.blade.php | ReporteController | Ticket |
| RF-12 | Reportes | index.blade.php | ReporteController | Ticket |
| RF-13 | Reportes | index.blade.php | ReporteController | Ticket |
| RF-14 | Reportes | index.blade.php | ReporteController | Ticket |
| RF-15 | Seguridad | - | CheckRole (Middleware) | User/Role |
| RF-16 | Validaciones | - | FormRequests | - |
| RF-17 | Notificaciones | - | NotificationController | Notification |
| RF-18 | Notificaciones | - | NotificationController | Notification |
| RF-19 | Dashboard | dashboard/*.blade.php | DashboardController | Ticket/User |
| RF-20 | Reportes | create.blade.php | ReporteController | Ticket |

---

# 8. REQUERIMIENTOS NO FUNCIONALES

Los requerimientos no funcionales especifican criterios de calidad, restricciones técnicas y estándares que el sistema debe cumplir. Estos requerimientos definen cómo debe comportarse el sistema más que qué funciones debe realizar.

| ID | Categoría | Requerimiento | Criterio de Medición |
|----|-----------|---------------|---------------------|
| **RNF-01** | **Arquitectura** | El sistema debe implementar el patrón de diseño Modelo-Vista-Controlador (MVC) separando claramente la lógica de negocio, la presentación y el control de flujo. | Separación visible de carpetas: app/Models/, resources/views/, app/Http/Controllers/ |
| **RNF-02** | **Tecnología** | El backend del sistema debe estar desarrollado en Laravel framework versión 12 o superior, aprovechando las características nativas del framework. | Verificación de versión en composer.json (laravel/framework: ^12.0) |
| **RNF-03** | **Base de Datos** | El sistema debe utilizar MySQL o MariaDB como sistema de gestión de base de datos relacional, con migraciones versionadas. | Verificación de configuración en .env (DB_CONNECTION=mysql) |
| **RNF-04** | **Validaciones** | Todas las validaciones de datos deben ejecutarse del lado del servidor utilizando Form Requests de Laravel, garantizando integridad incluso si se deshabilita JavaScript. | Todas las rutas POST/PUT tienen Form Request asociado |
| **RNF-05** | **Seguridad** | Las contraseñas de los usuarios deben almacenarse encriptadas utilizando el algoritmo de hash bcrypt, nunca en texto plano. | Verificación en BD: campo password contiene hash de 60 caracteres |
| **RNF-06** | **Rendimiento** | El tiempo de carga de las páginas principales del sistema no debe exceder los 3 segundos en condiciones normales de red y servidor. | Medición con herramientas como Chrome DevTools, GTmetrix |
| **RNF-07** | **Navegabilidad** | La interfaz de usuario debe ser intuitiva y fácil de navegar, permitiendo a los usuarios encontrar las funcionalidades principales sin necesidad de entrenamiento extensivo. | Testing con usuarios: 90% completa tareas sin ayuda |
| **RNF-08** | **Código** | El código fuente debe estar organizado, comentado y seguir los estándares PSR (PHP Standards Recommendations) de la comunidad PHP. | Revisión con PHP_CodeSniffer, Laravel Pint |
| **RNF-09** | **Disponibilidad** | El sistema debe estar disponible el 99% del tiempo durante el horario académico (6:00 AM - 10:00 PM), excluyendo mantenimiento programado. | Monitoreo de uptime con herramientas de logging |
| **RNF-10** | **Escalabilidad** | La arquitectura del sistema debe permitir la adición de nuevas funcionalidades sin requerir cambios mayores en la estructura existente. | Capacidad de agregar nuevos módulos sin modificar núcleo |
| **RNF-11** | **Compatibilidad** | El sistema debe ser compatible con los navegadores web modernos más utilizados: Chrome, Firefox, Edge y Safari en sus versiones recientes. | Pruebas cross-browser en 4 navegadores |
| **RNF-12** | **Responsive Design** | La interfaz del sistema debe adaptarse a diferentes tamaños de pantalla, funcionando correctamente en dispositivos de escritorio, tablets y móviles. | Pruebas en resoluciones: 1920x1080, 1366x768, 768x1024, 375x667 |
| **RNF-13** | **Manejo de Errores** | El sistema debe manejar errores de manera elegante, mostrando mensajes amigables al usuario y registrando los detalles técnicos en logs para depuración. | Verificación de archivos en storage/logs/laravel.log |
| **RNF-14** | **Consistencia** | La interfaz de usuario debe mantener consistencia visual en todas las vistas, utilizando la misma paleta de colores, tipografía y estilos de componentes. | Revisión de uso consistente de Tailwind CSS |
| **RNF-15** | **Accesibilidad** | El sistema debe seguir prácticas básicas de accesibilidad web, incluyendo etiquetas alt en imágenes, contraste adecuado de colores y navegación por teclado. | Verificación con herramientas de accesibilidad |
| **RNF-16** | **Mantenibilidad** | El código debe estar estructurado de manera que facilite su mantenimiento y comprensión por otros desarrolladores. | Complejidad ciclomática baja, funciones cortas (< 50 líneas) |
| **RNF-17** | **Portabilidad** | El sistema debe poder ser desplegado en diferentes entornos (desarrollo, pruebas, producción) mediante configuración de variables de entorno. | Uso correcto de archivo .env para configuraciones |
| **RNF-18** | **Integridad de Datos** | El sistema debe garantizar que las operaciones de base de datos se completen completamente o no se ejecuten en absoluto (atomicidad), previniendo estados inconsistentes. | Uso de transacciones de base de datos cuando aplique |

## 8.1 Detalle de Requerimientos No Funcionales Críticos

### RNF-01: Arquitectura MVC

**Descripción:** El sistema debe seguir estrictamente el patrón Modelo-Vista-Controlador, asegurando que:
- Los **Modelos** (app/Models/) manejen exclusivamente el acceso a datos y la lógica de negocio
- Las **Vistas** (resources/views/) se encarguen únicamente de la presentación
- Los **Controladores** (app/Http/Controllers/) gestionen el flujo de la aplicación

**Justificación:** Esta separación facilita el mantenimiento, permite el trabajo paralelo de desarrolladores y hace el código más testeable.

### RNF-05: Seguridad de Contraseñas

**Descripción:** Todas las contraseñas deben ser hasheadas antes de almacenarse en la base de datos utilizando bcrypt con un costo mínimo de 10. El sistema nunca debe:
- Almacenar contraseñas en texto plano
- Mostrar contraseñas en logs o mensajes de error
- Transmitir contraseñas sin encriptación HTTPS (en producción)

**Justificación:** Protege las credenciales de los usuarios en caso de compromiso de la base de datos.

### RNF-06: Rendimiento

**Descripción:** Las páginas del sistema deben cargar en menos de 3 segundos medidos desde el momento en que el usuario solicita la página hasta que se renderiza completamente. Esto incluye:
- Tiempo de respuesta del servidor: < 1 segundo
- Tiempo de carga de recursos (CSS, JS, imágenes): < 2 segundos

**Justificación:** Un rendimiento pobre afecta la experiencia del usuario y reduce la productividad.

---

# 9. CASOS DE USO DETALLADOS

Esta sección describe detalladamente los tres casos de uso principales del sistema, especificando actores, precondiciones, postcondiciones, flujos principales, flujos alternativos y excepciones.

## 9.1 CASO DE USO 1: Iniciar Sesión

| Campo | Descripción |
|-------|-------------|
| **ID del Caso de Uso** | CU-01 |
| **Nombre** | Iniciar Sesión |
| **Actor Principal** | Todos los usuarios (Administrador, Mantenimiento, Estudiante/Profesor) |
| **Actores Secundarios** | Sistema de autenticación, Base de datos |
| **Descripción** | Permite a un usuario registrado acceder al sistema mediante sus credenciales de email y contraseña, estableciendo una sesión segura para navegar por las funcionalidades autorizadas según su rol. |
| **Precondición** | 1. El usuario debe estar registrado en la base de datos del sistema<br>2. El usuario debe tener una cuenta activa<br>3. El usuario debe conocer sus credenciales (email y contraseña) |
| **Postcondición** | 1. El usuario queda autenticado en el sistema<br>2. Se establece una sesión activa<br>3. El usuario es redirigido al dashboard correspondiente a su rol<br>4. El sistema registra el acceso del usuario |

### Flujo Principal

| Paso | Acción del Actor | Respuesta del Sistema |
|------|------------------|----------------------|
| 1 | El usuario navega a la URL del sistema | El sistema muestra la página de inicio (landing page) |
| 2 | El usuario hace clic en el botón "Iniciar Sesión" | El sistema muestra el formulario de login con campos de email y contraseña |
| 3 | El usuario ingresa su email en el campo correspondiente | El sistema valida el formato del email en tiempo real (validación del lado del cliente) |
| 4 | El usuario ingresa su contraseña en el campo correspondiente | El sistema oculta los caracteres de la contraseña por seguridad |
| 5 | El usuario hace clic en el botón "Ingresar" | El sistema valida las credenciales del lado del servidor |
| 6 | El sistema verifica que el email exista en la base de datos | El sistema consulta la tabla `users` buscando el email proporcionado |
| 7 | El sistema verifica que la contraseña coincida con el hash almacenado | El sistema utiliza bcrypt para comparar la contraseña ingresada con el hash en BD |
| 8 | El sistema regenera el token de sesión por seguridad | El sistema crea una nueva sesión y destruye la anterior |
| 9 | El sistema determina el rol del usuario | El sistema consulta el `role_id` del usuario en la base de datos |
| 10 | El sistema redirige al usuario al dashboard correspondiente | El sistema muestra el panel de control según el rol (admin, mantenimiento o usuario) |

### Flujo Alternativo 1: Credenciales Incorrectas

| Paso | Acción | Descripción |
|------|--------|-------------|
| FA1-1 | El usuario ingresa email o contraseña incorrectos | Las credenciales no coinciden con ningún registro en la BD |
| FA1-2 | El sistema detecta la discrepancia | La validación del lado del servidor falla |
| FA1-3 | El sistema muestra mensaje de error | Se muestra: "Estas credenciales no coinciden con nuestros registros" |
| FA1-4 | El sistema mantiene los datos ingresados | El email se mantiene en el campo para facilitar la corrección |
| FA1-5 | El usuario corrige las credenciales | El usuario puede reintentar con las credenciales correctas |

### Flujo Alternativo 2: Recordar Sesión

| Paso | Acción | Descripción |
|------|--------|-------------|
| FA2-1 | El usuario marca el checkbox "Recordarme" | El usuario solicita que la sesión persista |
| FA2-2 | El sistema genera un token de recordatorio | Se crea un token único que se almacena en cookie y en BD |
| FA2-3 | El usuario cierra el navegador | La sesión se mantiene activa por el período configurado |
| FA2-4 | El usuario regresa al sistema | El sistema reconoce la cookie y restaura la sesión automáticamente |

### Excepciones

| ID | Excepción | Manejo |
|----|-----------|--------|
| EX-01 | **Usuario no existe** | El sistema muestra mensaje genérico de error (por seguridad no se especifica que el email no existe) |
| EX-02 | **Cuenta inactiva/eliminada** | El sistema muestra mensaje: "Su cuenta ha sido desactivada. Contacte al administrador" |
| EX-03 | **Base de datos no disponible** | El sistema muestra página de error 500 y registra el error en logs |
| EX-04 | **Token CSRF inválido** | El sistema rechaza la petición y muestra error de seguridad |
| EX-05 | **Demasiados intentos fallidos** | El sistema temporalmente bloquea nuevos intentos por 1 minuto (rate limiting) |

---

## 9.2 CASO DE USO 2: Crear Reporte de Incidencia

| Campo | Descripción |
|-------|-------------|
| **ID del Caso de Uso** | CU-02 |
| **Nombre** | Crear Reporte de Incidencia |
| **Actor Principal** | Estudiante/Profesor (Usuario) |
| **Actores Secundarios** | Administrador, Personal de Mantenimiento, Sistema de notificaciones |
| **Descripción** | Permite a un usuario autenticado crear un nuevo reporte de problema de infraestructura, proporcionando información detallada sobre la ubicación, descripción del problema, nivel de prioridad y evidencia fotográfica opcional. |
| **Precondición** | 1. El usuario debe estar autenticado en el sistema<br>2. El usuario debe tener un rol válido (Usuario, Mantenimiento o Admin)<br>3. El sistema de almacenamiento de archivos debe estar disponible |
| **Postcondición** | 1. El ticket es creado en la base de datos con estado "Pendiente"<br>2. La foto adjunta (si existe) es almacenada en el servidor<br>3. Se generan notificaciones para administradores y mantenimiento<br>4. El usuario es redirigido al listado de reportes |

### Flujo Principal

| Paso | Acción del Actor | Respuesta del Sistema |
|------|------------------|----------------------|
| 1 | El usuario autenticado navega a la sección de reportes | El sistema muestra el listado de reportes existentes |
| 2 | El usuario hace clic en el botón "Crear Nuevo Reporte" | El sistema muestra el formulario de creación de reporte |
| 3 | El usuario selecciona la ubicación del problema | El sistema valida que se haya seleccionado una ubicación válida |
| 4 | El usuario ingresa la descripción detallada del problema | El sistema valida que la descripción tenga al menos 10 caracteres |
| 5 | El usuario selecciona el nivel de prioridad (baja, media, alta) | El sistema registra la prioridad seleccionada (default: media) |
| 6 | El usuario opcionalmente selecciona una fotografía | El sistema valida que el archivo sea una imagen (jpg, png, gif) y menor a 5MB |
| 7 | El usuario hace clic en el botón "Guardar Reporte" | El sistema procesa el formulario |
| 8 | El sistema valida todos los campos del lado del servidor | El FormRequest (StoreReporteRequest) ejecuta las reglas de validación |
| 9 | El sistema genera una ruta única para la fotografía | El archivo es movido al directorio storage/app/public/reportes/ |
| 10 | El sistema crea un nuevo registro en la tabla `tickets` | Se inserta el ticket con estado "Pendiente" y prioridad seleccionada |
| 11 | El sistema genera notificaciones para admins y mantenimiento | Se crean registros en la tabla `notifications` para usuarios relevantes |
| 12 | El sistema muestra mensaje de éxito | Se muestra: "Reporte creado exitosamente" |
| 13 | El sistema redirige al usuario al listado de reportes | El usuario puede ver su nuevo reporte en la lista |

### Flujo Alternativo 1: Campos Vacíos o Inválidos

| Paso | Acción | Descripción |
|------|--------|-------------|
| FA1-1 | El usuario deja campos obligatorios vacíos | Ubicación o descripción están ausentes |
| FA1-2 | El usuario ingresa descripción muy corta | Menos de 10 caracteres |
| FA1-3 | El sistema detecta los errores de validación | El FormRequest rechaza la petición |
| FA1-4 | El sistema muestra mensajes de error específicos | Se resaltan los campos con error y se muestra mensaje descriptivo |
| FA1-5 | El usuario corrige los errores | El usuario completa los campos correctamente |
| FA1-6 | El usuario reenvía el formulario | El sistema procesa exitosamente |

### Flujo Alternativo 2: Error al Subir Fotografía

| Paso | Acción | Descripción |
|------|--------|-------------|
| FA2-1 | El usuario selecciona un archivo no válido | Archivo que no es imagen o excede 5MB |
| FA2-2 | El sistema detecta el archivo inválido | La validación del FormRequest falla |
| FA2-3 | El sistema muestra mensaje de error | "La fotografía debe ser una imagen (jpg, png, gif) menor a 5MB" |
| FA2-4 | El usuario puede continuar sin foto | El campo de fotografía es opcional |
| FA2-5 | El sistema guarda el reporte sin foto | El campo `photo_path` queda como NULL en la BD |

### Excepciones

| ID | Excepción | Manejo |
|----|-----------|--------|
| EX-01 | **Sesión expirada** | El sistema redirige al login con mensaje: "Su sesión ha expirado. Por favor inicie sesión nuevamente" |
| EX-02 | **Error de base de datos** | El sistema muestra error 500, registra el error en logs y notifica al administrador |
| EX-03 | **Espacio de almacenamiento lleno** | El sistema muestra error: "No hay espacio disponible para subir archivos" |
| EX-04 | **Token CSRF inválido** | El sistema rechaza la petición por seguridad |
| EX-05 | **Timeout del servidor** | El sistema muestra mensaje de error y sugiere reintentar |

---

## 9.3 CASO DE USO 3: Gestionar Estado del Ticket

| Campo | Descripción |
|-------|-------------|
| **ID del Caso de Uso** | CU-03 |
| **Nombre** | Gestionar Estado del Ticket |
| **Actor Principal** | Personal de Mantenimiento / Administrador |
| **Actores Secundarios** | Usuario dueño del reporte, Sistema de notificaciones |
| **Descripción** | Permite al personal autorizado (Administrador o Mantenimiento) actualizar el estado de un reporte de infraestructura, avanzándolo a través del flujo: Pendiente → En Proceso → Resuelto, notificando automáticamente al usuario dueño del cambio realizado. |
| **Precondición** | 1. El usuario debe estar autenticado como Admin o Mantenimiento<br>2. El ticket debe existir en la base de datos<br>3. El ticket debe estar en un estado que permita la transición |
| **Postcondición** | 1. El estado del ticket es actualizado en la base de datos<br>2. Se registra la fecha y hora del cambio (updated_at)<br>3. Se genera notificación para el usuario dueño del reporte<br>4. El historial del ticket refleja el cambio |

### Flujo Principal

| Paso | Acción del Actor | Respuesta del Sistema |
|------|------------------|----------------------|
| 1 | El usuario autenticado (Admin/Mant.) navega a la lista de reportes | El sistema muestra todos los reportes con sus estados actuales |
| 2 | El usuario identifica un ticket que requiere actualización | El usuario selecciona un ticket en estado "Pendiente" o "En Proceso" |
| 3 | El usuario hace clic en el ticket para ver el detalle | El sistema muestra la vista de detalle con información completa |
| 4 | El usuario hace clic en el botón "Editar" | El sistema muestra el formulario de edición (solo campos editables) |
| 5 | El usuario selecciona el nuevo estado del dropdown | Opciones disponibles según estado actual: Pendiente→En Proceso, En Proceso→Resuelto |
| 6 | El usuario opcionalmente cambia la prioridad | El usuario puede ajustar la prioridad según urgencia |
| 7 | El usuario hace clic en "Guardar Cambios" | El sistema procesa la actualización |
| 8 | El sistema valida que el usuario tenga permisos | El middleware CheckRole verifica que sea Admin o Mantenimiento |
| 9 | El sistema valida que la transición de estado sea válida | Se asegura que el flujo sea lógico (no se puede saltar estados) |
| 10 | El sistema actualiza el registro en la tabla `tickets` | El campo `status` es actualizado y `updated_at` se refresca |
| 11 | El sistema genera notificación para el usuario dueño | Se crea registro en `notifications` informando del cambio |
| 12 | El sistema muestra mensaje de éxito | "Estado del reporte actualizado exitosamente" |
| 13 | El sistema redirige al listado de reportes | El usuario ve la lista actualizada con el nuevo estado |

### Flujo Alternativo 1: Estado Inválido

| Paso | Acción | Descripción |
|------|--------|-------------|
| FA1-1 | El usuario intenta seleccionar un estado inválido | Ejemplo: cambiar de "Pendiente" directamente a "Resuelto" |
| FA1-2 | El sistema detecta la transición inválida | La validación del lado del servidor rechaza el cambio |
| FA1-3 | El sistema muestra mensaje de advertencia | "Debe cambiar el estado a 'En Proceso' antes de marcar como 'Resuelto'" |
| FA1-4 | El usuario selecciona el estado correcto | El usuario sigue el flujo apropiado |
| FA1-5 | El sistema procesa el cambio válido | La actualización se completa exitosamente |

### Flujo Alternativo 2: Permiso Insuficiente

| Paso | Acción | Descripción |
|------|--------|-------------|
| FA2-1 | Un usuario con rol "Usuario" intenta editar un ticket | El usuario no tiene permisos de Admin o Mantenimiento |
| FA2-2 | El sistema verifica los permisos | El middleware CheckRole detecta que el rol no tiene acceso |
| FA2-3 | El sistema deniega el acceso | Se muestra error 403 "Acceso no autorizado" |
| FA2-4 | El sistema registra el intento | Se logea el intento de acceso no autorizado |
| FA2-5 | El usuario es redirigido | El usuario regresa a la vista de detalle (solo lectura) |

### Excepciones

| ID | Excepción | Manejo |
|----|-----------|--------|
| EX-01 | **Permiso insuficiente** | El sistema muestra error 403 y registra el intento |
| EX-02 | **Ticket no existe** | El sistema muestra error 404 "Ticket no encontrado" |
| EX-03 | **Error de base de datos** | El sistema muestra error 500 y registra el error |
| EX-04 | **Sesión expirada** | El sistema redirige al login |
| EX-05 | **Token CSRF inválido** | El sistema rechaza la petición por seguridad |
| EX-06 | **Usuario dueño eliminado** | La notificación no se genera, pero el cambio se guarda |

---

# 10. DIAGRAMAS DEL SISTEMA

Esta sección presenta los cuatro diagramas principales que describen la arquitectura y funcionamiento del sistema. Cada diagrama incluye una descripción detallada y explicación de sus elementos.

## 10.1 Diagrama de Contexto

### Descripción

El Diagrama de Contexto muestra el sistema central y su relación con los actores externos que interactúan con él. Este diagrama de alto nivel proporciona una visión general de cómo el Sistema de Reporte de Problemas de Infraestructura se integra en su entorno operativo.

### Elementos del Diagrama

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| **Sistema de Reportes** | Proceso Central | Aplicación web desarrollada en Laravel que gestiona los reportes de infraestructura |
| **Estudiante/Profesor** | Actor Externo | Usuario que reporta problemas de infraestructura |
| **Personal de Mantenimiento** | Actor Externo | Usuario que atiende y actualiza los reportes |
| **Administrador** | Actor Externo | Usuario con acceso completo al sistema |
| **Base de Datos MySQL** | Almacén de Datos | Repositorio donde se almacenan usuarios, tickets y notificaciones |
| **Sistema de Archivos** | Almacén de Datos | Directorio donde se guardan las fotografías adjuntas |

### Flujo de Información

1. **Estudiante/Profesor → Sistema**: Envía reportes de incidencias con descripción y fotos
2. **Sistema → Estudiante/Profesor**: Muestra confirmaciones, estados y notificaciones
3. **Personal de Mantenimiento → Sistema**: Consulta reportes y actualiza estados
4. **Sistema → Personal de Mantenimiento**: Muestra listados, estadísticas y alertas
5. **Administrador → Sistema**: Gestiona usuarios, reportes y configuración
6. **Sistema → Administrador**: Muestra dashboard completo y métricas
7. **Sistema ↔ Base de Datos**: Operaciones CRUD de todos los datos
8. **Sistema ↔ Sistema de Archivos**: Almacenamiento y recuperación de fotografías

*[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE CONTEXTO]*

### Explicación Detallada

El Diagrama de Contexto representa el Sistema de Reporte de Problemas de Infraestructura como un proceso central (generalmente representado como un círculo o rectángulo en el centro del diagrama) que interactúa con tres actores externos principales: Estudiante/Profesor, Personal de Mantenimiento y Administrador. Cada actor está representado como una figura humana o rectángulo etiquetado, posicionado alrededor del sistema central.

Las flechas bidireccionales conectan cada actor con el sistema, indicando el flujo de información en ambas direcciones. El Estudiante/Profesor envía reportes al sistema y recibe confirmaciones y actualizaciones de estado. El Personal de Mantenimiento consulta los reportes entrantes y actualiza los estados, recibiendo a cambio alertas de nuevos reportes. El Administrador tiene interacción completa con el sistema, gestionando todos los aspectos operativos.

Adicionalmente, el sistema se conecta con dos almacenes de datos: la Base de Datos MySQL (representada como un cilindro) que almacena toda la información estructurada (usuarios, roles, tickets, notificaciones), y el Sistema de Archivos (representado como un rectángulo abierto) donde se guardan las fotografías adjuntas a los reportes.

Este diagrama es útil para comprender los límites del sistema y las entidades externas con las que interactúa, proporcionando una visión clara del alcance del proyecto desde una perspectiva de integración.

---

## 10.2 Diagrama de Casos de Uso

### Descripción

El Diagrama de Casos de Uso muestra las funcionalidades del sistema (casos de uso) y cómo los diferentes actores interactúan con ellas. Este diagrama es fundamental para comprender qué hace el sistema desde la perspectiva del usuario.

### Elementos del Diagrama

| Elemento | Símbolo | Descripción |
|----------|---------|-------------|
| **Actores** | Figuras humanas | Representan los roles: Administrador, Mantenimiento, Estudiante/Profesor |
| **Casos de Uso** | Elipses | Representan las funcionalidades: Iniciar Sesión, Crear Reporte, Gestionar Estado, etc. |
| **Relaciones** | Líneas | Conectan actores con los casos de uso que pueden ejecutar |
| **Sistema** | Rectángulo | Delimita el boundary del sistema (casos de uso dentro, actores fuera) |

### Casos de Uso Identificados

| ID | Caso de Uso | Actores |
|----|-------------|---------|
| CU-01 | Iniciar Sesión | Todos los actores |
| CU-02 | Crear Reporte | Estudiante/Profesor, Mantenimiento, Admin |
| CU-03 | Gestionar Estado | Mantenimiento, Admin |
| CU-04 | Listar Reportes | Todos los actores |
| CU-05 | Consultar Historial | Estudiante/Profesor, Admin |
| CU-06 | Eliminar Reporte | Admin |
| CU-07 | Gestionar Usuarios | Admin |
| CU-08 | Ver Estadísticas | Admin, Mantenimiento |

*[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE CASOS DE USO]*

### Explicación Detallada

El Diagrama de Casos de Uso representa gráficamente las funcionalidades del sistema mediante elipses (óvalos) que contienen el nombre de cada caso de uso. Los tres actores del sistema (Administrador, Personal de Mantenimiento y Estudiante/Profesor) se representan como figuras humanas (stick figures) posicionadas alrededor del rectángulo que delimita el sistema.

Las líneas sólidas conectan cada actor con los casos de uso que puede ejecutar. El Administrador, al tener acceso completo, tiene conexiones con todos los casos de uso del sistema. El Personal de Mantenimiento tiene conexiones con la mayoría de los casos de uso, excepto aquellos exclusivos de administración como "Gestionar Usuarios" y "Eliminar Reporte". El Estudiante/Profesor tiene conexiones limitadas principalmente a "Iniciar Sesión", "Crear Reporte", "Listar Reportes Propios" y "Consultar Historial".

El diagrama puede incluir relaciones entre casos de uso, como:
- **Include (<<include>>)**: Cuando un caso de uso siempre incluye otro (ej: "Crear Reporte" <<include>> "Iniciar Sesión")
- **Extend (<<extend>>)**: Cuando un caso de uso puede extender otro bajo ciertas condiciones (ej: "Subir Fotografía" <<extend>> "Crear Reporte")

Este diagrama es esencial para comprender el alcance funcional del sistema y sirve como base para la identificación de requerimientos y la planificación de pruebas.

---

## 10.3 Diagrama de Clases

### Descripción

El Diagrama de Clases muestra la estructura estática del sistema desde la perspectiva de la implementación en código, representando las clases principales, sus atributos, métodos y las relaciones entre ellas.

### Elementos del Diagrama

| Elemento | Descripción |
|----------|-------------|
| **Clases del Modelo** | User, Role, Ticket, Notification |
| **Clases de Controlador** | AuthController, DashboardController, ReporteController, NotificationController |
| **Clases de Middleware** | CheckRole, Authenticate |
| **Clases de FormRequest** | LoginUserRequest, RegisterUserRequest, StoreReporteRequest, UpdateReporteRequest |
| **Enums** | TicketStatus, TicketPriority |

### Relaciones entre Clases

| Relación | Tipo | Descripción |
|----------|------|-------------|
| User → Role | Many-to-One | Muchos usuarios pertenecen a un rol |
| User → Ticket | One-to-Many | Un usuario tiene muchos tickets |
| User → Notification | One-to-Many (Polimórfica) | Un usuario tiene muchas notificaciones |
| Ticket → User | Many-to-One | Un ticket pertenece a un usuario |
| Controllers → Models | Dependencia | Los controladores usan los modelos |
| Middleware → Controllers | Decorador | El middleware envuelve a los controladores |

*[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE CLASES]*

### Explicación Detallada

El Diagrama de Clases representa la estructura del código fuente del sistema siguiendo el patrón MVC. Cada clase se representa como un rectángulo dividido en tres secciones: nombre de la clase (en negrita), atributos (propiedades) y métodos (funciones).

**Clases del Modelo (app/Models/):**

- **User**: Representa a los usuarios del sistema. Atributos: id, name, email, password, role_id, timestamps. Métodos: role(), tickets(), notifications(), isAdmin(), isMaintenance(), isUser().

- **Role**: Representa los roles del sistema. Atributos: id, name, timestamps. Métodos: users().

- **Ticket**: Representa los reportes de incidencias. Atributos: id, user_id, location, description, priority, status, photo_path, timestamps. Métodos: user(), isPending(), isInProgress(), isResolved(), accessors para labels y colores.

- **Notification**: Clase nativa de Laravel para notificaciones. Atributos: id, notifiable_type, notifiable_id, type, data, read_at, timestamps.

**Clases de Controlador (app/Http/Controllers/):**

- **AuthController**: Maneja login, registro y logout. Métodos: showLogin(), login(), showRegister(), register(), logout(), getDashboardByRole().

- **DashboardController**: Muestra dashboards por rol. Métodos: admin(), mantenimiento(), usuario().

- **ReporteController**: Gestiona CRUD de reportes. Métodos: index(), create(), store(), show(), edit(), update(), destroy(), historial().

- **NotificationController**: Gestiona notificaciones. Métodos: index(), markAsRead(), markAllAsRead(), destroy(), deleteRead().

**Enums (PHP 8.2+):**

- **TicketStatus**: Define los estados posibles (pendiente, en_proceso, resuelto)
- **TicketPriority**: Define las prioridades posibles (baja, media, alta)

Las relaciones se representan con líneas que conectan las clases, utilizando notación UML:
- Línea sólida con rombo: composición/agregación
- Línea sólida con flecha: dependencia/direccionalidad
- Línea sólida simple: asociación
- Números (1, *, 0..1): cardinalidad

Este diagrama es fundamental para desarrolladores que necesiten comprender la estructura del código y las relaciones entre las diferentes componentes del sistema.

---

## 10.4 Diagrama Entidad-Relación (DER)

### Descripción

El Diagrama Entidad-Relación (DER) muestra la estructura de la base de datos del sistema, representando las tablas (entidades), sus campos (atributos) y las relaciones entre ellas.

### Elementos del Diagrama

| Elemento | Símbolo | Descripción |
|----------|---------|-------------|
| **Entidades** | Rectángulos | Representan las tablas: users, roles, tickets, notifications |
| **Atributos** | Óvalos/Lista | Representan los campos de cada tabla |
| **Claves Primarias** | Subrayado/PK | Identificadores únicos de cada entidad |
| **Claves Foráneas** | FK | Referencias a otras tablas |
| **Relaciones** | Líneas/Diamantes | Conectan entidades relacionadas |

### Estructura de Tablas

#### Tabla: roles

| Campo | Tipo | PK/FK | Descripción |
|-------|------|-------|-------------|
| id | BIGINT | PK | Identificador único autoincremental |
| name | VARCHAR(50) | | Nombre del rol (admin, mantenimiento, usuario) |
| created_at | TIMESTAMP | | Fecha de creación del registro |
| updated_at | TIMESTAMP | | Fecha de última actualización |

#### Tabla: users

| Campo | Tipo | PK/FK | Descripción |
|-------|------|-------|-------------|
| id | BIGINT | PK | Identificador único autoincremental |
| name | VARCHAR(100) | | Nombre completo del usuario |
| email | VARCHAR(100) | UNIQUE | Correo electrónico (usado para login) |
| email_verified_at | TIMESTAMP | NULL | Fecha de verificación de email |
| password | VARCHAR(255) | | Contraseña encriptada con bcrypt |
| role_id | BIGINT | FK → roles.id | Referencia al rol del usuario |
| remember_token | VARCHAR(100) | NULL | Token para "recordar sesión" |
| created_at | TIMESTAMP | | Fecha de registro del usuario |
| updated_at | TIMESTAMP | | Fecha de última actualización |

#### Tabla: tickets

| Campo | Tipo | PK/FK | Descripción |
|-------|------|-------|-------------|
| id | BIGINT | PK | Identificador único autoincremental |
| user_id | BIGINT | FK → users.id | Usuario que creó el reporte |
| location | VARCHAR(150) | | Ubicación física del problema |
| description | TEXT | | Descripción detallada del problema |
| priority | ENUM | | Prioridad: 'baja', 'media', 'alta' (default: 'media') |
| status | ENUM | | Estado: 'pendiente', 'en_proceso', 'resuelto' (default: 'pendiente') |
| photo_path | VARCHAR(255) | NULL | Ruta de la fotografía adjunta |
| created_at | TIMESTAMP | | Fecha de creación del reporte |
| updated_at | TIMESTAMP | | Fecha de última actualización |

#### Tabla: notifications

| Campo | Tipo | PK/FK | Descripción |
|-------|------|-------|-------------|
| id | UUID | PK | Identificador único UUID |
| notifiable_type | VARCHAR | | Tipo de modelo (relación polimórfica) |
| notifiable_id | BIGINT | | ID del modelo notificado |
| type | VARCHAR | | Clase de la notificación |
| data | JSON | | Datos de la notificación en formato JSON |
| read_at | TIMESTAMP | NULL | Fecha de lectura de la notificación |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Fecha de actualización |

### Relaciones y Cardinalidad

| Relación | Cardinalidad | Descripción |
|----------|--------------|-------------|
| roles → users | 1:N | Un rol tiene muchos usuarios |
| users → role | N:1 | Muchos usuarios pertenecen a un rol |
| users → tickets | 1:N | Un usuario tiene muchos tickets |
| tickets → users | N:1 | Muchos tickets pertenecen a un usuario |
| users → notifications | 1:N | Un usuario tiene muchas notificaciones |

*[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA ENTIDAD-RELACIÓN]*

### Explicación Detallada

El Diagrama Entidad-Relación representa gráficamente la estructura de la base de datos del sistema. Cada tabla se representa como un rectángulo que contiene el nombre de la tabla en la parte superior y la lista de campos debajo. Las claves primarias (PK) se marcan explícitamente y las claves foráneas (FK) se indican con referencias a las tablas relacionadas.

La relación entre **roles** y **users** es de uno a muchos (1:N), indicando que un rol puede estar asociado con múltiples usuarios, pero cada usuario tiene exactamente un rol. Esta relación se implementa mediante la clave foránea `role_id` en la tabla `users` que referencia al `id` de la tabla `roles`.

La relación entre **users** y **tickets** también es de uno a muchos (1:N), donde un usuario puede crear múltiples tickets, pero cada ticket pertenece a exactamente un usuario. La clave foránea `user_id` en la tabla `tickets` establece esta relación con eliminación en cascada (ON DELETE CASCADE), lo que significa que si un usuario es eliminado, todos sus tickets también se eliminan automáticamente.

La tabla **notifications** utiliza una relación polimórfica, permitiendo que las notificaciones se asocien con diferentes tipos de modelos (no solo usuarios). Esto se logra mediante los campos `notifiable_type` (que indica el tipo de modelo) y `notifiable_id` (que indica el ID del registro).

Los campos `created_at` y `updated_at` (timestamps) están presentes en todas las tablas principales, siguiendo la convención de Laravel para rastrear automáticamente las fechas de creación y modificación de cada registro.

Este diagrama es esencial para comprender cómo se organizan los datos en el sistema y sirve como referencia para desarrolladores que necesiten escribir consultas SQL o entender las dependencias entre tablas.

---

# 11. MODELO DE DATOS

Esta sección presenta el diccionario de datos completo del sistema, especificando todas las tablas de la base de datos, sus campos, tipos de datos, restricciones y relaciones.

## 11.1 Tabla: roles

**Descripción:** Almacena los diferentes roles disponibles en el sistema. Los roles determinan los permisos y funcionalidades accesibles para cada usuario.

| Campo | Tipo de Dato | PK/FK | Nullable | Default | Descripción |
|-------|--------------|-------|----------|---------|-------------|
| id | BIGINT UNSIGNED | PK | NO | AUTO_INCREMENT | Identificador único autoincremental del rol |
| name | VARCHAR(50) | | NO | | Nombre del rol. Valores válidos: 'admin', 'mantenimiento', 'usuario' |
| created_at | TIMESTAMP | | YES | NULL | Fecha y hora de creación del registro |
| updated_at | TIMESTAMP | | YES | NULL | Fecha y hora de la última actualización del registro |

### Datos Iniciales (Seeders)

| id | name | created_at | updated_at |
|----|------|------------|------------|
| 1 | admin | [fecha] | [fecha] |
| 2 | mantenimiento | [fecha] | [fecha] |
| 3 | usuario | [fecha] | [fecha] |

### Relaciones

| Tabla Relacionada | Tipo | Campo Origen | Campo Destino | Cardinalidad |
|-------------------|------|--------------|---------------|--------------|
| users | One-to-Many | id | role_id | 1:N |

### Restricciones

- **PRIMARY KEY (id)**: Clave primaria única
- **UNIQUE (name)**: El nombre del rol debe ser único

---

## 11.2 Tabla: users

**Descripción:** Almacena la información de todos los usuarios del sistema, incluyendo datos personales, credenciales de autenticación y rol asignado.

| Campo | Tipo de Dato | PK/FK | Nullable | Default | Descripción |
|-------|--------------|-------|----------|---------|-------------|
| id | BIGINT UNSIGNED | PK | NO | AUTO_INCREMENT | Identificador único autoincremental del usuario |
| name | VARCHAR(100) | | NO | | Nombre completo del usuario |
| email | VARCHAR(100) | | NO | | Dirección de correo electrónico (usada para login) |
| email_verified_at | TIMESTAMP | | YES | NULL | Fecha en que el usuario verificó su email (no utilizado actualmente) |
| password | VARCHAR(255) | | NO | | Contraseña encriptada con bcrypt (60 caracteres) |
| role_id | BIGINT UNSIGNED | FK | NO | 3 | Referencia al rol del usuario. Default: 3 (usuario) |
| remember_token | VARCHAR(100) | | YES | NULL | Token para funcionalidad "Recordarme" |
| created_at | TIMESTAMP | | YES | NULL | Fecha y hora de registro del usuario |
| updated_at | TIMESTAMP | | YES | NULL | Fecha y hora de la última actualización |

### Relaciones

| Tabla Relacionada | Tipo | Campo Origen | Campo Destino | Cardinalidad | onDelete |
|-------------------|------|--------------|---------------|--------------|----------|
| roles | Many-to-One | role_id | id | N:1 | RESTRICT |
| tickets | One-to-Many | id | user_id | 1:N | CASCADE |
| notifications | One-to-Many (Polimórfica) | id | notifiable_id | 1:N | CASCADE |

### Índices

- **PRIMARY KEY (id)**: Clave primaria
- **UNIQUE (email)**: El email debe ser único entre todos los usuarios
- **INDEX (role_id)**: Índice para optimizar búsquedas por rol

### Ejemplo de Datos

| id | name | email | password | role_id | created_at |
|----|------|-------|----------|---------|------------|
| 1 | Admin | admin@itsc.edu.do | $2y$10$... | 1 | 2026-03-01 |
| 2 | Mantenimiento | mant@itsc.edu.do | $2y$10$... | 2 | 2026-03-01 |
| 3 | Juan Pérez | juan@itsc.edu.do | $2y$10$... | 3 | 2026-03-15 |

---

## 11.3 Tabla: tickets

**Descripción:** Almacena todos los reportes de problemas de infraestructura creados por los usuarios, incluyendo información detallada sobre la ubicación, descripción, estado y prioridad de cada incidencia.

| Campo | Tipo de Dato | PK/FK | Nullable | Default | Descripción |
|-------|--------------|-------|----------|---------|-------------|
| id | BIGINT UNSIGNED | PK | NO | AUTO_INCREMENT | Identificador único autoincremental del ticket |
| user_id | BIGINT UNSIGNED | FK | NO | | Referencia al usuario que creó el reporte |
| location | VARCHAR(150) | | NO | | Ubicación física donde se encuentra el problema (ej: "Aula 101, Edificio A") |
| description | TEXT | | NO | | Descripción detallada del problema reportado |
| priority | ENUM('baja','media','alta') | | NO | 'media' | Nivel de prioridad del reporte |
| status | ENUM('pendiente','en_proceso','resuelto') | | NO | 'pendiente' | Estado actual del ticket |
| photo_path | VARCHAR(255) | | YES | NULL | Ruta relativa de la fotografía adjunta |
| created_at | TIMESTAMP | | YES | NULL | Fecha y hora de creación del reporte |
| updated_at | TIMESTAMP | | YES | NULL | Fecha y hora de la última actualización |

### Relaciones

| Tabla Relacionada | Tipo | Campo Origen | Campo Destino | Cardinalidad | onDelete |
|-------------------|------|--------------|---------------|--------------|----------|
| users | Many-to-One | user_id | id | N:1 | CASCADE |

### Índices

- **PRIMARY KEY (id)**: Clave primaria
- **INDEX (user_id)**: Índice para optimizar búsquedas por usuario
- **INDEX (status)**: Índice para optimizar filtrado por estado
- **INDEX (priority)**: Índice para optimizar filtrado por prioridad
- **INDEX (created_at)**: Índice para optimizar ordenamiento por fecha

### Valores ENUM

**priority:**
- 'baja' - Problema no urgente, puede esperar
- 'media' - Problema de importancia moderada (default)
- 'alta' - Problema urgente que requiere atención inmediata

**status:**
- 'pendiente' - Reporte creado, awaiting atención (default)
- 'en_proceso' - El personal de mantenimiento está trabajando en ello
- 'resuelto' - El problema ha sido solucionado

### Ejemplo de Datos

| id | user_id | location | description | priority | status | photo_path | created_at |
|----|---------|----------|-------------|----------|--------|------------|------------|
| 1 | 3 | Aula 201 | Fuga de agua en el techo | alta | pendiente | reportes/foto1.jpg | 2026-03-20 |
| 2 | 3 | Laboratorio 3 | Computadora no enciende | media | en_proceso | NULL | 2026-03-21 |
| 3 | 4 | Biblioteca | Silla rota | baja | resuelto | reportes/foto3.jpg | 2026-03-18 |

---

## 11.4 Tabla: notifications

**Descripción:** Almacena las notificaciones del sistema utilizando el sistema nativo de notificaciones de Laravel. Permite notificaciones polimórficas (puede asociarse con diferentes tipos de modelos).

| Campo | Tipo de Dato | PK/FK | Nullable | Default | Descripción |
|-------|--------------|-------|----------|---------|-------------|
| id | CHAR(36) | PK | NO | UUID | Identificador único UUID de la notificación |
| notifiable_type | VARCHAR(100) | | NO | | Tipo de modelo (ej: "App\\Models\\User") |
| notifiable_id | BIGINT UNSIGNED | | NO | | ID del modelo notificado |
| type | VARCHAR(100) | | NO | | Clase de la notificación (ej: "App\\Notifications\\NuevoReporteNotification") |
| data | JSON | | NO | | Datos de la notificación en formato JSON |
| read_at | TIMESTAMP | | YES | NULL | Fecha y hora en que se leyó la notificación |
| created_at | TIMESTAMP | | YES | NULL | Fecha y hora de creación |
| updated_at | TIMESTAMP | | YES | NULL | Fecha y hora de actualización |

### Relaciones

| Tabla Relacionada | Tipo | Campo Origen | Campo Destino | Cardinalidad |
|-------------------|------|--------------|---------------|--------------|
| users | Polimórfica | notifiable_id | id | N:1 |

### Índices

- **PRIMARY KEY (id)**: Clave primaria UUID
- **INDEX (notifiable_type, notifiable_id)**: Índice compuesto para búsquedas polimórficas
- **INDEX (read_at)**: Índice para filtrar notificaciones leídas/no leídas

### Ejemplo de Datos

| id | notifiable_type | notifiable_id | type | data | read_at | created_at |
|----|-----------------|---------------|------|------|---------|------------|
| uuid-1 | App\Models\User | 1 | App\Notifications\NuevoReporteNotification | {"ticket_id":5,"message":"Nuevo reporte creado"} | NULL | 2026-03-25 |
| uuid-2 | App\Models\User | 3 | App\Notifications\ReporteActualizadoNotification | {"ticket_id":3,"status":"resuelto"} | 2026-03-26 | 2026-03-25 |

---

## 11.5 Tabla: cache

**Descripción:** Almacena datos en caché para mejorar el rendimiento del sistema. Utilizada por el sistema de caché de Laravel.

| Campo | Tipo de Dato | PK/FK | Nullable | Descripción |
|-------|--------------|-------|----------|-------------|
| key | VARCHAR(255) | PK | NO | Clave única del elemento en caché |
| value | MEDIUMTEXT | | NO | Datos almacenados en caché (serializados) |
| expiration | INT | | NO | Timestamp de expiración del caché |

---

## 11.6 Tabla: sessions

**Descripción:** Almacena las sesiones activas de los usuarios. Utilizada por el sistema de sesiones de Laravel.

| Campo | Tipo de Dato | PK/FK | Nullable | Descripción |
|-------|--------------|-------|----------|-------------|
| id | VARCHAR(255) | PK | NO | Identificador único de la sesión |
| user_id | BIGINT UNSIGNED | FK | YES | ID del usuario asociado (si está autenticado) |
| ip_address | VARCHAR(45) | | YES | Dirección IP desde la que se inició la sesión |
| user_agent | TEXT | | YES | User agent del navegador |
| payload | LONGTEXT | | NO | Datos de la sesión (serializados) |
| last_activity | INT | | NO | Timestamp de la última actividad |

---

## 11.7 Diagrama de Relaciones

```
┌─────────────────┐         ┌─────────────────┐
│     roles       │         │     users       │
├─────────────────┤         ├─────────────────┤
│ id (PK)         │◄────┐   │ id (PK)         │◄────┐
│ name            │    │   │ name            │     │
│ created_at      │    │   │ email           │     │
│ updated_at      │    │   │ password        │     │
└─────────────────┘    │   │ role_id (FK)    │─────┘
                       │   │ created_at      │
                       │   │ updated_at      │
                       │   └─────────────────┘
                       │            │
                       │            │ 1:N
                       │            ▼
                       │   ┌─────────────────┐
                       │   │    tickets      │
                       │   ├─────────────────┤
                       │   │ id (PK)         │
                       │   │ user_id (FK)    │
                       │   │ location        │
                       │   │ description     │
                       │   │ priority        │
                       │   │ status          │
                       │   │ photo_path      │
                       │   │ created_at      │
                       │   │ updated_at      │
                       │   └─────────────────┘
                       │
                       │   ┌─────────────────┐
                       └───│  notifications  │
                           ├─────────────────┤
                           │ id (PK) UUID    │
                           │ notifiable_type │
                           │ notifiable_id   │
                           │ type            │
                           │ data (JSON)     │
                           │ read_at         │
                           │ created_at      │
                           │ updated_at      │
                           └─────────────────┘
```

---

# 12. MOCKUPS

Esta sección describe las pantallas principales del sistema, detallando los elementos de interfaz de usuario que componen cada vista. Las imágenes reales de las pantallas se insertarán manualmente en los espacios indicados.

## 12.1 Login

### Descripción

Pantalla de autenticación que permite a los usuarios registrados acceder al sistema mediante sus credenciales de email y contraseña.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Logo del ITSC | Imagen | Logo institucional en la parte superior |
| Título | Texto | "Iniciar Sesión" |
| Campo Email | Input text | Campo para ingresar el correo electrónico |
| Campo Contraseña | Input password | Campo para ingresar la contraseña (caracteres ocultos) |
| Checkbox "Recordarme" | Checkbox | Opción para mantener la sesión activa |
| Botón "Ingresar" | Button | Envía el formulario de login |
| Enlace "Registrarse" | Link | Redirige al formulario de registro |
| Mensajes de Error | Alert | Muestra errores de validación o credenciales incorrectas |
| Footer | Texto | Copyright y información institucional |

### Diseño Visual

- **Fondo:** Color sólido o gradiente institucional
- **Contenedor:** Tarjeta centrada con sombra suave
- **Inputs:** Estilo moderno con bordes redondeados
- **Botón:** Color primario llamativo con hover effect

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE LOGIN]*

---

## 12.2 Dashboard Estudiante/Profesor

### Descripción

Panel principal de usuario que muestra un resumen de los reportes personales, estadísticas básicas y accesos rápidos a las funcionalidades principales.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Barra de Navegación | Navbar | Menú superior con logo, usuario, rol y opciones |
| Tarjeta "Mis Reportes" | Card | Número total de reportes creados por el usuario |
| Tarjeta "Pendientes" | Card | Cantidad de reportes en estado pendiente |
| Tarjeta "En Proceso" | Card | Cantidad de reportes en proceso |
| Tarjeta "Resueltos" | Card | Cantidad de reportes resueltos |
| Botón "Crear Reporte" | Button | Acceso rápido para crear nuevo reporte |
| Tabla "Últimos Reportes" | Table | Lista de los 10 reportes más recientes del usuario |
| Columnas de Tabla | Table Columns | ID, Ubicación, Estado, Prioridad, Fecha, Acciones |
| Badge de Estado | Badge | Indicador visual del estado (colores por estado) |
| Badge de Prioridad | Badge | Indicador visual de la prioridad (colores por prioridad) |
| Footer | Footer | Información institucional |

### Diseño Visual

- **Layout:** Grid responsive con tarjetas en la parte superior
- **Colores de Estado:** Amarillo (Pendiente), Azul (En Proceso), Verde (Resuelto)
- **Colores de Prioridad:** Negro (Baja), Azul (Media), Rojo (Alta)

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE DASHBOARD USUARIO]*

---

## 12.3 Formulario Nuevo Reporte

### Descripción

Pantalla que contiene el formulario para crear un nuevo reporte de incidencia de infraestructura.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Título | Texto | "Crear Nuevo Reporte" |
| Campo Ubicación | Input text | Lugar donde se encuentra el problema |
| Campo Descripción | Textarea | Descripción detallada del problema (mínimo 10 caracteres) |
| Select Prioridad | Dropdown | Selección de prioridad: Baja, Media, Alta |
| Campo Fotografía | File input | Subida opcional de imagen (jpg, png, gif, máx 5MB) |
| Botón "Guardar" | Button | Envía el formulario y crea el reporte |
| Botón "Cancelar" | Button | Regresa al listado de reportes |
| Mensajes de Error | Alert | Muestra errores de validación del formulario |
| Ayuda | Text | Texto de ayuda para cada campo |

### Diseño Visual

- **Formulario:** Tarjeta centrada con campos organizados verticalmente
- **Labels:** Encima de cada campo input
- **Required Indicator:** Asterisco (*) en campos obligatorios
- **Preview de Imagen:** Muestra vista previa de la foto seleccionada

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE FORMULARIO]*

---

## 12.4 Detalle de Reporte

### Descripción

Vista que muestra toda la información de un reporte específico, incluyendo estado actual, prioridad, descripción completa y fotografía adjunta.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Título | Texto | "Detalle del Reporte #ID" |
| Badge de Estado | Badge | Estado actual del ticket |
| Badge de Prioridad | Badge | Prioridad asignada |
| Campo Ubicación | Label + Value | Ubicación del problema |
| Campo Descripción | Label + Value | Descripción completa |
| Fotografía | Image | Foto adjunta (si existe) |
| Campo Fecha Creación | Label + Value | Cuándo se creó el reporte |
| Campo Fecha Actualización | Label + Value | Cuándo se actualizó por última vez |
| Botón "Editar" | Button | Solo visible para Admin/Mantenimiento |
| Botón "Eliminar" | Button | Solo visible para Admin |
| Botón "Volver" | Button | Regresa al listado |
| Historial de Cambios | Timeline | Lista de cambios de estado (si está implementado) |

### Diseño Visual

- **Layout:** Dos columnas (información a la izquierda, foto a la derecha)
- **Imagen:** Tamaño máximo controlado, centrada
- **Badges:** Colores distintivos según estado/prioridad

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE DETALLE]*

---

## 12.5 Dashboard Mantenimiento

### Descripción

Panel de control para el personal de mantenimiento, enfocado en mostrar los reportes pendientes de atención y las métricas relevantes para su función.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Barra de Navegación | Navbar | Menú superior con usuario y rol |
| Tarjeta "Pendientes" | Card | Cantidad de reportes pendientes |
| Tarjeta "En Proceso" | Card | Cantidad de reportes en proceso |
| Tarjeta "Resueltos" | Card | Cantidad de reportes resueltos |
| Tarjeta "Prioridad Alta" | Card | Reportes pendientes con prioridad alta |
| Tabla "Reportes Pendientes" | Table | Lista de reportes ordenados por prioridad |
| Filtros Rápidos | Buttons | Botones para filtrar por estado/prioridad |
| Botón "Atender" | Button | Acción rápida para cambiar estado |
| Acciones en Tabla | Actions | Botones para ver detalle y editar |

### Diseño Visual

- **Énfasis:** Reportes prioritarios resaltados en rojo
- **Orden:** Reportes de alta prioridad aparecen primero
- **Acciones Rápidas:** Botones directamente en la tabla

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE DASHBOARD MANTENIMIENTO]*

---

## 12.6 Dashboard Administrador

### Descripción

Panel de administración con estadísticas completas del sistema, acceso a todas las funcionalidades y métricas globales.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Barra de Navegación | Navbar | Menú completo con todas las opciones |
| Tarjeta "Total Usuarios" | Card | Número total de usuarios registrados |
| Tarjeta "Total Reportes" | Card | Cantidad total de reportes en el sistema |
| Tarjetas de Estado | Cards | Reportes por estado (pendientes, en proceso, resueltos) |
| Tarjetas de Prioridad | Cards | Reportes por prioridad (alta, media, baja) |
| Gráfico de Estados | Chart | Gráfico de barras/torta con distribución por estado |
| Gráfico de Prioridades | Chart | Gráfico con distribución por prioridad |
| Tabla "Últimos Reportes" | Table | Lista de los reportes más recientes |
| Accesos Rápidos | Quick Links | Links a gestión de usuarios, configuración, etc. |

### Diseño Visual

- **Gráficos:** Visuales y coloridos para fácil comprensión
- **Métricas:** Números grandes y destacados
- **Layout:** Dashboard completo con múltiples secciones

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE DASHBOARD ADMIN]*

---

## 12.7 Registro de Usuario

### Descripción

Formulario para que nuevos usuarios se registren en el sistema y obtengan acceso a las funcionalidades.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Título | Texto | "Crear Cuenta" |
| Campo Nombre Completo | Input text | Nombre del usuario |
| Campo Email | Input email | Correo electrónico válido |
| Campo Contraseña | Input password | Contraseña (mínimo 8 caracteres) |
| Campo Confirmar Contraseña | Input password | Confirmación de contraseña |
| Botón "Registrarse" | Button | Crea la cuenta de usuario |
| Enlace "Ya tengo cuenta" | Link | Redirige al login |
| Mensajes de Error | Alert | Errores de validación |
| Términos | Checkbox | Aceptación de términos (opcional) |

### Diseño Visual

- **Formulario:** Similar al de login pero con más campos
- **Validación en Tiempo Real:** Indicadores de fortaleza de contraseña
- **Confirmación:** Verificación de que las contraseñas coincidan

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE REGISTRO]*

---

## 12.8 Estadísticas del Sistema

### Descripción

Vista dedicada a mostrar estadísticas y métricas del sistema, útil para administradores y personal de mantenimiento.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Selector de Rango | Date Range | Permite seleccionar período de tiempo |
| Gráfico de Tendencia | Line Chart | Reportes creados por día/semana |
| Gráfico de Estados | Pie Chart | Distribución porcentual por estado |
| Gráfico de Prioridades | Bar Chart | Distribución por prioridad |
| KPIs | Cards | Métricas clave del período seleccionado |
| Tabla de Resumen | Table | Estadísticas detalladas por categoría |
| Botón Exportar | Button | Exportar estadísticas a PDF/Excel |

### Diseño Visual

- **Gráficos:** Librería de gráficos (Chart.js o similar)
- **Colores:** Consistentes con el tema del sistema
- **Responsive:** Gráficos se adaptan al tamaño de pantalla

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE ESTADÍSTICAS]*

---

## 12.9 Notificaciones

### Descripción

Centro de notificaciones donde los usuarios pueden ver, marcar como leídas y eliminar las notificaciones del sistema.

### Elementos de la Interfaz

| Elemento | Tipo | Descripción |
|----------|------|-------------|
| Contador de No Leídas | Badge | Número de notificaciones no leídas |
| Lista de Notificaciones | List | Lista de todas las notificaciones |
| Item de Notificación | List Item | Mensaje, fecha y estado de lectura |
| Botón "Marcar como Leída" | Button | Marca notificación individual como leída |
| Botón "Marcar Todas como Leídas" | Button | Marca todas las notificaciones como leídas |
| Botón "Eliminar" | Button | Elimina notificación individual |
| Botón "Eliminar Leídas" | Button | Elimina todas las notificaciones ya leídas |
| Paginación | Pagination | Navegación entre páginas de notificaciones |
| Mensaje "Sin Notificaciones" | Empty State | Cuando no hay notificaciones |

### Diseño Visual

- **No Leídas:** Fondo resaltado o borde de color
- **Leídas:** Opacidad reducida o fondo gris
- **Iconos:** Diferentes iconos según tipo de notificación

*[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP DE NOTIFICACIONES]*

---

# 13. EXPLICACIÓN DE LA ARQUITECTURA MVC

## 13.1 Introducción a MVC

### Definición del Patrón Modelo-Vista-Controlador

El patrón de diseño Modelo-Vista-Controlador (MVC, por sus siglas en inglés Model-View-Controller) es una arquitectura de software que separa la lógica de negocio de una aplicación en tres componentes interconectados pero independientes. Este patrón fue introducido por primera vez por Trygve Reenskaug en 1979 mientras trabajaba en Smalltalk en el laboratorio de Xerox PARC, y desde entonces se ha convertido en uno de los patrones de diseño más ampliamente adoptados en el desarrollo de aplicaciones web y de escritorio.

**Modelo (Model):** Representa el estado y la lógica de negocio de la aplicación. Los modelos son responsables de gestionar los datos de la aplicación, incluyendo su recuperación, almacenamiento y validación. En el contexto de una aplicación web con base de datos, los modelos típicamente representan tablas de la base de datos y proporcionan una interfaz orientada a objetos para interactuar con ellas.

**Vista (View):** Representa la presentación de la información al usuario. Las vistas son responsables de mostrar los datos proporcionados por los modelos en un formato legible y atractivo. En aplicaciones web, las vistas generalmente generan HTML que se envía al navegador del usuario. Las vistas deben ser "tontas" en el sentido de que no contienen lógica de negocio compleja, solo lógica de presentación.

**Controlador (Controller):** Actúa como intermediario entre los modelos y las vistas. Los controladores procesan las entradas del usuario (peticiones HTTP), interactúan con los modelos para obtener o modificar datos, y seleccionan las vistas apropiadas para renderizar la respuesta. Los controladores contienen la lógica de aplicación que orquesta el flujo del sistema.

### Beneficios de la Arquitectura MVC

La implementación del patrón MVC proporciona numerosos beneficios que justifican su adopción en el desarrollo de software moderno:

1. **Separación de Responsabilidades:** Cada componente tiene una responsabilidad claramente definida, lo que facilita la comprensión, el mantenimiento y la evolución del código. Los desarrolladores pueden trabajar en diferentes componentes sin interferir entre sí.

2. **Mantenibilidad:** La separación clara entre lógica de negocio, presentación y control de flujo hace que el código sea más fácil de mantener y modificar. Los cambios en un componente generalmente no afectan a los otros componentes.

3. **Testabilidad:** La separación de componentes facilita la creación de pruebas unitarias. Los modelos pueden probarse independientemente de las vistas, y los controladores pueden probarse con modelos simulados (mocks).

4. **Reutilización de Código:** Los modelos y controladores pueden ser reutilizados con diferentes vistas. Por ejemplo, los mismos datos pueden presentarse en formato HTML, JSON o XML sin modificar la lógica de negocio subyacente.

5. **Desarrollo Paralelo:** Diferentes miembros del equipo pueden trabajar simultáneamente en diferentes componentes. Un desarrollador puede trabajar en los modelos mientras otro diseña las vistas.

6. **Escalabilidad:** La arquitectura modular facilita la adición de nuevas funcionalidades sin requerir cambios mayores en la estructura existente.

7. **Organización del Código:** MVC impone una estructura organizada al proyecto, haciendo que el código sea más predecible y fácil de navegar para nuevos desarrolladores.

### Por qué se Seleccionó MVC para este Proyecto

La decisión de implementar el patrón MVC en el Sistema de Reporte de Problemas de Infraestructura se basa en varias consideraciones técnicas y prácticas:

**Naturaleza de la Aplicación:** El sistema es una aplicación web CRUD (Create, Read, Update, Delete) que gestiona datos de usuarios y reportes. MVC es particularmente adecuado para este tipo de aplicaciones porque proporciona una estructura clara para manejar operaciones de base de datos, lógica de negocio y presentación.

**Framework Laravel:** Laravel, el framework seleccionado para el desarrollo, está construido alrededor del patrón MVC. Aprovechar esta arquitectura nativa del framework permite utilizar todas las características y convenciones de Laravel de manera óptima.

**Requisitos Académicos:** La asignatura SOF-111 (Construcción de Software) requiere la implementación de patrones de diseño establecidos. MVC es uno de los patrones fundamentales que todo desarrollador de software debe comprender y saber aplicar.

**Futuras Ampliaciones:** La arquitectura MVC facilita la adición de nuevas funcionalidades en cuatrimestres posteriores (SOF-113), permitiendo que el sistema crezca de manera organizada y mantenible.

---

## 13.2 Implementación en Laravel

### Estructura de Carpetas del Proyecto

El proyecto Laravel sigue una estructura de carpetas estandarizada que refleja la arquitectura MVC. A continuación se describe la organización de los directorios principales:

```
sistema-reportes-infraestructura/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/          # CONTROLADORES (C en MVC)
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── ReporteController.php
│   │   │   └── NotificationController.php
│   │   ├── Middleware/           # Filtros de peticiones
│   │   │   └── CheckRole.php
│   │   └── Requests/             # Validaciones de formularios
│   │       ├── LoginUserRequest.php
│   │       ├── RegisterUserRequest.php
│   │       ├── StoreReporteRequest.php
│   │       └── UpdateReporteRequest.php
│   ├── Models/                   # MODELOS (M en MVC)
│   │   ├── User.php
│   │   ├── Role.php
│   │   └── Ticket.php
│   ├── Notifications/            # Clases de notificación
│   │   ├── NuevoReporteNotification.php
│   │   └── ReporteActualizadoNotification.php
│   ├── Providers/                # Proveedores de servicios
│   ├── TicketStatus.php          # Enum para estados
│   └── TicketPriority.php        # Enum para prioridades
│
├── bootstrap/                    # Archivos de arranque
│
├── config/                       # Configuración del framework
│
├── database/
│   ├── migrations/               # Versionado de esquema de BD
│   └── seeders/                  # Datos iniciales de prueba
│
├── resources/
│   └── views/                    # VISTAS (V en MVC)
│       ├── layouts/
│       │   └── app.blade.php
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── dashboard/
│       │   ├── admin.blade.php
│       │   ├── mantenimiento.blade.php
│       │   └── usuario.blade.php
│       ├── reportes/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── index.blade.php
│       │   ├── show.blade.php
│       │   └── historial.blade.php
│       └── notifications/
│           └── index.blade.php
│
├── routes/
│   └── web.php                   # Definición de rutas web
│
├── storage/                      # Archivos generados
│   └── app/public/reportes/      # Fotos de reportes subidas
│
└── public/                       # Punto de entrada público
```

### Ubicación de Modelos (app/Models/)

Los modelos en Laravel representan las entidades de negocio del sistema y se encargan de interactuar con la base de datos utilizando Eloquent ORM (Object-Relational Mapping). Cada modelo corresponde típicamente a una tabla en la base de datos.

**Archivos de Modelos:**

| Archivo | Clase | Tabla | Descripción |
|---------|-------|-------|-------------|
| `app/Models/User.php` | User | users | Representa a los usuarios del sistema |
| `app/Models/Role.php` | Role | roles | Representa los roles disponibles |
| `app/Models/Ticket.php` | Ticket | tickets | Representa los reportes de incidencias |

**Características de los Modelos Laravel:**

- Heredan de `Illuminate\Database\Eloquent\Model`
- Definen propiedades `$fillable` para asignación masiva
- Establecen relaciones mediante métodos (hasMany, belongsTo, etc.)
- Pueden incluir accessors y mutators para transformar atributos
- Soportan eventos y observadores para lógica reactiva

### Ubicación de Vistas (resources/views/)

Las vistas en Laravel utilizan el motor de plantillas Blade, que proporciona una sintaxis limpia y poderosa para crear interfaces de usuario dinámicas. Las vistas son responsables de presentar los datos al usuario final.

**Organización de Vistas:**

| Directorio | Propósito |
|------------|-----------|
| `layouts/` | Plantillas base que envuelven otras vistas |
| `auth/` | Vistas de autenticación (login, registro) |
| `dashboard/` | Vistas de paneles de control por rol |
| `reportes/` | Vistas relacionadas con gestión de reportes |
| `notifications/` | Vistas de listado de notificaciones |

**Características de las Vistas Blade:**

- Extensión de archivo `.blade.php`
- Sintaxis `{{ $variable }}` para mostrar datos
- Directivas de control (@if, @foreach, @while)
- Herencia de plantillas (@extends, @section, @yield)
- Inclusión de subvistas (@include)
- Compilación a PHP nativo para rendimiento

### Ubicación de Controladores (app/Http/Controllers/)

Los controladores en Laravel agrupan la lógica de manejo de peticiones HTTP relacionadas. Cada controlador contiene métodos (acciones) que procesan entradas, interactúan con modelos y retornan vistas o respuestas.

**Archivos de Controladores:**

| Archivo | Controlador | Responsabilidad |
|---------|-------------|-----------------|
| `AuthController.php` | AuthController | Manejo de autenticación (login, registro, logout) |
| `DashboardController.php` | DashboardController | Mostrar dashboards personalizados por rol |
| `ReporteController.php` | ReporteController | CRUD completo de reportes |
| `NotificationController.php` | NotificationController | Gestión de notificaciones de usuario |

**Características de los Controladores Laravel:**

- Heredan de `App\Http\Controllers\Controller`
- Métodos públicos que corresponden a acciones/rutas
- Pueden recibir inyección de dependencias
- Utilizan Form Requests para validación
- Retornan vistas, redirecciones o respuestas JSON

### Ubicación de Rutas (routes/web.php)

El archivo de rutas web define todas las URLs de la aplicación y las asocia con los controladores correspondientes. Laravel utiliza un sistema de enrutamiento expresivo que permite definir rutas de manera clara y concisa.

**Estructura del Archivo de Rutas:**

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\NotificationController;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    
    // Redirección al dashboard según rol
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->isMaintenance()) {
            return redirect()->route('mantenimiento.dashboard');
        } else {
            return redirect()->route('usuario.dashboard');
        }
    })->name('dashboard');
    
    // Dashboards por rol
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');
    Route::get('/mantenimiento/dashboard', [DashboardController::class, 'mantenimiento'])
        ->name('mantenimiento.dashboard');
    Route::get('/usuario/dashboard', [DashboardController::class, 'usuario'])
        ->name('usuario.dashboard');
    
    // Rutas de reportes
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/reportes/crear', [ReporteController::class, 'create'])->name('reportes.create');
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');
    Route::get('/reportes/{id}', [ReporteController::class, 'show'])->name('reportes.show');
    Route::get('/reportes/{id}/editar', [ReporteController::class, 'edit'])->name('reportes.edit');
    Route::put('/reportes/{id}', [ReporteController::class, 'update'])->name('reportes.update');
    Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])->name('reportes.destroy');
    Route::get('/reportes/historial', [ReporteController::class, 'historial'])->name('reportes.historial');
    
    // Rutas de notificaciones
    Route::get('/notificaciones', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notificaciones/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notificaciones/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    Route::delete('/notificaciones/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::delete('/notificaciones/read', [NotificationController::class, 'deleteRead'])->name('notifications.delete-read');
});
```

---

## 13.3 Flujo General del Sistema

El flujo general del sistema sigue una secuencia bien definida de pasos que ilustran cómo interactúan los componentes MVC para procesar una petición de usuario y generar una respuesta. A continuación se describe este flujo paso a paso:

### Paso 1: Usuario hace Petición HTTP

El flujo comienza cuando un usuario interactúa con la aplicación mediante su navegador web. Esta interacción genera una petición HTTP que se envía al servidor. Las peticiones pueden ser de diferentes tipos:

- **GET:** Solicita obtener una página o recurso (ej: ver listado de reportes)
- **POST:** Envía datos para crear un recurso (ej: crear nuevo reporte)
- **PUT/PATCH:** Envía datos para actualizar un recurso (ej: editar estado de ticket)
- **DELETE:** Solicita eliminar un recurso (ej: eliminar un reporte)

**Ejemplo:** Un usuario hace clic en el enlace "Reportes" en la barra de navegación, generando una petición GET a la URL `/reportes`.

### Paso 2: Router dirige al Controlador

El enrutador (router) de Laravel recibe la petición HTTP y la compara contra las rutas definidas en `routes/web.php`. El router identifica la ruta coincidente basándose en el método HTTP y la URL, y determina qué controlador y método deben manejar la petición.

Durante este paso, Laravel también aplica los middleware asociados a la ruta. Los middleware son filtros que procesan la petición antes de que llegue al controlador, permitiendo realizar tareas como:

- Verificar autenticación del usuario
- Validar roles y permisos
- Registrar actividad en logs
- Aplicar rate limiting

**Ejemplo:** La ruta `/reportes` coincide con `Route::get('/reportes', [ReporteController::class, 'index'])`. El middleware `auth` verifica que el usuario esté autenticado.

### Paso 3: Controlador solicita datos al Modelo

El método del controlador se ejecuta y, si necesita datos de la base de datos, solicita esa información a los modelos correspondientes. El controlador utiliza Eloquent ORM para construir consultas de manera orientada a objetos, sin escribir SQL directamente.

El controlador puede:
- Obtener todos los registros de una tabla
- Filtrar registros según criterios específicos
- Ordenar resultados
- Paginar resultados
- Cargar relaciones (eager loading)

**Ejemplo:** En `ReporteController::index()`, se ejecuta:
```php
$query = Ticket::with('user');
$reportes = $query->latest()->paginate(10);
```

### Paso 4: Modelo consulta Base de Datos

El modelo traduce las consultas de Eloquent a sentencias SQL y las ejecuta contra la base de datos MySQL. Eloquent se encarga de:

- Construir la consulta SQL apropiada
- Ejecutar la consulta mediante PDO
- Manejar conexiones y transacciones
- Prevenir inyección SQL mediante prepared statements

**Ejemplo:** El modelo `Ticket` genera y ejecuta:
```sql
SELECT * FROM tickets ORDER BY created_at DESC LIMIT 10 OFFSET 0
```

### Paso 5: Modelo retorna datos al Controlador

La base de datos devuelve los resultados de la consulta, y el modelo los transforma en objetos de PHP (instancias de la clase del modelo). Estos objetos son mucho más fáciles de manipular que arrays asociativos puros, ya que:

- Tienen métodos y propiedades definidos
- Pueden cargar relaciones automáticamente
- Aplican accessors y mutators
- Serializan fácilmente a JSON

**Ejemplo:** Los registros de tickets se convierten en una colección de objetos `Ticket`:
```php
Collection {
    items: [
        Ticket { id: 1, location: "Aula 101", ... },
        Ticket { id: 2, location: "Laboratorio 3", ... },
        ...
    ]
}
```

### Paso 6: Controlador pasa datos a la Vista

El controlador recibe los datos del modelo y los pasa a la vista correspondiente utilizando la función `view()`. Los datos se pasan como un array asociativo donde las claves se convierten en variables disponibles en la vista.

**Ejemplo:**
```php
return view('reportes.index', compact('reportes'));
// Equivalente a:
return view('reportes.index', ['reportes' => $reportes]);
```

### Paso 7: Vista se renderiza en el Navegador

El motor de plantillas Blade procesa el archivo de vista, reemplazando las expresiones `{{ }}` con los valores reales de las variables, ejecutando las directivas de control (@if, @foreach), e incluyendo subvistas y layouts.

El resultado final es HTML puro que se envía como respuesta HTTP al navegador del usuario. El navegador interpreta el HTML y lo muestra como una página web visual.

**Ejemplo:** La vista `reportes.index.blade.php` se compila a HTML:
```html
<!DOCTYPE html>
<html>
<head>
    <title>Reportes</title>
</head>
<body>
    <h1>Reportes de Infraestructura</h1>
    <table>
        <tr><td>1</td><td>Aula 101</td><td>Pendiente</td>...</tr>
        <tr><td>2</td><td>Laboratorio 3</td><td>En Proceso</td>...</tr>
        ...
    </table>
</body>
</html>
```

---

## 13.4 Ejemplo Práctico: Creación de Ticket

Para ilustrar concretamente cómo funciona la arquitectura MVC en el sistema, analicemos paso a paso el flujo completo de una operación específica: la creación de un nuevo ticket de reporte.

### Escenario

Un usuario autenticado (Estudiante/Profesor) desea reportar una fuga de agua en el baño del primer piso del Edificio A.

### Paso 1: Usuario accede al formulario

**Acción del Usuario:** El usuario navega a la URL `/reportes/crear` o hace clic en el botón "Crear Nuevo Reporte".

**Ruta:** `GET /reportes/crear` → `ReporteController@create`

**Código del Controlador:**
```php
public function create()
{
    return view('reportes.create');
}
```

**Resultado:** El controlador retorna la vista `reportes.create`, que muestra el formulario vacío.

### Paso 2: Usuario completa y envía el formulario

**Acción del Usuario:** El usuario llena los campos del formulario:
- Ubicación: "Baño Primer Piso, Edificio A"
- Descripción: "Fuga de agua en el lavabo del baño. El agua no cierra completamente y está goteando constantemente."
- Prioridad: "Alta"
- Fotografía: [Selecciona una foto del problema]

**Ruta:** `POST /reportes` → `ReporteController@store`

### Paso 3: Validación mediante Form Request

Antes de llegar al método `store()` del controlador, la petición pasa por el Form Request `StoreReporteRequest`, que valida los datos:

**Código del Form Request:**
```php
public function rules()
{
    return [
        'location' => 'required|string|max:150',
        'description' => 'required|string|min:10',
        'priority' => 'required|in:baja,media,alta',
        'foto' => 'nullable|image|max:5120', // 5MB máximo
    ];
}
```

Si la validación falla, Laravel automáticamente redirige de vuelta al formulario con los errores. Si pasa, la petición continúa al controlador.

### Paso 4: Controlador procesa los datos validados

**Código del Controlador:**
```php
public function store(StoreReporteRequest $request)
{
    // Obtener datos validados
    $data = $request->validated();
    
    // Manejar subida de fotografía
    if ($request->hasFile('foto')) {
        $data['photo_path'] = $request->file('foto')
            ->store('reportes', 'public');
    }
    
    // Agregar el ID del usuario autenticado
    $data['user_id'] = auth()->id();
    
    // Estado por defecto: pendiente
    $data['status'] = 'pendiente';
    
    // Crear el ticket en la base de datos
    $ticket = Ticket::create($data);
    
    // Generar notificaciones para admins y mantenimiento
    $admins = User::where('role_id', 1)->get();
    $mantenimiento = User::where('role_id', 2)->get();
    
    foreach ($admins->merge($mantenimiento) as $user) {
        $user->notify(new NuevoReporteNotification($ticket));
    }
    
    // Redirigir con mensaje de éxito
    return redirect()->route('reportes.index')
        ->with('success', 'Reporte creado exitosamente');
}
```

### Paso 5: Modelo guarda en la base de datos

**Código del Modelo:**
```php
// Ticket.php
protected $fillable = [
    'user_id',
    'location',
    'description',
    'priority',
    'status',
    'photo_path',
];

// La creación ejecuta:
INSERT INTO tickets (user_id, location, description, priority, status, photo_path, created_at, updated_at)
VALUES (3, 'Baño Primer Piso, Edificio A', 'Fuga de agua...', 'alta', 'pendiente', 'reportes/abc123.jpg', NOW(), NOW())
```

### Paso 6: Notificaciones se generan

**Código de la Notificación:**
```php
// NuevoReporteNotification.php
public function toArray($notifiable)
{
    return [
        'ticket_id' => $this->ticket->id,
        'message' => 'Nuevo reporte de infraestructura creado',
        'location' => $this->ticket->location,
    ];
}
```

**Inserción en BD:**
```sql
INSERT INTO notifications (id, notifiable_type, notifiable_id, type, data, created_at)
VALUES (uuid-1, 'App\\Models\\User', 1, 'App\\Notifications\\NuevoReporteNotification', '{"ticket_id":5,...}', NOW())
```

### Paso 7: Usuario ve el resultado

El usuario es redirigido a `/reportes` donde ve:
- Mensaje de éxito: "Reporte creado exitosamente"
- Su nuevo reporte en la lista con estado "Pendiente"

### Archivos Involucrados en este Flujo

| Tipo | Archivo | Propósito |
|------|---------|-----------|
| **Ruta** | `routes/web.php` | Define la ruta POST /reportes |
| **Form Request** | `app/Http/Requests/StoreReporteRequest.php` | Valida los datos del formulario |
| **Controlador** | `app/Http/Controllers/ReporteController.php` | Procesa la creación del ticket |
| **Modelo** | `app/Models/Ticket.php` | Representa y guarda el ticket en BD |
| **Notificación** | `app/Notifications/NuevoReporteNotification.php` | Define la notificación a enviar |
| **Vista Formulario** | `resources/views/reportes/create.blade.php` | Muestra el formulario de creación |
| **Vista Resultado** | `resources/views/reportes/index.blade.php` | Muestra el listado con el nuevo ticket |
| **Layout** | `resources/views/layouts/app.blade.php` | Plantilla base que envuelve las vistas |

---

## 13.5 Diagrama de Flujo MVC

*[ESPACIO PARA INSERTAR DIAGRAMA DE FLUJO MVC]*

### Descripción del Diagrama de Flujo

El diagrama de flujo MVC debe representar visualmente la secuencia de pasos descrita en la sección 13.3. Se recomienda utilizar los siguientes elementos:

**Elementos del Diagrama:**

1. **Usuario (Actor):** Figura humana o icono que representa al usuario final
2. **Navegador:** Icono de navegador web
3. **Router:** Rectángulo etiquetado "Router (web.php)"
4. **Middleware:** Rectángulos apilados representando los middleware
5. **Controlador:** Rectángulo etiquetado "Controlador"
6. **Modelo:** Cilindro o rectángulo etiquetado "Modelo (Eloquent)"
7. **Base de Datos:** Cilindro etiquetado "MySQL"
8. **Vista:** Rectángulo etiquetado "Vista (Blade)"
9. **Flechas:** Indican el flujo de datos entre componentes

**Secuencia del Flujo:**

1. Usuario → Navegador (interacción)
2. Navegador → Router (petición HTTP)
3. Router → Middleware (filtrado)
4. Middleware → Controlador (ejecución)
5. Controlador → Modelo (solicitud de datos)
6. Modelo → Base de Datos (consulta SQL)
7. Base de Datos → Modelo (resultados)
8. Modelo → Controlador (objetos PHP)
9. Controlador → Vista (paso de datos)
10. Vista → Navegador (HTML renderizado)
11. Navegador → Usuario (página visual)

**Herramientas Recomendadas para crear el diagrama:**
- Lucidchart
- Draw.io (gratuito)
- Microsoft Visio
- PlantUML (texto a diagrama)

---

# 14. CONCLUSIÓN

## Resumen del Proyecto Desarrollado

El Sistema de Reporte de Problemas de Infraestructura representa una solución tecnológica completa y funcional para la gestión digital de incidencias relacionadas con la infraestructura del Instituto Técnico Superior Comunitario (ITSC). A lo largo del cuatrimestre 2026-1, se ha diseñado, desarrollado e implementado una aplicación web basada en el framework Laravel 12, siguiendo los principios de la arquitectura Modelo-Vista-Controlador (MVC) y las mejores prácticas de desarrollo de software moderno.

El sistema cumple con todos los requisitos funcionales mínimos establecidos por la asignatura SOF-111 (Construcción de Software), incluyendo autenticación de usuarios con manejo de sesiones, creación y gestión de tickets/reportes, listado y filtrado de reportes, cambio de estados de los tickets a través del flujo Pendiente → En Proceso → Resuelto, consulta de historial de incidencias, y un sistema de control de roles que diferencia claramente entre Administrador, Personal de Mantenimiento y Estudiante/Profesor.

## Objetivos Cumplidos

Todos los objetivos planteados al inicio del proyecto han sido alcanzados exitosamente:

**Objetivo General:** Se desarrolló e implementó un sistema web de gestión de reportes que permite a la comunidad del ITSC reportar, dar seguimiento y gestionar eficientemente las incidencias de infraestructura, centralizando la información en una base de datos MySQL única y proporcionando herramientas de gestión para los diferentes roles de usuario.

**Objetivos Funcionales:**
- ✓ Sistema de autenticación completo con login y registro
- ✓ Gestión de creación de reportes con formulario validado
- ✓ Visualización de listado de reportes con filtros múltiples
- ✓ Actualización de estado de tickets con flujo controlado
- ✓ Consulta de historial de incidencias por usuario
- ✓ Control de roles con permisos diferenciados
- ✓ Sistema de notificaciones internas funcional

**Objetivos Técnicos:**
- ✓ Arquitectura MVC implementada correctamente
- ✓ Framework Laravel 12 utilizado en toda la aplicación
- ✓ Base de datos MySQL diseñada con relaciones apropiadas
- ✓ Validaciones de servidor con Form Requests
- ✓ Contraseñas encriptadas con bcrypt

**Objetivos de Documentación:**
- ✓ Documento SRS completo con 15 secciones
- ✓ Casos de uso detallados con flujos completos
- ✓ Diagramas del sistema descritos
- ✓ Modelo de datos documentado

## Tecnologías Utilizadas

El proyecto ha sido desarrollado utilizando un stack tecnológico moderno y ampliamente adoptado en la industria:

| Capa | Tecnología | Versión |
|------|------------|---------|
| Backend | PHP | 8.2+ |
| Framework | Laravel | 12.x |
| Base de Datos | MySQL | 8.0+ |
| Frontend | Tailwind CSS | CDN 3.x |
| Motor de Plantillas | Blade | Laravel |
| Control de Versiones | Git | - |

## Aprendizajes Obtenidos

Durante el desarrollo del proyecto se adquirieron conocimientos valiosos en las siguientes áreas:

1. **Desarrollo con Laravel:** Comprensión profunda del framework Laravel, incluyendo su sistema de enrutamiento, middleware, Eloquent ORM, sistema de plantillas Blade, y manejo de autenticación.

2. **Arquitectura MVC:** Aplicación práctica del patrón Modelo-Vista-Controlador, entendiendo la importancia de la separación de responsabilidades y sus beneficios para la mantenibilidad del código.

3. **Seguridad Web:** Implementación de prácticas de seguridad como hash de contraseñas, protección CSRF, validación de datos del lado del servidor, y control de acceso basado en roles.

4. **Base de Datos Relacionales:** Diseño de esquema de base de datos, establecimiento de relaciones entre tablas, uso de migraciones para versionado del esquema.

5. **Documentación Técnica:** Elaboración de documentación SRS siguiendo estándares de la industria, comprendiendo la importancia de documentar adecuadamente los requisitos de software.

6. **Control de Versiones:** Uso de Git para manejo del código fuente, permitiendo seguimiento de cambios y colaboración.

## Limitaciones Encontradas

Durante el desarrollo del proyecto se identificaron las siguientes limitaciones:

1. **Tiempo Limitado:** El cuatrimestre académico impone restricciones de tiempo que limitan la implementación de funcionalidades adicionales deseables.

2. **Recursos de Infraestructura:** El desarrollo se realizó en entorno local, sin despliegue en servidor de producción, lo que limita la evaluación del rendimiento en condiciones reales.

3. **Testing Automatizado:** No se implementó un conjunto completo de pruebas automatizadas debido a las limitaciones de tiempo.

4. **Experiencia Previa:** La curva de aprendizaje de Laravel y PHP 8.2 requirió tiempo adicional de investigación y estudio.

## Trabajo Futuro para SOF-113

El sistema tiene un gran potencial para ser ampliado y mejorado en cuatrimestres posteriores. Las siguientes funcionalidades están contempladas para futuras iteraciones:

1. **Módulo de Mantenimiento Preventivo:** Sistema de calendarización de mantenimientos preventivos programados para diferentes áreas del instituto.

2. **Notificaciones por Email:** Integración con servidor SMTP para envío de notificaciones por correo electrónico además de las notificaciones internas.

3. **Exportación de Reportes:** Generación de reportes en formato PDF y Excel para facilitar la presentación de estadísticas a la administración.

4. **Sistema de Calificación:** Permitir a los usuarios calificar el servicio recibido una vez que su reporte es marcado como resuelto.

5. **Dashboard Avanzado:** Implementación de gráficos más complejos utilizando librerías como Chart.js o ApexCharts.

6. **API REST:** Desarrollo de una API RESTful para permitir integración con otras aplicaciones o futuros clientes móviles.

7. **Módulo de Inventario:** Gestión de materiales y repuestos utilizados en las reparaciones de mantenimiento.

8. **Aplicación Móvil:** Desarrollo de una aplicación móvil nativa o híbrida para facilitar el reporte desde dispositivos móviles.

## Valoración del Potencial de Continuidad

El Sistema de Reporte de Problemas de Infraestructura tiene un gran potencial para convertirse en una herramienta institucional oficial del ITSC. La arquitectura sólida, el código bien estructurado y la documentación completa proporcionan una base excelente para su evolución continua.

La escalabilidad del sistema permite que pueda ser adoptado por otras instituciones educativas que enfrenten problemas similares de gestión de mantenimiento. La separación clara de componentes y el uso de estándares de la industria facilitan que nuevos desarrolladores puedan dar continuidad al proyecto sin una curva de aprendizaje excesiva.

## Recomendaciones para Mejoras Futuras

Basado en la experiencia de desarrollo y las limitaciones identificadas, se formulan las siguientes recomendaciones:

1. **Implementar Pruebas Automatizadas:** Desarrollar un conjunto completo de pruebas unitarias y de integración utilizando PHPUnit para garantizar la calidad del código y prevenir regresiones.

2. **Despliegue en Producción:** Configurar el sistema en un servidor de producción con HTTPS, optimización de caché y configuración adecuada de PHP y MySQL.

3. **Mejorar la Interfaz de Usuario:** Realizar pruebas de usabilidad con usuarios reales para identificar puntos de mejora en la interfaz y experiencia de usuario.

4. **Documentación de API:** Si se implementa una API REST, generar documentación completa utilizando herramientas como Swagger o OpenAPI.

5. **Monitoreo y Logging:** Implementar un sistema de monitoreo del rendimiento y logs centralizados para facilitar la identificación y resolución de problemas en producción.

6. **Backup Automático:** Configurar un sistema de respaldo automático de la base de datos para prevenir pérdida de información.

7. **Capacitación de Usuarios:** Desarrollar material de capacitación y guías de usuario para facilitar la adopción del sistema por parte de la comunidad del ITSC.

---

# 15. ANEXOS

Esta sección contiene información complementaria que sirve como referencia para la comprensión completa del sistema.

## 15.1 Script SQL de la Base de Datos

A continuación se presenta el script SQL para crear la estructura de la base de datos del sistema:

```sql
-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS sistema_reportes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sistema_reportes;

-- Tabla: roles
CREATE TABLE roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla: users
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    role_id BIGINT UNSIGNED NOT NULL DEFAULT 3,
    remember_token VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla: tickets
CREATE TABLE tickets (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    location VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    priority ENUM('baja', 'media', 'alta') NOT NULL DEFAULT 'media',
    status ENUM('pendiente', 'en_proceso', 'resuelto') NOT NULL DEFAULT 'pendiente',
    photo_path VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla: notifications
CREATE TABLE notifications (
    id CHAR(36) PRIMARY KEY,
    notifiable_type VARCHAR(100) NOT NULL,
    notifiable_id BIGINT UNSIGNED NOT NULL,
    type VARCHAR(100) NOT NULL,
    data JSON NOT NULL,
    read_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    INDEX notifiable_index (notifiable_type, notifiable_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla: cache
CREATE TABLE cache (
    key VARCHAR(255) PRIMARY KEY,
    value MEDIUMTEXT NOT NULL,
    expiration INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla: sessions
CREATE TABLE sessions (
    id VARCHAR(255) PRIMARY KEY,
    user_id BIGINT UNSIGNED DEFAULT NULL,
    ip_address VARCHAR(45) DEFAULT NULL,
    user_agent TEXT DEFAULT NULL,
    payload LONGTEXT NOT NULL,
    last_activity INT NOT NULL,
    INDEX sessions_user_id_index (user_id),
    INDEX sessions_last_activity_index (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserción de datos iniciales (roles)
INSERT INTO roles (name, created_at, updated_at) VALUES
('admin', NOW(), NOW()),
('mantenimiento', NOW(), NOW()),
('usuario', NOW(), NOW());

-- Inserción de usuario administrador por defecto
-- Contraseña: 123456 (hash bcrypt)
INSERT INTO users (name, email, password, role_id, created_at, updated_at) VALUES
('Administrador', 'admin@itsc.edu.do', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW());
```

## 15.2 Capturas de Pantalla Adicionales

*[ESPACIO PARA INSERTAR CAPTURA DE PANTALLA - PÁGINA DE INICIO]*

*[ESPACIO PARA INSERTAR CAPTURA DE PANTALLA - LISTADO DE REPORTES]*

*[ESPACIO PARA INSERTAR CAPTURA DE PANTALLA - FORMULARIO DE EDICIÓN]*

*[ESPACIO PARA INSERTAR CAPTURA DE PANTALLA - HISTORIAL DE REPORTES]*

*[ESPACIO PARA INSERTAR CAPTURA DE PANTALLA - SISTEMA DE NOTIFICACIONES]*

## 15.3 Manual de Usuario Básico

### Para Estudiantes/Profesores

**Cómo Registrarse:**
1. Navegue a la página principal del sistema
2. Haga clic en "Registrarse"
3. Complete el formulario con su nombre, email y contraseña
4. Haga clic en "Crear Cuenta"
5. Será redirigido automáticamente a su dashboard

**Cómo Crear un Reporte:**
1. Inicie sesión con sus credenciales
2. En el dashboard, haga clic en "Crear Nuevo Reporte"
3. Complete la ubicación donde se encuentra el problema
4. Describa detalladamente el problema encontrado
5. Seleccione el nivel de prioridad (baja, media, alta)
6. Opcionalmente, adjunte una fotografía del problema
7. Haga clic en "Guardar Reporte"

**Cómo Consultar el Estado de sus Reportes:**
1. Inicie sesión en el sistema
2. En el dashboard verá un resumen de sus reportes
3. Haga clic en "Reportes" para ver el listado completo
4. Utilice los filtros para buscar por estado o prioridad
5. Haga clic en un reporte para ver su detalle completo

### Para Personal de Mantenimiento

**Cómo Cambiar el Estado de un Reporte:**
1. Inicie sesión con sus credenciales de mantenimiento
2. Navegue a "Reportes" para ver todos los reportes
3. Identifique el reporte que desea actualizar
4. Haga clic en el reporte para ver su detalle
5. Haga clic en "Editar"
6. Seleccione el nuevo estado (En Proceso o Resuelto)
7. Opcionalmente ajuste la prioridad
8. Haga clic en "Guardar Cambios"

### Para Administradores

**Cómo Gestionar Usuarios:**
1. Inicie sesión con sus credenciales de administrador
2. En el dashboard admin, acceda a "Gestión de Usuarios"
3. Puede crear nuevos usuarios o editar existentes
4. Asigne el rol apropiado a cada usuario

**Cómo Ver Estadísticas del Sistema:**
1. Inicie sesión como administrador
2. En el dashboard principal verá estadísticas completas
3. Total de usuarios, reportes y distribución por estado
4. Gráficos de distribución por prioridad y estado

## 15.4 Manual de Instalación y Despliegue

### Requisitos Previos

- PHP 8.2 o superior
- Composer instalado globalmente
- MySQL 8.0 o superior
- Node.js y npm (opcional, para assets)
- Servidor web (Apache, Nginx, o PHP built-in server)

### Pasos de Instalación

**Paso 1: Clonar el Repositorio**
```bash
git clone <URL_DEL_REPOSITORIO>
cd sistema-reportes-infraestructura
```

**Paso 2: Instalar Dependencias de PHP**
```bash
composer install
```

**Paso 3: Configurar Variables de Entorno**
```bash
cp .env.example .env
php artisan key:generate
```

**Paso 4: Configurar Base de Datos**
Edite el archivo `.env` y configure los parámetros de conexión:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_reportes
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

**Paso 5: Crear Base de Datos y Ejecutar Migraciones**
```bash
mysql -u root -p -e "CREATE DATABASE sistema_reportes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
php artisan migrate --seed
```

**Paso 6: Crear Enlace Simbólico para Storage**
```bash
php artisan storage:link
```

**Paso 7: Instalar Dependencias de Frontend (Opcional)**
```bash
npm install
npm run build
```

**Paso 8: Iniciar el Servidor de Desarrollo**
```bash
php artisan serve
```

**Paso 9: Acceder al Sistema**
Abra su navegador y navegue a: `http://localhost:8000`

### Despliegue en Producción

**Consideraciones de Seguridad:**
- Cambie `APP_DEBUG` a `false` en el archivo `.env`
- Configure `APP_ENV=production`
- Use HTTPS con certificado SSL válido
- Cambie las credenciales por defecto
- Configure permisos adecuados en carpetas

**Optimización:**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

## 15.5 Referencias Bibliográficas

1. **Laravel Documentation.** (2024). Laravel 12 Official Documentation. Recuperado de https://laravel.com/docs/12.x

2. **Freeman, A., & Freeman, E.** (2020). Head First Design Patterns. O'Reilly Media.

3. **Gamma, E., Helm, R., Johnson, R., & Vlissides, J.** (1994). Design Patterns: Elements of Reusable Object-Oriented Software. Addison-Wesley.

4. **IEEE Computer Society.** (2014). IEEE Standard for Software and System Test Documentation (IEEE Std 829-2008).

5. **Pressman, R. S.** (2019). Ingeniería de Software: Un enfoque práctico (9na ed.). McGraw-Hill Education.

6. **Sommerville, I.** (2016). Software Engineering (10th ed.). Pearson.

7. **PHP Documentation.** (2024). PHP 8.2 Official Documentation. Recuperado de https://www.php.net/docs.php

8. **MySQL Documentation.** (2024). MySQL 8.0 Reference Manual. Recuperado de https://dev.mysql.com/doc/

9. **Tailwind CSS Documentation.** (2024). Tailwind CSS v3 Documentation. Recuperado de https://tailwindcss.com/docs

10. **Instituto Técnico Superior Comunitario (ITSC).** (2026). Syllabus SOF-111 Construcción de Software.

## 15.6 Glosario de Términos Técnicos

| Término | Definición |
|---------|------------|
| **API** | Interfaz de Programación de Aplicaciones. Conjunto de definiciones y protocolos para construir software. |
| **Autenticación** | Proceso de verificar la identidad de un usuario o sistema. |
| **Backend** | Parte del software que se ejecuta en el servidor y maneja la lógica de negocio y base de datos. |
| **bcrypt** | Algoritmo de hash criptográfico diseñado para almacenar contraseñas de forma segura. |
| **Blade** | Motor de plantillas de Laravel que permite crear vistas dinámicas con sintaxis limpia. |
| **Cache** | Almacenamiento temporal de datos para mejorar el rendimiento de las aplicaciones. |
| **Composer** | Gestor de dependencias para PHP que permite instalar y administrar librerías. |
| **CRUD** | Operaciones básicas de persistencia: Crear, Leer, Actualizar y Eliminar (Create, Read, Update, Delete). |
| **CSRF** | Cross-Site Request Forgery. Ataque que fuerza a un usuario a ejecutar acciones no deseadas. |
| **Eloquent** | ORM (Object-Relational Mapping) incluido en Laravel para trabajar con bases de datos. |
| **ENUM** | Tipo de dato que consiste en un conjunto de valores predefinidos. |
| **Framework** | Estructura de soporte que facilita el desarrollo de software proporcionando funcionalidades predefinidas. |
| **Frontend** | Parte del software con la que interactúa directamente el usuario (interfaz gráfica). |
| **Hash** | Función criptográfica que convierte una entrada de cualquier tamaño en una salida de tamaño fijo. |
| **JSON** | JavaScript Object Notation. Formato ligero de intercambio de datos. |
| **Middleware** | Software que se ejecuta antes de que una petición llegue al controlador, filtrando o modificando la petición. |
| **Migraciones** | Sistema de versionado de esquemas de base de datos que permite modificar la estructura de forma controlada. |
| **MVC** | Modelo-Vista-Controlador. Patrón de arquitectura de software que separa la lógica de negocio, presentación y control. |
| **ORM** | Object-Relational Mapping. Técnica para convertir datos entre sistemas de tipos incompatibles. |
| **Polimorfismo** | Capacidad de una entidad (tabla, objeto) de tener múltiples formas o referencias. |
| **REST** | Representational State Transfer. Estilo de arquitectura para sistemas distribuidos. |
| **Seeder** | Clase que pobla la base de datos con datos iniciales o de prueba. |
| **SRS** | Software Requirements Specification. Documento que especifica los requisitos de un sistema de software. |
| **Tailwind CSS** | Framework de CSS utilitario que proporciona clases de bajo nivel para construir diseños personalizados. |
| **Timestamp** | Marca de tiempo que indica cuándo ocurrió un evento. En Laravel: created_at y updated_at. |
| **UUID** | Universally Unique Identifier. Identificador único estándar de 128 bits. |

---

<div align="center">

## **FIN DEL DOCUMENTO SRS**

<br>

**Sistema de Reporte de Problemas de Infraestructura**  
**ITSC - SOF-111 Construcción de Software**  
**Cuatrimestre 2026-1**

<br><br>

*Documento generado el 31 de marzo de 2026*

</div>