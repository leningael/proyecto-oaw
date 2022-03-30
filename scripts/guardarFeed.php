<?php
    include("../config/bd.php");
    include("guardarNoticias.php");
    include('../libs/simplepie-1.5.8/autoloader.php');

    $nombreFeed = (isset($_POST['nombreFeed'])) ? $_POST['nombreFeed']:"";
    $urlFeed = (isset($_POST['urlFeed'])) ? $_POST['urlFeed']:"";
    $categoriaFeed = (isset($_POST['categoriaFeed'])) ? $_POST['categoriaFeed']:"";
    $feed = generarFeed($urlFeed);
    $logoFeed = $feed->get_image_url();

    $sentenciaSQL = $conexion->prepare("INSERT INTO feeds (nombre, url, categoria, logo) VALUES (:nombreFeed, :urlFeed, :categoriaFeed, :logoFeed);");
    $sentenciaSQL->bindParam(':nombreFeed', $nombreFeed);
    $sentenciaSQL->bindParam(':urlFeed', $urlFeed);
    $sentenciaSQL->bindParam(':categoriaFeed', $categoriaFeed);
    $sentenciaSQL->bindParam(':logoFeed', $logoFeed);
    $sentenciaSQL->execute();

    $sentenciaSQL = $conexion->prepare("SELECT id FROM feeds WHERE url = :urlFeed");
    $sentenciaSQL->bindParam(':urlFeed',$urlFeed);
    $sentenciaSQL->execute();
    $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    guardarNoticias($feed['id'], generarFeed($urlFeed));
    header("Location: ../index.php");
?>