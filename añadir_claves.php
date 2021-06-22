<?php
session_start();
$_SESSION['anadir'] = 1;
$_SESSION['cambiar'] = 0;
$_SESSION['borrar'] = 0;

?>

<div class="container-fluid" id="añadir">

  <h1 class="mt-4">Claves</h1>
  <?PHP
  include "conexion.php";
  $articulos = 10;
  $iniciar = ($_GET['pagina'] - 1) * $articulos;
  $consulta= "SELECT c.num_inc, c.nombre, t.tipo, c.clave, c.descripcion, c.cantidad, c.estado FROM claves c INNER JOIN tipo t ON c.tipo = t.id_tipo LIMIT $iniciar, $articulos";
  if ($resultado = $conexion->query($consulta)) {
    ?>
    <form method="POST" action="añadir_claves2.php">
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
        '<tr>
        <td><input type="number" disabled="disabled"></td>
        <td><input type="text" placeholder="Nombre" name="nombre"></td>
        <td><select name="tipo"><option value="1">Office 365</option><option value="2">Microsoft Office 2019</option><option value="3">Windows 10</option><option value="4">Windows Home</option></select></td>
        <td><input type="text" placeholder="Clave" name="clave"></td>"
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

</body>
</div>
</div>
</div>
