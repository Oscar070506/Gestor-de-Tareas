CREATE DATABASE gestor_tareas;
USE gestor_tareas;

CREATE TABLE tareas (
    id INT PRIMARY KEY,
    TITLE VARCHAR(255) NOT NULL,
    EXPLANATION VARCHAR(255),
    COMPLETE BINARY(1)
);

INSERT INTO tareas (id, TITLE, EXPLANATION, COMPLETE) VALUES
    (1, 'Comprar alimentos', 'Comprar frutas, verduras y leche', FALSE),
    (2, 'Enviar correo', 'Enviar informe semanal al jefe', TRUE),
    (3, 'Llamar a cliente', 'Confirmar detalles del proyecto', FALSE),
    (4, 'Revisar reporte', 'Analizar resultados del último trimestre', FALSE),
    (5, 'Planificar reunión', 'Organizar agenda para la reunión del viernes', TRUE),
    (6, 'Actualizar sitio web', 'Agregar nuevas secciones y corregir errores', FALSE),
    (7, 'Pagar facturas', 'Pagar servicios de internet y electricidad', TRUE),
    (8, 'Hacer backup', 'Realizar copia de seguridad de la base de datos', FALSE),
    (9, 'Preparar presentación', 'Crear diapositivas para la conferencia', FALSE),
    (10, 'Limpiar escritorio', 'Organizar y limpiar el espacio de trabajo', TRUE);
