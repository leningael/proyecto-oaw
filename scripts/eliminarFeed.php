<?php 
    if(!isset($_GET['id'])){
        header("location: ../index.php");
    }else{
        include '../config/bd.php';
        $sentenciaSQL= $conexion->prepare("DELETE FROM feeds WHERE id=". $_GET['id'] .";");
        $sentenciaSQL->execute();
        header("location: ../administrarFeeds.php");
    }

?>