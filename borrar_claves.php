<div class="container-fluid">
  <h1 class="mt-4">Claves</h1>
  <?PHP
  include "conexion.php";
  $consulta= "SELECT * FROM claves";
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
          <th scope="col">Opção</th>
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
          <td><a href="borrar_claves2.php?id='.$linea['num_inc'].'">Borrar</a></td>
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
          <td><a href="borrar_claves2.php?id='.$linea['num_inc'].'">Borrar</a></td>
          </tr>';
          $valor = 1;
        }

      };
      echo'</tbody>
      </table>';
    };
    ?>
