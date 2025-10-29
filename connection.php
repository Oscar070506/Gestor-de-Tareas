<?php 
    //  Variables de Entorno.
    $servername = "localhost:3307";
    $username = "root";
    $password = "";

    //  Conexion a la Base de Datos
    $conn = new mysqli($servername, $username, $password);

    //  Verificacion de la conexion con la Base de Datos.
    if($conn->connect_error)
        die("*Connection error*: $conn->connect_error");

    //  Seguro de la creacion de la Base de Datos: "gestor_tareas.db".
    $sql_db = "CREATE DATABASE IF NOT EXISTS gestor_tareas.db";

    //  Seleccion de la Base de Datos.
    $conn->select_db(database: "gestor_tareas.db");

    if($conn){
        echo "Te has conectado";
    } else {
        echo "No te has conectado";
    }
?> 