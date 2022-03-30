<?php
    if(!isset($_GET['id'])){
        header("location: ../index.php");
    }else{
        obtenerNoticia($_GET['id']);
    }
    function obtenerNoticia($id){
        include '../config/bd.php';
        $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias WHERE id = :id;");
        $sentenciaSQL->bindParam(':id',$id);
        $sentenciaSQL->execute();
        $noticia = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $output = "";
        $output .= "<div class='col-12'><h3>".$noticia['titulo']."</h3></div>";
        $output .= "<div class='col-auto'><span class='fw-bold'>Autor: </span><span>".$noticia['autor']."</span></div>";
        $output .= "<div class='col-auto'><span class='fw-bold'>Fecha :</span><span>".$noticia['fecha']."</span></div>";
        $output .= "<div class='col-md-12 mt-2'>".$noticia['contenido']."</div>";
        echo $output;
    }
        
?>