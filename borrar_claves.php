<?php
session_start();
$_SESSION['anadir'] = 0;
$_SESSION['cambiar'] = 0;
$_SESSION['borrar'] = 1;

if(isset($_GET['tipo']))
{
  if($_GET['tipo']==borrar){
    include 'header.php';
  }
}
?>

<div class="container-fluid" onload="active1()">
  <h1 class="mt-4">Claves</h1>
  <?PHP
  include "conexion.php";
  $articulos = 10;
  $iniciar = ($_GET['pagina'] - 1) * $articulos;
  $consulta= "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo LIMIT $iniciar, $articulos";
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
          <th scope="col">Opciones</th>
        </tr>
      </thead>

      <?php

      $valor = 1;

      while ($linea = $resultado->fetch_assoc()) {
        //echo("$linea[num_inc], $linea[nombre]");

        if($valor == 1)
        {
          echo '<form method="post">
          <tbody>
          <tr class="table-active">
          <th scope="row">'.$linea['num_inc'].'</th>
          <td>'.$linea['nombre'].'</td>
          <td>'.$linea['tipo'].'</td>
          <td>'.$linea['clave'].'</td>
          <td>'.$linea['descripcion'].'</td>
          <td>'.$linea['cantidad'].'</td>
          <td>'.$linea['estado'].'</td>
          <td><a class="btn_borrar" href="borrar_claves2.php?id='.$linea['num_inc'].'" id="eliminar">Borrar</a></td>
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
          <td><a class="btn_borrar" href="borrar_claves2.php?id='.$linea['num_inc'].'" id="eliminar">Borrar</a></td>
          </tr>';
          $valor = 1;
        }

      };
      echo'</tbody>
      </table>
      </form>';
    };
    ?>
    
</body>
</div>
</div>
</div>

</div>
</div>
</div>
