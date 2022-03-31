<?php
    include("../config/bd.php");
    include("guardarNoticias.php");

    $sentenciaSQL= $conexion->prepare("DELETE FROM noticias");
    $sentenciaSQL->execute();

    $sentenciaSQL= $conexion->prepare("SELECT * FROM feeds");
    $sentenciaSQL->execute();
    $listaFeeds= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    foreach ($listaFeeds as $feed){
        guardarNoticias($feed['id'], generarFeed($feed['url']));
    }
    header("Location: ".$_SERVER["HTTP_REFERER"]);
?>