<?php
 goto zDzEV; swGs3: function obtenerNoticia($id) { include "\56\56\57\x63\x6f\x6e\146\x69\147\x2f\142\x64\x2e\x70\150\160"; $sentenciaSQL = $conexion->prepare("\x53\x45\x4c\x45\103\124\x20\x2a\40\106\x52\x4f\x4d\x20\156\x6f\x74\151\143\151\x61\163\40\x57\110\105\122\x45\x20\x69\x64\x20\75\x20\x3a\x69\144\x3b"); $sentenciaSQL->bindParam("\x3a\151\144", $id); $sentenciaSQL->execute(); $noticia = $sentenciaSQL->fetch(PDO::FETCH_LAZY); $output = ''; $output .= "\74\x64\151\x76\40\143\154\141\x73\x73\75\47\x63\x6f\154\x2d\61\62\x27\76\74\150\x33\76" . $noticia["\x74\x69\x74\165\x6c\157"] . "\74\x2f\150\x33\76\x3c\x2f\144\151\x76\76"; $output .= "\x3c\x64\x69\166\40\x63\x6c\141\x73\163\x3d\x27\x63\157\x6c\x2d\141\165\164\x6f\x27\x3e\x3c\x73\160\x61\x6e\40\143\x6c\x61\x73\x73\75\47\146\x77\55\142\157\x6c\144\x27\76\x41\165\164\157\162\x3a\x20\74\x2f\x73\x70\141\x6e\x3e\74\163\x70\x61\156\76" . $noticia["\141\x75\x74\157\x72"] . "\74\57\x73\160\141\156\x3e\x3c\x2f\144\151\166\x3e"; $output .= "\x3c\x64\151\166\40\143\154\141\x73\x73\75\x27\x63\x6f\154\55\x61\x75\x74\157\x27\76\74\x73\x70\141\156\40\143\154\x61\163\163\75\x27\x66\167\x2d\x62\x6f\x6c\144\47\x3e\106\145\143\x68\141\x20\72\x3c\57\x73\160\x61\156\76\x3c\x73\x70\141\x6e\x3e" . $noticia["\x66\145\x63\x68\141"] . "\74\57\x73\x70\x61\156\76\74\57\144\x69\166\x3e"; $output .= "\x3c\144\151\166\x20\x63\154\141\x73\163\x3d\x27\x63\x6f\x6c\x2d\155\x64\55\61\62\40\155\x74\x2d\62\47\76" . $noticia["\x63\157\156\x74\145\156\x69\x64\157"] . "\74\x2f\x64\x69\166\x3e"; echo $output; } goto zPIQN; zDzEV: if (!isset($_GET["\x69\x64"])) { header("\154\157\x63\141\164\x69\157\x6e\x3a\x20\x2e\x2e\x2f\151\x6e\144\145\170\56\x70\150\x70"); } else { obtenerNoticia($_GET["\x69\144"]); } goto swGs3; zPIQN: ?>