<?php 
    include 'config/bd.php';
    // $sql = $conexion->prepare("SELECT * FROM feeds");
    // $sql->execute();
    // $listaFeeds= $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Administrar Feed</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ayuda</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar feeds</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Agregar feeds</a>
                        <a class="dropdown-item" href="#">Eliminar feeds</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar noticia">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div id="accordianId" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="linkFeedHeaderId">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordianId" href="#linkFeed" aria-expanded="true" aria-controls="linkFeed">
                  Añadir Feed
                </a>
                    </h5>
                </div>
                <div id="linkFeed" class="collapse in" role="tabpanel" aria-labelledby="linkFeedHeaderId">
                    <div class="card-body">
                        <form class="form-inline d-flex align-items-center justify-content-around" method="POST" action="scripts/guardarFeed.php">
                            <div class="form-group col-4">
                                <label for="urlFeed">Link:</label>
                                <input type="text" class="form-control col-12 " name="urlFeed" id="linkFeed" aria-describedby="urlFeed" placeholder="">
                            </div>
                            <div class="form-group col-4">
                                <label for="nombreFeed">Nombre:</label><br>
                                <input type="text" class="form-control col-12" name="nombreFeed" id="nombreFeed" aria-describedby="nombreFeed" placeholder="">
                            </div>
                            <div class="form-group col-4">
                                <label for="categoriaFeed">Categoria:</label><br>
                                <input type="text" class="form-control col-12" name="categoriaFeed" id="categoria" aria-describedby="categoriaFeed" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary w-25 mt-3">OK</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="section2HeaderId">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                  Eliminar feed(s)
                </a>
                    </h5>
                </div>

                <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                    <div class="card-body">
                       <table class="table">
                           <thead>
                               <tr>
                                   <th>Fuente</th>
                                   <th>Opcion</th>
                               </tr>
                           </thead>
                           <tbody>
                            <!-- <?php foreach($listaFeeds as $fuente){?>
                                <tr>
                                    <td scope="row"><?php echo $fuente[nombreFeed] ?></td>
                                    <td><a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a></td>
                                </tr>
                            <?php } ?> -->
                           </tbody>
                       </table>
                    </div>

                </div>
            </div>
        </div>        
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>