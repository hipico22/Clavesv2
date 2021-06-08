<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Claves Page</title>
  <!-- Favicon-->
  <link rel="icon" href="img/key.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/css.scss" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body onload="active()">
  <div class="d-flex" id="wrapper">
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <?php
      include 'nav.php';
      ?>
      <!-- Page content-->
      <div class="container-fluid">
        <h1 class="mt-4">Claves</h1>
        <?PHP
        include "conexion.php";

        $id = $_GET['id'];

        $consulta= "SELECT * FROM claves Where num_inc = ".$id."";


        if ($resultado = $conexion->query($consulta)) {

          $linea = $resultado->fetch_assoc();

          ?>
          <form method="POST" action="cambiar_claves3.php">
            <div class="form-container">
              <div class="form-group">
                <label>ID</label>
                <input width="1000px" type="number" name="id" value="<?php echo $id;?>" readonly="readonly">
              </div>
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $linea['nombre'];?>" autofocus="autofocus">
              </div>
              <div class="form-group">
                <label>Tipo</label>
                <input type="text" name="tipo" value="<?php echo $linea['tipo'];?>">
              </div>
              <div class="form-group">
                <label>Clave</label>
                <input type="text" name="clave" value="<?php echo $linea['clave'];?>">
              </div>
              <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="descripcion"value="<?php echo $linea['descripcion'];?>">
              </div>
              <div class="form-group">
                <label>ID_Usuario</label>
                <input type="number" name="id_usuario" value="<?php echo $linea['id_usuario'];?>">
              </div>
              <div class="form-group">
                <label>Cantidad</label>
                <input type="number" name="cantidad" value="<?php echo $linea['cantidad'];?>">
              </div>
              <div class="form-group">
                <label>Estado</label>
                <input type="text" name="estado" value="<?php echo $linea['estado'];?>">
              </div>
              <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="Cambiar"></input>
              </div>
            </div>
          </form>
          <?php
        }
        ?>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
  <script src="js/activar/Cambiar.js"></script>
</body>
</html>
