<?php
    $host="localhost";
    $bd="lector_rss";
    $usuario="root";
    $contrasenia="";

    try{
        $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasenia);
        if($conexion){
            // echo "Conectando... a sistema";
        }
    } catch( Exception $ex){
        echo $ex->getMessage();
    }
?>