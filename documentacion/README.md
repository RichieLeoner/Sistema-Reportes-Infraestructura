# Carpeta de Documentación - Sistema de Reporte de Infraestructura

## Contenido de esta Carpeta

Esta carpeta contiene toda la documentación técnica del proyecto SOF-111.

### Archivos Disponibles

| Archivo | Descripción | Tamaño |
|---------|-------------|--------|
| `SRS_PARA_PDF.html` | Versión optimizada para generar PDF | ~62 KB |
| `SRS_DOCUMENTACION.html` | Versión HTML con diseño web moderno | ~105 KB |
| `SRS_COMPLETO.md` | Documento SRS completo en Markdown | ~145 KB |
| `GENERAR_PDF.md` | Instrucciones para convertir a PDF | ~5 KB |
| `README.md` | Este archivo - Guía de la carpeta | ~4 KB |

## Estructura del Documento SRS

El documento `SRS_COMPLETO.md` contiene las siguientes 15 secciones:

1. **Portada** - Información institucional y datos del proyecto
2. **Introducción** - Propósito, descripción y tecnologías
3. **Problema a Resolver** - Contexto actual y necesidad de solución
4. **Objetivo del Sistema** - Objetivos general y específicos
5. **Alcance del Sistema** - Límites y criterios de aceptación
6. **Actores del Sistema** - Roles y permisos de usuarios
7. **Requerimientos Funcionales** - 20 RF con matriz de trazabilidad
8. **Requerimientos No Funcicionales** - 18 RNF con criterios de medición
9. **Casos de Uso Detallados** - 3 CU con flujos completos
10. **Diagramas del Sistema** - Descripciones para 4 diagramas
11. **Modelo de Datos** - Diccionario de datos completo
12. **Mockups** - 9 pantallas con descripción detallada
13. **Arquitectura MVC** - Explicación extensa del patrón
14. **Conclusión** - Resumen y valoración del proyecto
15. **Anexos** - SQL, manuales, referencias y glosario

## Cómo Usar esta Documentación

### Para Visualizar el Documento

1. Abra el archivo `SRS_COMPLETO.md` en cualquier editor de Markdown:
   - Visual Studio Code (recomendado)
   - Typora
   - Obsidian
   - O cualquier visor de Markdown online

2. Para una mejor experiencia de lectura, puede convertir el archivo a PDF:
   ```bash
   # Usando pandoc (si está instalado)
   pandoc SRS_COMPLETO.md -o SRS_COMPLETO.pdf
   
   # O use la función de exportar a PDF de VS Code
   ```

### Para Imprimir o Exportar

1. **A Word (.docx):**
   - Abra el archivo en VS Code
   - Copie todo el contenido
   - Pegue en Word
   - Ajuste formato según requisitos (Arial 12, interlineado 1.5)

2. **A PDF:**
   - Use la extensión "Markdown PDF" en VS Code
   - O use herramientas online como markdown-pdf.com

## Espacios para Imágenes

El documento contiene marcadores para insertar imágenes manualmente:

- `[ESPACIO PARA INSERTAR LOGO ITSC]` - Sección 1
- `[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE CONTEXTO]` - Sección 10.1
- `[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE CASOS DE USO]` - Sección 10.2
- `[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA DE CLASES]` - Sección 10.3
- `[ESPACIO PARA INSERTAR IMAGEN DEL DIAGRAMA ENTIDAD-RELACIÓN]` - Sección 10.4
- `[ESPACIO PARA INSERTAR DIAGRAMA DE FLUJO MVC]` - Sección 13.5
- `[ESPACIO PARA INSERTAR IMAGEN DEL MOCKUP]` - Sección 12 (9 espacios)

### Herramientas Recomendadas para Crear Diagramas

1. **Draw.io** (gratuito) - https://app.diagrams.net/
2. **Lucidchart** - https://www.lucidchart.com/
3. **PlantUML** - https://plantuml.com/
4. **Microsoft Visio** - Software de pago

## Checklist de Entrega

Antes de entregar el proyecto, verifique:

- [ ] Documento SRS completo con las 15 secciones
- [ ] Logo del ITSC insertado en la portada
- [ ] Datos del estudiante completados en la portada
- [ ] 4 diagramas insertados en la Sección 10
- [ ] 9 mockups/capturas insertados en la Sección 12
- [ ] Diagrama de flujo MVC en Sección 13.5
- [ ] Formato ajustado según requisitos (fuente, márgenes, interlineado)
- [ ] Numeración de páginas agregada
- [ ] Tabla de contenido actualizada
- [ ] Exportado a PDF para entrega

## Información del Proyecto

- **Institución:** Instituto Técnico Superior Comunitario (ITSC)
- **Asignatura:** SOF-111 - Construcción de Software
- **Cuatrimestre:** 2026-1
- **Tecnología:** Laravel 12 + MySQL
- **Fecha de Entrega:** 31 de marzo de 2026

## Contacto

Para preguntas sobre esta documentación, consulte:
- DOCUMENTACION.md en la raíz del proyecto
- PROYECTO_README.md para instrucciones del sistema
- DOCUMENTACION_HTML.html para versión web de la documentación

---

*Documentación generada el 31 de marzo de 2026*
