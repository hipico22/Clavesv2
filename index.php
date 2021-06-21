<?php
session_start();
$_SESSION['anadir'] = 0;
$_SESSION['cambiar'] = 0;
$_SESSION['borrar'] = 0;
$_SESSION['tp'] = 0;
 ?>
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
<body>

<?php
if(isset($_GET['cd']) || isset($_GET['tp']))
{
  if($_GET['cd'] == 21 && $_GET['tp'] == 1)
  {
    $_SESSION['tp'] = 1;
     include("creado.php");

     if (!isset($_GET['pagina'])) {
       header("Location: index.php?pagina=1&cd=21&tp=1");
     }
   }
   elseif($_GET['cd'] == 21 && $_GET['tp'] == 2)
   {
     $_SESSION['tp'] = 2;
      include("creado.php");

      if (!isset($_GET['pagina'])) {
        header("Location: index.php?pagina=1&cd=21&tp=2");
      }
    }else{
      include("creado.php");

      if (!isset($_GET['pagina'])) {
        header("Location: index.php?pagina=1&cd=21&tp=0");
      }
    }
 }else{
   if (!isset($_GET['pagina'])) {
     header("Location: index.php?pagina=1");
   }
 }
 ?>

  <div class="d-flex" id="wrapper">
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <?php

       include 'nav.php';
       ?>
<!-- Page content-->
<div class="container-fluid" id="resultado">
  <h1 class="mt-4">Claves</h1>
  <?PHP
  include "conexion.php";
  $articulos = 10;
  $iniciar = ($_GET['pagina'] - 1) * $articulos;
  $consulta = "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo LIMIT $iniciar, $articulos";
  if ($resultado = $conexion->query($consulta)) {
    ?>
    <table style="border: solid black 2px" class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Núm. Incidencia</th>
          <th scope="col">Nombre</th>
          <th scope="col">Tipo</th>
          <th scope="col">Clave</th>
          <th scope="col">Descripción</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>

      <?php

      $valor = 1;

      while ($linea = $resultado->fetch_assoc()) {
        //echo("$linea[num_inc], $linea[nombre]");



        if($valor == 1)
        {
          echo '<tbody>
          <tr class="table-active">
          <th scope="row">'.$linea['num_inc'].'</th>
          <td>'.$linea['nombre'].'</td>
          <td>'.$linea['tipo'].'</td>
          <td>'.$linea['clave'].'</td>
          <td>'.$linea['descripcion'].'</td>
          <td>'.$linea['cantidad'].'</td>
          <td>'.$linea['estado'].'</td>
          </tr>
          ';
          $valor = 2;
        }else {

          echo '<tr>
          <th scope="row">'.$linea["num_inc"].'</th>
          <td>'.$linea["nombre"].'</td>

          <td>'.$linea["tipo"].'</td>
          <td>'.$linea["clave"].'</td>
          <td>'.$linea["descripcion"].'</td>
          <td>'.$linea["cantidad"].'</td>
          <td>'.$linea["estado"].'</td>
          </tr>';
          $valor = 1;
        }

      };
      echo'</tbody>
      </table>';
    };
    ?>
  </div>

<!-- Paginação! -->
<?php

if($_SESSION['anadir'] == 1)
{
  ?>
  <div id="paginacion">
      <!--Comenzamos con la paginaciÃ³n. Creamos el botÃ³n de ir hacia detrÃ¡s.-->
      <ul class="pagination d-flex justify-content-center">
          <!--Si el nÃºmero de pÃ¡gina es 1 o menos, no podremos ir hacia detrÃ¡s.-->
          <li class="page-item <?PHP if ($_GET['pagina'] <= 1) {
                                      echo "disabled";
                                  } ?>">
              <!--Si clickeamos en el botÃ³n de la flechita, quitarÃ¡ 1 a la pÃ¡gina -->
              <a class="page-link" href="index.php?pagina=<?PHP echo $_GET['pagina'] - 1 ?>">&laquo;</a>
          </li>

          <?PHP
          $todo = mysqli_query($conexion, "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo");
          $articulos_pagina = 10;
          $count = mysqli_num_rows($todo);
          $total_paginas = $count / 10;
          $paginas = ceil($total_paginas);
          //Creamos un bucle que sacarÃ¡ el nÃºmero de pÃ¡ginas que queremos.
          for ($i = 0; $i < $paginas; $i++) { ?>
              <li class="page-item
          <?PHP if ($_GET['pagina'] == $i + 1) {
                  echo "active";
              } ?>">
                  <a class="page-link" href="añadir_claves.php?pagina=<?PHP echo $i + 1 ?>">
                      <?PHP
                      echo $i + 1;
                      ?>
                  </a>
              </li>
          <?PHP
          };
          ?>
          <li class="page-item <?PHP if ($_GET['pagina'] >= $paginas) {
                                      echo "disabled";
                                  } ?>">
              <a class="page-link" href="añadir_claves.php?pagina=<?PHP echo $_GET['pagina'] + 1 ?>">&raquo;</a>
          </li>
      </ul>
  </div>
