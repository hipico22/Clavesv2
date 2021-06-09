
<!-- Page content-->
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

      echo '<form method="POST" action="cambiar_claves3.php">';

      while ($linea = $resultado->fetch_assoc()) {
        //echo("$linea[num_inc], $linea[nombre]");

        if($valor == 1)
        {
          echo '<tbody>
          <tr class="table-active">
          <th scope="row">'.$linea['num_inc'].'</th>
          <td><input type="text" name="nombre" placeholder="'.$linea['nombre'].'"></td>
          <td><input type="text" name="tipo" placeholder="'.$linea['tipo'].'"></td>
          <td><input type="text" name="clave" placeholder="'.$linea['clave'].'"></td>
          <td><input type="text" name="descripcion" placeholder="'.$linea['descripcion'].'"></td>
          <td><input type="text" name="cantidad" placeholder="'.$linea['cantidad'].'"></td>
          <td><input type="text" name="estado" placeholder="'.$linea['estado'].'"></td>
          <td><button name="BT" type="submit" value="Cambiar">Cambiar</td>
          </tr>
          ';
          $valor = 2;
        }else {

          echo '<tr>
          <th scope="row">'.$linea["num_inc"].'</th>
          <td><input type="text" name="nombre" placeholder="'.$linea['nombre'].'"></td>
          <td><input type="text" name="tipo" placeholder="'.$linea['tipo'].'"></td>
          <td><input type="text" name="clave" placeholder="'.$linea['clave'].'"></td>
          <td><input type="text" name="descripcion" placeholder="'.$linea['descripcion'].'"></td>
          <td><input type="text" name="cantidad" placeholder="'.$linea['cantidad'].'"></td>
          <td><input type="text" name="estado" placeholder="'.$linea['estado'].'"></td>
          <td><button name="BT" type="submit" value="Cambiar">Cambiar</button></td>
          </tr>';
          $valor = 1;
        }

      };
      echo'</tbody>
      </table>';
      echo '</form>';
    };
    ?>
  </div>
</div>
</div>
