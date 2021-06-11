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

  <div class="d-flex" id="wrapper">
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <?php
       include 'nav2.php';
       ?>
<!-- Page content-->
<div class="container-fluid" id="resultado">
  <h1 class="mt-4">Claves</h1>
  <?PHP
  include "conexion.php";
  $id = $_GET['id'];
  $consulta= "SELECT * FROM claves Where num_inc = '$id'";
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
          <th scope="col">Opción</th>
        </tr>
      </thead>

      <?php

      $consulta1 = "SELECT tipo FROM tipo";

      $resultado1 = $conexion->query($consulta1);

      while ($linea1 = $resultado1->fetch_assoc()) {
        $tipos[] = $linea1['tipo'];
      }
      print_r($tipos);

      $contador = mysqli_num_rows($resultado1);

      $valor = 1;

      echo '<form method="POST" action="cambiar_claves3.php?id='.$id.'">';

      while ($linea = $resultado->fetch_assoc()) {
        //echo("$linea[num_inc], $linea[nombre]");

        if($valor == 1)
        {
          echo '<tbody>
          <tr class="table-active">
          <th scope="row">'.$linea['num_inc'].'</th>
          <td><input type="text" name="nombre" value="'.$linea['nombre'].'"></td>';
          echo '<td><select name="tipo">';
            $saltar = $linea['tipo']-1;
            $saltar2 = $saltar;
            print($saltar);
            for ($i=0;$i<$contador;$i++) {
              if (!empty($saltar) OR $saltar == 0) {
                echo $saltar;
                echo '<option value='.$numero.'>'.$tipos[$saltar].'</option>';
                $saltar = "";
              } elseif ($i == $saltar2 && empty($saltar)) {
                $numero = $i+1;
                $i = $i+1;
              }
                $numero = $i+1;

                echo '<option value='.$numero.'>'.$tipos[$i].'</option>';
            }
            echo '</select></td>';
            echo'
          <td><input type="text" name="clave" value="'.$linea['clave'].'"></td>
          <td><input type="text" name="descripcion" value="'.$linea['descripcion'].'"></td>
          <td><input type="text" name="cantidad" value="'.$linea['cantidad'].'"></td>
          <td>
          <select name="estado" value="'.$linea['estado'].'">
          <option>No usada</option><option>Usada</option>
          </select>
          </td>
          <td><button name="BT" id="btn_send" type="submit" value="Cambiar">Cambiar</td>
          </tr>
          ';
          $valor = 2;
        }else {

          echo '<tr>
          <th scope="row">'.$linea["num_inc"].'</th>
          <td><input type="text" name="nombre" value="'.$linea['nombre'].'"></td>
          <td><select name="tipo" value="'.$linea['tipo'].'"><option>Office 365</option><option>Microsoft Office 2019</option><option>Windows 10</option></select></td>
          <td><input type="text" name="clave" value="'.$linea['clave'].'"></td>
          <td><input type="text" name="descripcion" value="'.$linea['descripcion'].'"></td>
          <td><input type="text" name="cantidad" value="'.$linea['cantidad'].'"></td>
          <td><select name="estado" value="'.$linea['estado'].'"><option>No usada</option><option>Usada</option></select></td>
          <td><button name="BT" id="btn_send" type="submit" value="Cambiar">Cambiar</button></td>
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
<?php
include 'footer.php';
?>
