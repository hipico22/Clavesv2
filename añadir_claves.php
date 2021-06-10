<div class="container-fluid" id="añadir">
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
      echo
      '<form method="POST" action="añadir_claves2.php">
      <tr>
      <td><input type="number" disabled="disabled"></td>
      <td<input type="text"></td>
      <td><input type="text" placeholder="Nombre" name="nombre"></td>
      <td><select name="tipo"><option>Office 365</option><option>Microsoft Office 2019</option><option>Windows 10</option></select></td>
      <td><input type="text" placeholder="Clave" name="clave"></td>
      <td><textarea class="descripcion" placeholder="Descripción" name="descripcion"></textarea></td>
      <td><input type="number" name="cantidad"></td>
      <td><select name="estado"><option>No usada</option><option>Usada</option></select></td>
      </tr>
      </tbody>
      </table>
      <button type="submit" id="btn_send">Añadir</button>
      </form>';
    };
    ?>
