<?php
 if (!isset($_GET["\x69\x64"])) { header("\x6c\x6f\143\141\x74\x69\x6f\x6e\72\x20\56\56\57\151\156\144\145\170\56\x70\150\x70"); } else { include "\x2e\x2e\x2f\x63\157\156\146\151\147\57\x62\144\x2e\160\x68\160"; $sentenciaSQL = $conexion->prepare("\104\x45\114\x45\x54\x45\40\106\x52\117\115\x20\x66\x65\145\x64\x73\40\127\x48\x45\122\105\x20\151\x64\x3d" . $_GET["\151\144"] . "\x3b"); $sentenciaSQL->execute(); header("\x6c\157\x63\141\x74\x69\x6f\x6e\72\40\56\56\57\141\144\155\x69\x6e\x69\163\164\x72\x61\x72\x46\145\145\x64\x73\x2e\x70\150\160"); } ?>