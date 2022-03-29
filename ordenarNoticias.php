<?php
    include 'config/bd.php';
    $option=$_GET['order'];

    switch ($option){
        case 'titleFirst':
            $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias ORDER BY titulo ASC");
            break;
        case 'oldFirst':
            $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias ORDER BY fecha ASC");
            break;
        case 'newFirst':
            $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias ORDER BY fecha DESC");
            break;
        case 'authorFirst':
            $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias ORDER BY autor  ASC");
            break;
        default:
            $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias");
            break;
    }
    $sentenciaSQL->execute();
    $listaNoticias= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    foreach($listaNoticias as $noticia){
        echo '<div class="card-news m-2" style="width: 300px">
              <img class="card-img-top" src= '.$noticia['imagen'].' alt="">
              <div class="card-body">
              <h4 class="card-title">'.$noticia['titulo'].'</h4>
              <p class="card-text">'.$noticia['descripcion'].'/p>
              <a class="btn btn-primary" href='.$noticia['link'].'role="button">Leer articulo</a>
              </div>
              </div>';
    };
?>