<?php
}
elseif($_SESSION['cambiar'] == 1)
{
  ?>
  <div id="paginacion">
      <!--Comenzamos con la paginaciÃ³n. Creamos el botÃ³n de ir hacia detrÃ¡s.-->
      <ul class="pagination d-flex justify-content-center">
          <!--Si el nÃºmero de pÃ¡gina es 1 o menos, no podremos ir hacia detrÃ¡s.-->
          <li class="page-item <?PHP if ($_GET['pagina'] <= 1) {
                                      echo "disabled";
                                  } ?>">
              <!--Si clickeamos en el botÃ³n de la flechita, quitarÃ¡ 1 a la pÃ¡gina -->
              <a class="page-link" href="index.php?pagina=<?PHP echo $_GET['pagina'] - 1 ?>">&laquo;</a>
          </li>

          <?PHP
          $todo = mysqli_query($conexion, "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo");
          $articulos_pagina = 10;
          $count = mysqli_num_rows($todo);
          $total_paginas = $count / 10;
          $paginas = ceil($total_paginas);
          //Creamos un bucle que sacarÃ¡ el nÃºmero de pÃ¡ginas que queremos.
          for ($i = 0; $i < $paginas; $i++) { ?>
              <li class="page-item
          <?PHP if ($_GET['pagina'] == $i + 1) {
                  echo "active";
              } ?>">
                  <a class="page-link" href="cambiar_claves.php?pagina=<?PHP echo $i + 1 ?>">
                      <?PHP
                      echo $i + 1;
                      ?>
                  </a>
              </li>
          <?PHP
          };
          ?>
          <li class="page-item <?PHP if ($_GET['pagina'] >= $paginas) {
                                      echo "disabled";
                                  } ?>">
              <a class="page-link" href="cambiar_claves.php?pagina=<?PHP echo $_GET['pagina'] + 1 ?>">&raquo;</a>
          </li>
      </ul>
  </div>

  <?php

}
elseif($_SESSION['borrar'] == 1){
?>
<div id="paginacion">
    <!--Comenzamos con la paginaciÃ³n. Creamos el botÃ³n de ir hacia detrÃ¡s.-->
    <ul class="pagination d-flex justify-content-center">
        <!--Si el nÃºmero de pÃ¡gina es 1 o menos, no podremos ir hacia detrÃ¡s.-->
        <li class="page-item <?PHP if ($_GET['pagina'] <= 1) {
                                    echo "disabled";
                                } ?>">
            <!--Si clickeamos en el botÃ³n de la flechita, quitarÃ¡ 1 a la pÃ¡gina -->
            <a class="page-link" href="borrar_claves.php?pagina=<?PHP echo $_GET['pagina'] - 1 ?>&tipo=borrar">&laquo;</a>
        </li>

        <?PHP
        $todo = mysqli_query($conexion, "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo");
        $articulos_pagina = 10;
        $count = mysqli_num_rows($todo);
        $total_paginas = $count / 10;
        $paginas = ceil($total_paginas);
        //Creamos un bucle que sacarÃ¡ el nÃºmero de pÃ¡ginas que queremos.
        for ($i = 0; $i < $paginas; $i++) { ?>
            <li class="page-item
        <?PHP if ($_GET['pagina'] == $i + 1) {
                echo "active";
            } ?>">
                <a class="page-link" href="borrar_claves.php?pagina=<?PHP echo $i + 1 ?>&tipo=borrar">
                    <?PHP
                    echo $i + 1;
                    ?>
                </a>
            </li>
        <?PHP
        };
        ?>
        <li class="page-item <?PHP if ($_GET['pagina'] >= $paginas) {
                                    echo "disabled";
                                } ?>">
            <a class="page-link" href="borrar_claves.php?pagina=<?PHP echo $_GET['pagina'] + 1 ?>">&raquo;</a>
        </li>
    </ul>
</div>
<?php
}
else{

?>
  <div id="paginacion">
      <!--Comenzamos con la paginaciÃ³n. Creamos el botÃ³n de ir hacia detrÃ¡s.-->
      <ul class="pagination d-flex justify-content-center">
          <!--Si el nÃºmero de pÃ¡gina es 1 o menos, no podremos ir hacia detrÃ¡s.-->
          <li class="page-item <?PHP if ($_GET['pagina'] <= 1) {
                                      echo "disabled";
                                  } ?>">
              <!--Si clickeamos en el botÃ³n de la flechita, quitarÃ¡ 1 a la pÃ¡gina -->
              <a class="page-link" href="index.php?pagina=<?PHP echo $_GET['pagina'] - 1 ?>">&laquo;</a>
          </li>

          <?PHP
          $todo = mysqli_query($conexion, "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo");
          $articulos_pagina = 10;
          $count = mysqli_num_rows($todo);
          $total_paginas = $count / 10;
          $paginas = ceil($total_paginas);
          //Creamos un bucle que sacarÃ¡ el nÃºmero de pÃ¡ginas que queremos.
          for ($i = 0; $i < $paginas; $i++) { ?>
              <li class="page-item
          <?PHP if ($_GET['pagina'] == $i + 1) {
                  echo "active";
              } ?>">
                  <a class="page-link" href="index.php?pagina=<?PHP echo $i + 1 ?>">
                      <?PHP
                      echo $i + 1;
                      ?>
                  </a>
              </li>
          <?PHP
          };
          ?>
          <li class="page-item <?PHP if ($_GET['pagina'] >= $paginas) {
                                      echo "disabled";
                                  } ?>">
              <a class="page-link" disabled="disabled" href="index.php?pagina=<?PHP echo $_GET['pagina'] + 1 ?>">&raquo;</a>
          </li>
      </ul>
  </div>
  <?php
  }
   ?>
</body>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>
