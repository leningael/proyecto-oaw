<?php
    function generarFeed($url){
        require_once '../libs/simplepie-1.5.8/autoloader.php';
        /* setlocale(LC_TIME, "es_MX.UTF-8", "Spanish"); */
        date_default_timezone_set("America/Mexico_City");

        //$url = 'https://www.reforma.com/rss/portada.xml';
        $feed = new SimplePie();
        $feed->set_feed_url($url);
        $feed->enable_cache();
        /* $feed->set_cache_location('../cacheFiles'); */
        $feed->init();

        return $feed;
    }

    function guardarNoticias($id_feed, $feed){
        // $impr = "";
        include("../config/bd.php");
        foreach($feed->get_items() as $item){
            $titulo = $item->get_title();
            if ($item->get_author() !== null){
                $autor = $item->get_author()->get_name();
            } else {
                $autor = "NA";
            }

            $fecha = $item->get_date('Y-m-d H:i:s');
            $contenido = $item->get_content();
            $link = $item->get_permalink();
            $imgURL = "";
            if($item->get_enclosure(0)->get_link() !== null){
                $imgURL = $item->get_enclosure(0)->get_link(); 
            }else if($item->get_feed()->get_image_url() !== null){
                $imgURL = $item->get_feed()->get_image_url();
            }else{
                $imgURL = "assets/img/foto-noticia.jpeg";
            }
            $sentenciaSQL = $conexion->prepare("INSERT INTO noticias (id_feed, titulo, autor, fecha, contenido, imagen, link) 
                                                            VALUES (:idFeed,:titulo,:autor,:fecha,:contenido,:imagen,:link);");
            $sentenciaSQL->bindParam(':idFeed', $id_feed);
            $sentenciaSQL->bindParam(':titulo', $titulo);
            $sentenciaSQL->bindParam(':autor', $autor);
            $sentenciaSQL->bindParam(':fecha', $fecha);
            $sentenciaSQL->bindParam(':contenido', $contenido);
            $sentenciaSQL->bindParam(':imagen', $imgURL);
            $sentenciaSQL->bindParam(':link', $link);
            $sentenciaSQL->execute();
        }
    }
?>