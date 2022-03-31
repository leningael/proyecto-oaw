<?php
    include 'config/bd.php';
    $sql = $conexion->prepare("SELECT DISTINCT categoria FROM feeds");
    $sql->execute();
    $listaCategorias = $sql->fetchAll(PDO::FETCH_ASSOC);
    $cantArticulos = 8;
    $mayorNoticias = 0;
    if(!$_GET){
        header('Location:index.php?pagina=1');
    }
    if($_GET['pagina'] < 1){
        header('Location:index.php?pagina=1');
    }
    /* $sql = $conexion->prepare("SELECT * FROM noticias");
    $sql->execute();
    $listaNoticias = $sql->fetchAll(PDO::FETCH_ASSOC); */
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Lector de Feeds</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="nav-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Lector de Feeds</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="administrarFeeds.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Administrar Feeds
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="administrarFeeds.php">Agregar feed</a></li>
                  <li><a class="dropdown-item" href="administrarFeeds.php">Eliminar feed</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cuenta</a>
              </li>
            </ul>
            <!-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary" type="submit">Search</button>
            </form> -->
          </div>
        </div>
    </nav>
    <!-- /Navbar -->
    <!-- Contenido principal -->
    <div class="container-fluid flex-nowrap">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 text-white bg-dark p-3 min-vh-100">
                <span class="fs-4 d-block pb-1 text-center mb-2 border-bottom d-none d-inline">Menú</span>
                <ul class="nav flex-column sideNav">
                    <li>
                        <a href="index.php" class="nav-link text-white rounded">
                            <img class="align-text-top" src="assets/icons/clock.svg" alt="Recientes">
                            <span class="d-none d-sm-inline">Recientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="todasNoticias.php" class="nav-link text-white rounded">
                            <img class="align-text-top" src="assets/icons/archive.svg" alt="Recientes">
                            <span class="d-none d-sm-inline">Todas las noticias</span>
                        </a>
                    </li>
                    <div class="d-flex ps-3 my-2 gap-1">
                        <img src="assets/icons/list.svg" alt="Categorías">
                        <span class="d-none d-sm-inline">Categorías</span>
                    </div>
                    <?php  foreach($listaCategorias as $categoria){
                         $sql = $conexion->prepare("SELECT * FROM feeds WHERE categoria = :categoria");
                         $sql->bindParam(':categoria',$categoria['categoria']);
                         $sql->execute();
                         $listaFeeds = $sql->fetchAll(PDO::FETCH_ASSOC);
                         $contadorFeed = 1; 
                    ?>
                    <li>
                        <a href="" class="nav-link text-white rounded btn-toggle" data-bs-target="#categorias-collapse-<?php echo $categoria['categoria'];?>" data-bs-toggle="collapse" aria-expanded="false">
                            <span class="d-none d-sm-inline"><?php echo $categoria['categoria'];?></span>
                        </a>
                        <div class="collapse" id="categorias-collapse-<?php echo $categoria['categoria'];?>">
                            <ul class="btn-toggle-nav list-unstyled pb-1 small text-center text-sm-start">
                                <?php foreach($listaFeeds as $feed){ ?>
                                    <li><a href="noticiasFeed.php?feed=<?php echo $feed['nombre'];?>" class="nav-link text-white rounded"><?php echo $contadorFeed;?><span class="d-none d-sm-inline">. <?php echo $feed['nombre'];?></span></a></li>
                                <?php $contadorFeed++; } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /Sidebar -->
            <div class="col">
                <!-- Noticias -->
                <section id="noticias" class="mt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1>Noticias de hoy</h1>
                                <p class="lead">Las últimas noticias de tus feeds</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column align-items-start flex-md-row align-items-lg-center justify-content-lg-end h-100 mb-2">
                                    <a id="refreshNews" class="btn btn-primary my-1 me-2" href="scripts/actualizarNoticias.php">Actualizar</a>
                                </div>
                            </div>
                        </div>
                        <?php foreach($listaCategorias as $categoria){
                        $sentenciaSQL = $conexion->prepare("SELECT COUNT(*) FROM (SELECT id FROM feeds WHERE categoria = '".$categoria['categoria']."') f JOIN (SELECT * FROM noticias WHERE LEFT(fecha, 10) = CURDATE()) n ON n.id_feed=f.id");
                        $sentenciaSQL->execute();
                        $cantidadNoticias = $sentenciaSQL->fetch();
                        if($cantidadNoticias[0]>$mayorNoticias){
                            $mayorNoticias=$cantidadNoticias[0];
                        }
                        $iniciar = ($_GET['pagina']-1)*$cantArticulos;
                        $sentenciaSQL = $conexion->prepare("SELECT n.* FROM (SELECT id FROM feeds WHERE categoria = '".$categoria['categoria']."') f JOIN (SELECT * FROM noticias WHERE LEFT(fecha, 10) = CURDATE()) n ON n.id_feed=f.id ORDER BY fecha DESC LIMIT :iniciar, :cantArticulos");
                        $sentenciaSQL->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                        $sentenciaSQL->bindParam(':cantArticulos', $cantArticulos, PDO::PARAM_INT);
                        $sentenciaSQL->execute();
                        if($sentenciaSQL->rowCount()>0){
                            $listaNoticias = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="row">
                            <div class="col">
                                <h3><?php echo $categoria['categoria']?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($listaNoticias as $noticia){?>
                            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 col-per">
                                <a type="button" class="opnButton text-decoration-none text-dark" id="<?php echo $noticia['id'];?>">
                                    <div class="card h-100">
                                        <img src="<?php echo $noticia['imagen'];?>" class="card-img-top" alt="Foto noticia">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $noticia['titulo'];?></h5>
                                            <?php
                                                $sentenciaSQL = $conexion->prepare("SELECT * FROM feeds WHERE id = :idFeed");
                                                $sentenciaSQL->bindParam(':idFeed',$noticia['id_feed']);
                                                $sentenciaSQL->execute();
                                                $feed = $sentenciaSQL->fetch(PDO::FETCH_LAZY); 
                                            ?>
                                            <a href="<?php echo $feed['linkFeed'];?>" class="text-decoration-none">
                                                <?php echo $feed['nombre'];?>
                                            </a>
                                            <small>
                                                <?php
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
                                                    echo $intervalo->format($differenceFormat);
                                                ?>
                                            </small>
                                        </div>
                                    </div>                               
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } } ?>
                    </div>
                </section>
                <!-- /Noticias -->
                <?php 
                    $paginas = $mayorNoticias/$cantArticulos;
                    $paginas = ceil($paginas);
                ?>
                <div class="my-4 d-flex justify-content-center align-items-center flex-wrap">
                    <p class="me-4">Página <?php echo $_GET['pagina']; ?> de <?php echo $paginas; ?></p>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pagina']<=1?'disabled':''; ?>"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1;?>">Anterior</a></li>
                            <li class="page-item <?php echo $_GET['pagina']>=$paginas?'disabled':''; ?>"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1;?>">Siguiente</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Contenido principal -->
    <!-- Modal -->
    <div class="modal fade" id="modalNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body prueba">
                    <div class="container-fluid overflow-hidden">
                        <div class="row" id="contenidoModal">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- !Modal -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="js/index.js"></script>
    <!-- <script src="js/cargarNoticias.js"></script> -->
  </body>
</html>
