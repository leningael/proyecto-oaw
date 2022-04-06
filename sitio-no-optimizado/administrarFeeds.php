<?php 
    include 'config/bd.php';
    $sql = $conexion->prepare("SELECT * FROM feeds");
    $sql->execute();
    $listaFeeds = $sql->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Administrar feeds</title>
  </head>
  <body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark" id="nav-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img class="align-text-top me-sm-1" src="assets/icons/rss.svg" alt="Recientes">Lector de Feeds</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><img class="align-text-top me-sm-1" src="assets/icons/home.svg" alt="Recientes">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="administrarFeeds.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="align-text-top me-sm-1" src="assets/icons/edit.svg" alt="Recientes">Administrar Feeds
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="administrarFeeds.php">Agregar feed</a></li>
                  <li><a class="dropdown-item" href="administrarFeeds.php">Eliminar feed</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><img class="align-text-top me-sm-1" src="assets/icons/user.svg" alt="Recientes">Cuenta</a>
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
    <!-- Banner -->
    <section id="infoFeed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 px-0">
                    <img src="assets/img/gestionar-feeds.jpg" alt="Administrar feeds">
                </div>
                <div class="col-md-6 p-4 align-self-center text-center">
                    <h1 class="pb-3">¡Tú eliges que noticias quieres que te aparezcan!</h1>
                    <li>Agrega feeds para no perderte las últimas noticias de tus fuentes favoritas.</li>
                    <li>Elimina los feeds para que ya no te aparezcan más sus noticias.</li>
                    <li>Renombra tus feeds o las categorías a las que pertenecen. (Próximamente)</li>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banner -->
    <!-- Formularios -->
    <section id="administra-feeds">
        <div class="container-fluid mt-4">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Agregar Feed -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Añadir feed(s)
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h2>Agrega tus feeds</h2>
                                            <p>y no te pierdas ninguna noticia de tus fuentes favoritas.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0">
                                            <form action="scripts/guardarFeed.php" method="POST">
                                                <div class="row">
                                                    <div class="form-label col-12 col-lg-6">
                                                        <label for="inputNombre" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="inputNombre" name="nombreFeed">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label for="inputCategoria" class="form-label">Categoría</label>
                                                        <input type="text" class="form-control" id="inputCategoria" name="categoriaFeed">
                                                    </div>
                                                    <div class="form-label col-12">
                                                        <label for="inputLink" class="form-label">Link</label>
                                                        <input type="text" class="form-control" id="inputLink" name="urlFeed">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary w-100 mt-2">Agregar feed</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Agregar Feed -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Modificar Feed -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Modificar feed(s)
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Fuente</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listaFeeds as $fuente){?>
                                        <tr>
                                            <th scope="row"><?php echo $fuente['id'];?></th>
                                            <td><?php echo $fuente['nombre'];?></td>
                                            <td>
                                                <a class="btn btn-danger" href="scripts/eliminarFeed.php?id=<?php echo $fuente['id'];?>" role="button">Eliminar</a>
                                                <a class="btn btn-primary" href="#" role="button">Editar</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Modificar Feed -->
                </div>
            </div>
        </div>
    </section>
    <!-- Formularios -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
