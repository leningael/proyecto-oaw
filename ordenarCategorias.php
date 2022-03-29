<?php
    include 'config/bd.php';
    $idFeed = $_GET['c'];
    $sentenciaSQL = $conexion->prepare("SELECT n.* FROM noticias n, feeds f WHERE f.categoria ='".$idFeed."' AND n.id_feed = f.id");
    $sentenciaSQL->execute();
    $listaNoticias= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    foreach($listaNoticias as $noticia){
        echo '<div class="card-news m-2" style="width: 300px">
                  <img class="card-img-top" src= '.$noticia['imagen'].' alt="">
                  <div class="card-body">
                  <h4 class="card-title">'.$noticia['titulo'].'</h4>
                  <p class="card-text">'.$noticia['descripcion'].'</p>
                  <a class="btn btn-primary" href='.$noticia['link'].'role="button">Leer articulo</a>
                  </div>
                  </div>';
    };


?>