<?php
 goto RXchy; GLJkU: $urlFeed = isset($_POST["\165\x72\x6c\x46\145\145\x64"]) ? $_POST["\165\162\154\x46\145\145\144"] : ''; goto KmG5k; KmG5k: $categoriaFeed = isset($_POST["\143\x61\164\x65\x67\x6f\x72\x69\x61\x46\145\x65\144"]) ? $_POST["\143\x61\x74\145\x67\x6f\162\151\141\x46\x65\x65\144"] : ''; goto xlR5H; CQDga: include "\x2e\56\x2f\154\x69\142\x73\x2f\x73\x69\155\x70\x6c\x65\x70\151\x65\x2d\x31\x2e\x35\56\70\57\141\165\164\x6f\x6c\x6f\141\144\x65\162\x2e\x70\x68\160"; goto eikiy; wGxrH: guardarNoticias($feed["\151\144"], generarFeed($urlFeed)); goto JD6d_; wiRgv: include "\x67\x75\x61\162\x64\141\162\116\157\164\x69\143\151\x61\163\56\160\x68\160"; goto CQDga; WthEA: $sentenciaSQL->bindParam("\72\165\x72\x6c\x46\145\145\144", $urlFeed); goto WrqqE; fKXyz: $sentenciaSQL->bindParam("\x3a\x6e\157\x6d\142\162\145\x46\145\x65\144", $nombreFeed); goto WthEA; GHedc: $sentenciaSQL = $conexion->prepare("\111\116\x53\105\x52\124\x20\111\x4e\x54\x4f\x20\x66\145\145\x64\x73\x20\x28\156\x6f\155\x62\162\x65\54\40\x75\x72\x6c\x2c\x20\x63\141\x74\x65\x67\x6f\162\x69\141\54\x20\154\x6f\147\x6f\51\40\x56\101\114\x55\105\x53\x20\50\x3a\156\x6f\x6d\x62\162\x65\x46\145\145\144\54\40\72\x75\x72\x6c\106\x65\145\x64\x2c\40\72\x63\141\164\145\147\x6f\162\151\141\106\145\x65\x64\54\40\x3a\154\157\x67\x6f\x46\x65\145\144\51\73"); goto fKXyz; eikiy: $nombreFeed = isset($_POST["\x6e\x6f\155\142\x72\x65\x46\x65\x65\x64"]) ? $_POST["\x6e\x6f\x6d\142\162\x65\106\x65\145\x64"] : ''; goto GLJkU; JD6d_: header("\x4c\x6f\143\x61\x74\x69\157\x6e\72\40\x2e\56\57\x69\x6e\x64\145\170\x2e\x70\x68\160"); goto dD6PB; dH6Lu: $sentenciaSQL->bindParam("\x3a\165\x72\154\x46\145\x65\144", $urlFeed); goto QQlgY; MEWMm: $sentenciaSQL->execute(); goto F5XG7; QQlgY: $sentenciaSQL->execute(); goto XGNpI; WrqqE: $sentenciaSQL->bindParam("\72\x63\141\164\145\x67\x6f\x72\x69\141\106\x65\x65\144", $categoriaFeed); goto uMzPx; F5XG7: $sentenciaSQL = $conexion->prepare("\x53\x45\114\x45\x43\124\40\151\x64\40\106\x52\x4f\x4d\x20\x66\x65\x65\x64\x73\x20\x57\110\105\122\x45\40\165\x72\154\x20\75\40\x3a\165\162\x6c\106\145\x65\144"); goto dH6Lu; qL4bF: $logoFeed = $feed->get_image_url(); goto GHedc; XGNpI: $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY); goto wGxrH; uMzPx: $sentenciaSQL->bindParam("\72\154\157\147\157\x46\x65\x65\144", $logoFeed); goto MEWMm; xlR5H: $feed = generarFeed($urlFeed); goto qL4bF; RXchy: include "\56\x2e\57\x63\157\156\x66\x69\147\x2f\142\x64\56\x70\150\160"; goto wiRgv; dD6PB: ?>