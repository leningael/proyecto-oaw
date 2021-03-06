<?php
    include '../config/bd.php';
    $option=$_GET['order'];
    if(!isset($_GET['feed'])){
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
    }else{
        $sentenciaSQL = $conexion->prepare("SELECT id FROM feeds WHERE nombre = :nombre");
        $sentenciaSQL->bindParam(':nombre', $_GET['feed']);
        $sentenciaSQL->execute();
        $datosFeed = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        switch ($option){
            case 'titleFirst':
                $sentenciaSQL = $conexion->prepare("SELECT * FROM noticias WHERE id_feed = '".$datosFeed['id']."' ORDER BY titulo ASC");
                break;
            case 'oldFirst':
                $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias WHERE id_feed = '".$datosFeed['id']."' ORDER BY fecha ASC");
                break;
            case 'newFirst':
                $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias WHERE id_feed = '".$datosFeed['id']."' ORDER BY fecha DESC");
                break;
            case 'authorFirst':
                $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias WHERE id_feed = '".$datosFeed['id']."' ORDER BY autor  ASC");
                break;
            default:
                $sentenciaSQL= $conexion->prepare("SELECT * FROM noticias WHERE id_feed = '".$datosFeed['id']."'");
                break;
        }
    }
    $sentenciaSQL->execute();
    $listaNoticias= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach($listaNoticias as $noticia){
        $output .= '<div class="col-md-6 col-lg-4 col-xxl-3 mb-4 col-per card-news">';
        $output .= '<button class="opnButton text-decoration-none text-dark h-100" style="background-color: transparent;border-color: transparent;" id="'.$noticia['id'].'">';
        $output .= '<div class="card h-100">';
        $output .= '<img src="'.$noticia['imagen'].'" class="card-img-top" alt="Foto noticia" loading="lazy">';
        $output .= '<div class="card-body">';
        $output .= '<p class="card-title h5">'.$noticia['titulo'].'</p>';
        $sentenciaSQL = $conexion->prepare("SELECT * FROM feeds WHERE id = :idFeed");
        $sentenciaSQL->bindParam(':idFeed',$noticia['id_feed']);
        $sentenciaSQL->execute();
        $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY); 
        $output .= '<a href="'.$feed['linkFeed'].'" class="text-decoration-none me-1">';
        $output .= $feed['nombre'].'</a> <small>';
        /* Fecha */
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date("Y-m-d H:i:s");
        $fechaNoticia = $noticia['fecha'];
        $datetime1 = date_create($fechaNoticia);
        $datetime2 = date_create($fechaActual);
        $intervalo = date_diff($datetime1, $datetime2);
        $diasAntiguedad = $intervalo->format('%a');
        $horasAntiguedad = $intervalo->format('%h');
        if($diasAntiguedad>1){
            $differenceFormat = 'hace %d d??as';
        }else if($diasAntiguedad==1){
            $differenceFormat = 'Ayer';
        }else{
            if($horasAntiguedad>1){
                $differenceFormat = 'hace %h horas';
            }else if($horasAntiguedad==1){
                $differenceFormat = 'hace %h hora';
            }else{
                $differenceFormat = 'hace %i minutos';
            }
        }
        $output .= $intervalo->format($differenceFormat);
        $output .= '</small></div></div></button></div>';
    };
    echo $output;
?>