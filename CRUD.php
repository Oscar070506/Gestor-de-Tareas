<?php

class CRUD{

    //  3.1 Se borra la tarea con el id pasado como parametro dentro de la BBDD.
    //      En caso de no existir tarea con dicha id, saltaría un mensaje aclarándolo.
    //      Definimos los parametros -> $id (INT)
    public function delTask($id){
        require_once('connection.php');

        //  3.1.1 Definimos la consulta a la BBDD que,  
        //        en caso de no poder hacers, saltaría un error.
        $stmt = $conn->prepare("DELETE FROM tareas WHERE id = ?");

        if(!$stmt){
            die('Error ejecutando la preparación' . $conn->error);
        }

        //  3.1.2 Definimos los parametros -> $id(INT).
        $stmt -> bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea con ID $id eliminada correctamente.";
        } else {
            echo "Error al eliminar la tarea: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

    }

    //  3.2 Inserta una tarea con sus debidos parametros a la BBDD.
    //      En caso de coincidir el id de la tarea que se quiere añadir 
    //      con otra existente en la BBDD, es esta la que tiene prioridad 
    //      dentro de la misma. 
    //      Definimos los parametros -> $id(INT), $description(STR), $explanation(STR) y $state(BOOLEAN).
    public function addTask($id, $title, $explanation, $state){
        require_once('connection.php');

        $stmt = $conn->prepare("INSERT INTO tareas (id, TITLE, EXPLANATION, COMPLETE) values (?,?,?,?)");

        if(!$stmt){
            die('Error insertando la Tarea' . $id . ' ' . $conn->error);
        }
       
        //  3.2.2 Comprobamos que el id de la tarea que queremos añadir
        //        no coincide con uno ya existente.
        $check = $conn -> prepare("SELECT id FROM tareas WHERE id = ?");
        $check -> bind_param("i", $id);
        $check -> execute();
        $check -> store_result(); //    3.2.3 Guardamos las filas afectadas para poder contar resultados.

        $stmt -> bind_param("issb", $id, $title, $explanation, $state);

        if($check -> num_rows > 0){
            echo "Ya existe una tarea con dicho ID. No se ha podido añadir.";

        } else {
            if ($stmt->execute()) {
                echo "Tarea con ID $id añadida correctamente.";
            } else {
                echo "Error al añadir la tarea: " . $stmt->error;
            }

            $check->close();
        }

        $check->close();

        if ($stmt->execute()) {
            echo "Tarea con ID $id añadida correctamente.";
        } else {
            echo "Error al añadir la tarea: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    //  3.3 Se selecciona una tarea con el id pasado como parámetro dentro de la BBDD
    //      que, en caso de coincidir, nos permite hacer un UPDATE() a la misma cambiando
    //      todos los parametros que no sean el id.
    //      Definimos los parametros -> $title (STR), $explanation (STR), $state (BOOLEAN), $id (INT)
    public function editTask($id, $title, $explanation, $state){
        require_once('connection.php');

        $stmt = $conn->prepare("UPDATE tareas SET TITLE = ?, EXPLANATION = ?, COMPLETE = ? WHERE id = ?");

        if(!$stmt){
            die('Error ejecutando la preparacion' . $conn->error);
        }

        $stmt -> bind_param("ssbi", $title, $explanation, $state, $id);

        if ($stmt->execute()) {
            echo "Tarea con ID $id editada correctamente.";
        } else {
            echo "Error al editarla tarea: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

    }

    //  3.4 Se selecciona una tarea con el id pasado como parámetro dentro de la BBDD.
    //      cambiando su parametro COMPLETE a TRUE (1) en caso de ser inicialmente 
    //      FALSE (0).
    //      Definimos los parametros -> $id (INT)
    public function markTask($id){
        require_once('connection.php');

        $stmt = $conn->prepare("UPDATE tareas SET COMPLETE = 1 WHERE id = ?");

        if(!$stmt){
            die('Error ejecutando la preparacion' . $conn->error);
        }

        $stmt -> bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Tarea con ID $id completada.";
        } else {
            echo "Error al marcar como completada la tarea: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

    }

    //  3.5 Lista todas las Tareas dentro de la BBDD ordenadas por el id.
    //      Definimos los parametros -> $id (INT)
    public function listTasks(){
        require_once('connection.php');

        $stmt = $conn -> prepare("SELECT * FROM tareas ORDER BY ?");

        if(!$stmt){
            die('Error ejecutando la preparacion' . $conn->error);
        }

        $stmt -> bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Listado de tareas completado.";
        } else {
            echo "Error al listar las tareas: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

    }
}

?>