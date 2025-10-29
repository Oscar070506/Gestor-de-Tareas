<?php

//  Enseñamos el menu con las funcionalidades del Gestor de Tareas
class Gestor extends CRUD{
    
    function showMenu(){
        echo "             GESTOR DE TAREAS\n";
        echo "===========================================\n";
        echo "\nElija una de las siguientes opciones:\n";
        echo "1. Crear una tarea\n";
        echo "2. Borrar una tarea\n";
        echo "3. Editar una tarea\n";
        echo "4. Marcar una tarea\n";
        echo "5. Listar tareas\n";
        echo "0. Apagando gestor de tareas...";
    }
    
    function startApp(){
        do {
            $this -> showMenu();

            //  Lee la opción elegida por el usuario y usamos la 
            //  función dedicada a cada caso.
            $opcion = readline("\nIntroduce una opción: ");

            switch ($opcion) {
                case 1:
                    $id = readline("ID: ");
                    $title = readline("\nTarea: ");
                    $explanation = readline("\n¿De qúe Trata la tarea?: ");
                    $state = readline("\n¿Está completada?: ");

                    $this -> addTask($id, $title, $explanation, $state);
                    break;
                case 2:
                    $id = readline("Tarea a eliminar: ");

                    $this -> delTask($id);
                    break;
                case 3:
                    $id = readline("Tarea a editar: ");
                    $title = readline("\nTítulo modificado: ");
                    $explanation = readline("\n¿De qúe Trata la Tarea modificada?: ");
                    $state = readline("\n¿Está completada?: ");

                    $this -> editTask($id, $title, $explanation, $state);
                    break;
                case 4:
                    $id = readline("Tarea a completar: ");

                    $this -> markTask($id);
                    break;
                case 5:
                    $this -> listTasks();
                    break;
                case 0:
                    echo "Saliendo del gestor...\n";
                    break;
                default:
                    echo "Opción no válida, inténtelo de nuevo.\n";
                    break;
            }

            echo "\n-------------------------------------------\n";
        } while ($opcion != 0);
    }
}

$this -> startApp();


?>