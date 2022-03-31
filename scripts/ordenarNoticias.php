<?php
    include '../config/bd.php';
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
    $output = "";
    foreach($listaNoticias as $noticia){
        $output .= '<div class="col-md-6 col-lg-4 col-xxl-3 mb-4 col-per">';
        $output .= '<a type="button" class="opnButton text-decoration-none text-dark" id="'.$noticia['id'].'">';
        $output .= '<div class="card h-100">';
        $output .= '<img src="'.$noticia['imagen'].'" class="card-img-top" alt="Foto noticia">';
        $output .= '<div class="card-body">';
        $output .= '<h5 class="card-title">'.$noticia['titulo'].'</h5>';
        $output .= '<a href="#" class="text-decoration-none">';
        /* Consulta al feed */    
        $sentenciaSQL = $conexion->prepare("SELECT * FROM feeds WHERE id = :idFeed");
        $sentenciaSQL->bindParam(':idFeed',$noticia['id_feed']);
        $sentenciaSQL->execute();
        $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
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
            $differenceFormat = 'hace %d días';
        }else if($diasAntiguedad===1){
            $differenceFormat = 'Ayer';
        }else{
            if($horasAntiguedad>1){
                $differenceFormat = 'hace %h horas';
            }else if($horasAntiguedad===1){
                $differenceFormat = 'hace %h hora';
            }else{
                $differenceFormat = 'hace %i minutos';
            }
        }
        $output .= $intervalo->format($differenceFormat);
        $output .= '</small></div></div></a></div>';
    };
    echo $output;
?>