# 🍕 FoodExpress – Proyecto PLP3

**Alumno:** Lautaro Yamil Bruera  
**Carrera:** Ingeniería en Sistemas de Información  
**Cátedra:** Paradigmas y Lenguajes de Programación III  
**Profesor:** Mgter. Ing. Agustín Encina  
**Año:** 2025  
**Ruta elegida:** A  
**Proyecto:** B – FoodExpress

---

## 🧩 Descripción general

**FoodExpress** es un sistema web de pedidos online desarrollado como evaluación del **Parcial Interactivo de PLP III**.  
Permite visualizar un menú de productos, agregar elementos a un carrito dinámico y registrar pedidos en una base de datos MySQL.

El desarrollo fue realizado siguiendo las consignas del examen:
- Nomenclatura con prefijo `lyb_` (Lautaro Yamil Bruera).  
- Estructura modular con separación de capas (frontend, backend y BD).  
- Interactividad completa con JavaScript.  
- Conexión PHP–MySQL usando **PDO y consultas preparadas**.  
- Diseño responsive y accesible con CSS3.

---

## ⚙️ Instalación y ejecución

### 1️⃣ Requisitos
- **XAMPP** (Apache + MySQL)
- **PHP 8+**
- **Navegador moderno (Chrome, Edge, Firefox)**

### 2️⃣ Configuración
1. Copiar la carpeta del proyecto dentro de `C:\xampp\htdocs\`
C:\xampp\htdocs\lyb_Parcial_PLP3\
2. Iniciar **Apache** y **MySQL** desde el panel de XAMPP.
3. Ingresar a [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
4. Crear la base de datos importando los archivos:
- `database/lyb_estructura.sql`
- `database/lyb_datos.sql`
5. Acceder al proyecto desde el navegador:
http://localhost/lyb_Parcial_PLP3/

---

## 🗄️ Base de datos

**Nombre:** `lyb_parcial_plp3`

### Tablas:
- `lyb_productos`: Catálogo de productos (nombre, categoría, precio, imagen).
- `lyb_pedidos`: Cabecera de cada pedido (cliente, teléfono, total).
- `lyb_detalle_pedido`: Relación productos–pedidos (cantidad, subtotal).

Relaciones:
- `lyb_detalle_pedido.id_pedido` → `lyb_pedidos.id_pedido`
- `lyb_detalle_pedido.id_producto` → `lyb_productos.id_producto`

---

## 💻 Estructura de carpetas
lyb_Parcial_PLP3/
├── index.php
├── lyb_guardar_pedido.php
├── css/
│ └── lyb_estilos.css
├── js/
│ └── lyb_script.js
├── includes/
│ └── lyb_conexion.php
├── lyb_assets/
│ ├── images/
│ └── icons/
├── database/
│ ├── lyb_estructura.sql
│ └── lyb_datos.sql
├── docs/
│ └── Bruera_Lautaro_Parcial.pdf
└── README.md

---

## 🎯 Funcionalidades principales

| Nivel | Descripción | Lenguaje / Tecnología |
|-------|--------------|-----------------------|
| **Nivel 1** | Estructura del proyecto, BD y prefijos `lyb_` | SQL, PHP |
| **Nivel 2** | Carrito dinámico (agregar, eliminar, total) | JavaScript |
| **Nivel 3** | Registro de pedidos en base de datos | PHP + PDO |
| **Nivel 4** | Diseño responsive y UX con paleta coherente | CSS3 |

---

## 🎨 Diseño y UX

- **Paleta:** Rojo (#C0392B), Naranja (#E67E22), Amarillo (#F1C40F), Gris claro (#F8F9F9), Gris oscuro (#2C3E50).  
- **Tipografía:** Poppins (Google Fonts).  
- **Responsive:** 3 breakpoints (992px, 768px, 480px).  
- **Transiciones:** suaves en botones y tarjetas.  
- **Accesibilidad:** `:focus`, contraste y botones visibles.

---

## 🔒 Seguridad

- Uso de **PDO con consultas preparadas** en `lyb_guardar_pedido.php` para evitar inyección SQL.  
- Validación de datos del formulario antes de ejecutar las inserciones.

---

## 🏁 Créditos

Desarrollado por **Lautaro Yamil Bruera**  
Universidad de la Cuenca del Plata – Sede Posadas (Misiones, Argentina)

---

