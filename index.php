<?php
    include 'config/bd.php';
    $sql = $conexion->prepare("SELECT * FROM noticias");
    $sql->execute();
    $listaNoticias = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $conexion->prepare("SELECT id, categoria FROM feeds");
    $sql->execute();

?>
<!doctype html>
<html lang="es">
<head>
    <title>Inicio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">LectorRSS</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ayuda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="administrarFeeds.php" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar feeds</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="administrarFeeds.php#linkFeed">Agregar feeds</a>
                        <a class="dropdown-item" href="administrarFeeds.php#section2ContentId">Eliminar feeds</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" id="refreshNews" href="scripts/actualizarNoticias.php">Actualizar</a>
                </li>
                <li class="nav-item">
                    <select id="sortOptions" name="sortOptions" onchange="sortingNews()">
                        <option value=""> Ordenar por</option>
                        <option value="titleFirst">Título</option>
                        <option value="newFirst">Más recientes primero</option>
                        <option value="oldFirst">Más antiguos primero</option>
                        <option value="authorFirst">Autor</option>
                    </select>

                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="searchBar" name="searchBar"type="text" placeholder="Buscar noticia">
            </form>

        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group" id="categories">
                    <li><a class="list-group-item active" href="index.php">Todos</a></li>
                    <?php foreach($sql as $feed){?>
                        <li><a class="list-group-item" id=<?php echo $feed['categoria'];?> onclick="loadCategoryNews(id);">
                                <?php echo $feed['categoria'];?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-10 d-flex flex-wrap" id="newsSpace">
                <?php foreach($listaNoticias as $noticia){?>
                <div class="card-news m-2" style="width: 300px">
                    <img class="card-img-top" src="<?php echo $noticia['imagen'];?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $noticia['titulo'];?></h4>
                        <p class="card-text"><?php echo $noticia['descripcion'];?></p>
                        <a id="" class="btn btn-primary" href=<?php echo $noticia['link'];?> role="button">Leer articulo</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/buscarNoticia.js"></script>
    <script src="js/cargarNoticias.js"></script>
</body>
</html>


