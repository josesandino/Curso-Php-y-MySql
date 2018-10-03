<?php

    include_once 'conexion.php';

    //LEER
    $sql_leer = 'SELECT * FROM colores';

    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $resultado = $gsent->fetchAll();

    //var_dump($resultado);

    //AGREGAR
    if($_POST){
       $color = $_POST['color'];
       $descripcion = $_POST['descripcion'];

       $sql_agregar = 'INSERT INTO colores (color,descripcion) VALUES (?,?)';
       $sentencia_agregar = $pdo->prepare($sql_agregar);
       $sentencia_agregar->execute(array($color,$descripcion));

       header('location:index.php');
    }


?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            
            <div class="col-md-6">

                <?php  foreach($resultado as $dato): ?>

                <div 
                class="alert alert-<?php  echo $dato['color'] ?> text-uppercase" 
                role="alert">
                    <?php  echo $dato['color'] ?>
                    -
                    <?php  echo $dato['descripcion'] ?>
                </div>

                <?php endforeach ?>

            </div>

            <div class="col-md-6">
                <h2>Agregar Elementos</h2>
                <form method="POST"> 
                    <input type="text" class="form-control" name="color">
                    <input type="text" class="form-control mt-3" name="descripcion">
                    <button class="btn btn-primary mt-3">Agregar</button>
                </form>
            </div>

        </div>       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>