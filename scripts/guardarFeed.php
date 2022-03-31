<?php
    include("../config/bd.php");
    include("guardarNoticias.php");

    $nombreFeed = (isset($_POST['nombreFeed'])) ? $_POST['nombreFeed']:"";
    $urlFeed = (isset($_POST['urlFeed'])) ? $_POST['urlFeed']:"";
    $categoriaFeed = (isset($_POST['categoriaFeed'])) ? $_POST['categoriaFeed']:"";
    $feed = generarFeed($urlFeed);
    $logoFeed = $feed->get_image_url();
    if($feed->get_image_url() !== null){
        $logoFeed = $feed->get_image_url();
    }else{
        $logoFeed = "assets/img/foto-noticia.jpeg";
    }
    $descripcion = $feed->get_description();
    $linkFeed = $feed->get_permalink();

    $sentenciaSQL = $conexion->prepare("INSERT INTO feeds (nombre, url, categoria, logo, descripcion, linkFeed) VALUES (:nombreFeed, :urlFeed, :categoriaFeed, :logoFeed, :descripcion, :linkFeed);");
    $sentenciaSQL->bindParam(':nombreFeed', $nombreFeed);
    $sentenciaSQL->bindParam(':urlFeed', $urlFeed);
    $sentenciaSQL->bindParam(':categoriaFeed', $categoriaFeed);
    $sentenciaSQL->bindParam(':logoFeed', $logoFeed);
    $sentenciaSQL->bindParam(':descripcion', $descripcion);
    $sentenciaSQL->bindParam(':linkFeed', $linkFeed);
    $sentenciaSQL->execute();

    $sentenciaSQL = $conexion->prepare("SELECT id FROM feeds WHERE url = :urlFeed");
    $sentenciaSQL->bindParam(':urlFeed',$urlFeed);
    $sentenciaSQL->execute();
    $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    guardarNoticias($feed['id'], generarFeed($urlFeed));
    header("Location: ../index.php");
?>