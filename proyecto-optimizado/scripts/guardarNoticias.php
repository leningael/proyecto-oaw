<?php
 goto U0Ht0; U0Ht0: function generarFeed($url) { require_once "\56\56\x2f\154\151\142\x73\x2f\163\151\x6d\x70\154\145\x70\151\x65\55\x31\x2e\x35\56\x38\57\141\165\x74\157\154\x6f\x61\x64\x65\162\x2e\160\x68\x70"; $feed = new SimplePie(); $feed->set_feed_url($url); $feed->enable_cache(); $feed->init(); return $feed; } goto GsSWy; GsSWy: function guardarNoticias($id_feed, $feed) { include "\x2e\x2e\57\143\157\156\146\151\147\x2f\x62\x64\x2e\x70\x68\x70"; foreach ($feed->get_items() as $item) { $titulo = $item->get_title(); if ($item->get_author() !== null) { $autor = $item->get_author()->get_name(); } else { $autor = "\x4e\101"; } $fecha = $item->get_date("\131\55\x6d\55\x64\x20\110\72\x69\x3a\163"); $contenido = $item->get_content(); $link = $item->get_permalink(); $imgURL = ''; if ($item->get_enclosure(0)->get_link() !== null) { $imgURL = $item->get_enclosure(0)->get_link(); } else { $imgURL = $item->get_feed()->get_image_url(); } $sentenciaSQL = $conexion->prepare("\111\116\x53\105\x52\124\40\x49\x4e\124\117\x20\x6e\x6f\x74\x69\x63\151\141\x73\x20\50\x69\144\x5f\x66\x65\x65\x64\54\40\164\151\164\165\x6c\x6f\x2c\x20\x61\x75\164\157\162\x2c\x20\x66\x65\143\x68\141\54\40\x63\157\x6e\164\x65\x6e\151\144\157\54\x20\x69\x6d\x61\x67\x65\x6e\x2c\40\154\151\156\153\51\40\12\x20\40\x20\40\40\x20\40\40\x20\x20\x20\40\40\x20\x20\x20\x20\40\x20\40\40\40\40\40\40\40\40\40\40\40\40\40\x20\40\x20\x20\40\x20\40\x20\x20\x20\40\40\40\x20\40\40\x20\40\x20\40\x20\x20\40\40\x20\40\40\40\x56\101\x4c\x55\x45\x53\x20\x28\72\x69\144\x46\x65\145\144\54\x3a\164\151\x74\x75\154\157\54\x3a\141\165\x74\x6f\x72\54\x3a\146\145\x63\x68\141\54\x3a\143\x6f\156\164\x65\156\x69\144\157\x2c\x3a\151\155\x61\x67\145\156\x2c\x3a\x6c\x69\x6e\153\x29\73"); $sentenciaSQL->bindParam("\72\151\144\x46\145\145\x64", $id_feed); $sentenciaSQL->bindParam("\x3a\x74\151\164\x75\x6c\x6f", $titulo); $sentenciaSQL->bindParam("\x3a\x61\165\164\157\162", $autor); $sentenciaSQL->bindParam("\72\x66\145\x63\150\141", $fecha); $sentenciaSQL->bindParam("\72\143\157\156\x74\x65\156\x69\144\x6f", $contenido); $sentenciaSQL->bindParam("\72\151\x6d\x61\147\x65\156", $imgURL); $sentenciaSQL->bindParam("\x3a\x6c\151\x6e\x6b", $link); $sentenciaSQL->execute(); } } goto l0m8q; l0m8q: ?>