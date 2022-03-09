<?php
    include("../config/bd.php");
    include("guardarNoticias.php");

    $nombreFeed = (isset($_POST['nombreFeed'])) ? $_POST['nombreFeed']:"";
    $urlFeed = (isset($_POST['urlFeed'])) ? $_POST['urlFeed']:"";
    $categoriaFeed = (isset($_POST['categoriaFeed'])) ? $_POST['categoriaFeed']:"";

    $sentenciaSQL = $conexion->prepare("INSERT INTO feeds (nombre, url, categoria) VALUES (:nombreFeed, :urlFeed, :categoriaFeed);");
    $sentenciaSQL->bindParam(':nombreFeed', $nombreFeed);
    $sentenciaSQL->bindParam(':urlFeed', $urlFeed);
    $sentenciaSQL->bindParam(':categoriaFeed', $categoriaFeed);
    $sentenciaSQL->execute();

    $sentenciaSQL = $conexion->prepare("SELECT id FROM feeds WHERE url = :urlFeed");
    $sentenciaSQL->bindParam(':urlFeed',$urlFeed);
    $sentenciaSQL->execute();
    $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    guardarNoticias($feed['id'], generarFeed($urlFeed));
?>