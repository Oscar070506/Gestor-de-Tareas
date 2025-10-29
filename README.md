# 🗂️ Gestor de Tareas (PHP + MySQL)

Un sencillo gestor de tareas por consola desarrollado en **PHP** con conexión a **MySQL**, que permite **crear, editar, eliminar, listar y marcar tareas** como completadas. Este proyecto implementa un sistema **CRUD** (Create, Read, Update, Delete) para la gestión de tareas. Se ejecuta directamente desde la terminal (CLI) y utiliza una base de datos MySQL para almacenar la información.

El proyecto está compuesto por los siguientes archivos:

- **Gestor.php**: controlador principal con el menú de opciones.  
- **CRUD.php**: clase con las operaciones sobre la base de datos.  
- **connection.php**: archivo de conexión con MySQL.  
- **gestor_tareas.sql**: script SQL para crear la base de datos y la tabla.

### Requisitos

- PHP 8.0 o superior  
- MySQL o MariaDB  
- Extensión `mysqli` habilitada  
- Acceso a una terminal para ejecutar el script  

### Instalación

1. Clona el repositorio o descarga los archivos del proyecto.  
2. Crea la base de datos ejecutando el script SQL en MySQL o phpMyAdmin:

   sql
   SOURCE gestor_tareas.sql;
Esto creará la base de datos gestor_tareas y la tabla tareas con algunos registros de ejemplo.

Configura la conexión en el archivo connection.php, por ejemplo:

 - php
 - Copiar código
 - $servername = "localhost:3307";
 - $username = "root";
 - $password = "";
 - Ajusta estos valores según tu entorno local.

Ejecuta la aplicación desde la terminal con:

 - bash
 - Copiar código
 - php Gestor.php
 - Menú de Opciones


### Funcionalidades:

 - Crear una tarea: inserta una nueva tarea en la base de datos.

 - Borrar una tarea: elimina una tarea existente por su ID.

 - Editar una tarea: modifica título, descripción y estado.

 - Marcar una tarea: marca una tarea como completada.

 - Listar tareas: muestra todas las tareas registradas.

 - Salir: finaliza la ejecución del programa.

### Estructura de la Base de Datos

Base de datos: gestor_tareas
Tabla: tareas

Columna         Tipo	          Descripción
id	             INT (PK)	    Identificador único de la tarea
TITLE	          VARCHAR(255)	 Título o nombre de la tarea
EXPLANATION	    VARCHAR(255)	 Descripción o detalle de la tarea
COMPLETE	       BOOLEAN(1)	    Estado de la tarea (0 = pendiente, 1 = completada)







