# Cómo Generar el PDF de la Documentación SRS

## Opción 1: Desde el Navegador Web (RECOMENDADA - Más Fácil)

### Pasos:

1. **Abrir el archivo HTML en tu navegador:**
   ```
   c:\Users\Dell\OneDrive\Desktop\LARAVEL\sistema-reportes-infraestructura\documentacion\SRS_DOCUMENTACION.html
   ```

2. **Presiona `Ctrl + P`** (o ve a Archivo → Imprimir)

3. **Configura las opciones de impresión:**
   - **Destino:** Guardar como PDF
   - **Tamaño de papel:** Carta (Letter) o A4
   - **Márgenes:** Predeterminados o Mínimos
   - **Escala:** 100% o Ajustar a página
   - **Gráficos de fondo:** ✅ Activado (importante para colores y estilos)

4. **Haz clic en "Guardar"** y selecciona la ubicación

---

## Opción 2: Usando Microsoft Word

### Pasos:

1. **Abrir Microsoft Word**

2. **Abrir el archivo Markdown:**
   - Ve a Archivo → Abrir
   - Selecciona `SRS_COMPLETO.md`
   - Word convertirá el Markdown a formato editable

3. **Ajustar formato según requisitos:**
   - Fuente: Arial o Times New Roman, tamaño 12
   - Títulos: Negrita, tamaño 14-16
   - Subtítulos: Negrita, tamaño 12-14
   - Interlineado: 1.5 líneas
   - Márgenes: 2.54 cm (1 pulgada) todos los lados
   - Justificación: Completa
   - Sangría: 1.27 cm en primera línea de párrafos

4. **Insertar imágenes manualmente:**
   - Logo del ITSC en la portada
   - Diagramas en la Sección 10
   - Mockups en la Sección 12

5. **Agregar numeración de páginas:**
   - Insertar → Número de página → Pie de página → Centrado

6. **Guardar como PDF:**
   - Archivo → Guardar como → Tipo: PDF

---

## Opción 3: Usando Pandoc (Herramienta de Línea de Comandos)

### Requisitos:
- Instalar Pandoc: https://pandoc.org/installing.html

### Comandos:

```bash
# Navega a la carpeta de documentación
cd c:\Users\Dell\OneDrive\Desktop\LARAVEL\sistema-reportes-infraestructura\documentacion

# Convertir Markdown a PDF (requiere LaTeX instalado)
pandoc SRS_COMPLETO.md -o SRS_DOCUMENTACION.pdf --pdf-engine=xelatex -V geometry:margin=1in

# O convertir a DOCX primero y luego a PDF
pandoc SRS_COMPLETO.md -o SRS_DOCUMENTACION.docx
# Luego abre el DOCX en Word y guarda como PDF
```

---

## Opción 4: Usando Herramientas Online

### Sitios web gratuitos:

1. **Markdown a PDF:**
   - https://markdowntopdf.com/
   - https://www.markdownpdf.com/
   - https://dillinger.io/ (editor online con export a PDF)

2. **HTML a PDF:**
   - https://www.html2pdf.com/
   - https://sejda.com/html-to-pdf
   - https://www.pdfcrowd.com/

### Pasos:
1. Sube el archivo `SRS_COMPLETO.md` o `SRS_DOCUMENTACION.html`
2. Configura el tamaño de página (Carta/A4)
3. Configura márgenes (2.54 cm / 1 pulgada)
4. Descarga el PDF generado

---

## Opción 5: Usando Visual Studio Code

### Extensiones recomendadas:

1. **Markdown PDF** (ysugimoto.markdown-pdf)
   - Instala la extensión desde VS Code Marketplace
   - Abre `SRS_COMPLETO.md`
   - Click derecho → Markdown PDF: Export (pdf)

2. **Print Code**
   - Permite imprimir con formato personalizado

### Pasos con Markdown PDF:
1. Instala la extensión "Markdown PDF"
2. Abre el archivo `SRS_COMPLETO.md`
3. Presiona `F1` y busca "Markdown PDF: Export (pdf)"
4. El PDF se generará en la misma carpeta

---

## Configuración Recomendada para el PDF

### Formato:
| Parámetro | Valor |
|-----------|-------|
| Tamaño de papel | Carta (Letter) o A4 |
| Márgenes | 2.54 cm (1 pulgada) |
| Orientación | Vertical (excepto tablas anchas: Horizontal) |
| Fuente | Arial o Times New Roman |
| Tamaño fuente | 12 pt |
| Interlineado | 1.5 líneas |

### Elementos a Incluir:
- ✅ Logo del ITSC en portada
- ✅ Numeración de páginas (pie de página, centrado)
- ✅ Encabezado con título del proyecto
- ✅ Tabla de contenido automática
- ✅ Saltos de página entre secciones principales
- ✅ Todas las tablas con bordes visibles
- ✅ Espacios para imágenes marcados

---

## Verificación del PDF Generado

Antes de entregar, verifica:

- [ ] Las 15 secciones están presentes
- [ ] La portada tiene el logo del ITSC
- [ ] Los datos del estudiante están completos
- [ ] La numeración de páginas es correcta
- [ ] Las tablas son legibles
- [ ] Los saltos de página son apropiados
- [ ] El formato es consistente en todo el documento
- [ ] El tamaño del archivo es razonable (< 10 MB)

---

## Solución de Problemas

### Problema: El PDF sale sin colores
**Solución:** Activa la opción "Gráficos de fondo" en la configuración de impresión

### Problema: Las tablas se cortan entre páginas
**Solución:** En Word, selecciona la tabla → Propiedades → Fila → Desmarca "Permitir dividir filas entre páginas"

### Problema: La numeración no aparece
**Solución:** Inserta manualmente: Insertar → Número de página → Pie de página

### Problema: El archivo es muy grande
**Solución:** Comprime el PDF usando herramientas como:
- https://www.ilovepdf.com/compress_pdf
- https://smallpdf.com/compress-pdf

---

## Entrega Final

Carpeta de entrega sugerida:

```
ENTREGA_SOF111_2026-1/
├── DOCUMENTACION/
│   ├── SRS_DOCUMENTACION.pdf    ← Documento principal
│   ├── SRS_COMPLETO.md          ← Versión Markdown
│   └── SRS_DOCUMENTACION.html   ← Versión HTML
├── CODIGO/
│   └── (todo el proyecto Laravel)
├── BASE_DE_DATOS/
│   └── script_sql.sql
└── README_ENTREGA.txt
```

---

*Documento de instrucciones generado el 31 de marzo de 2026*
