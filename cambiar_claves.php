<?php
session_start();
$_SESSION['anadir'] = 0;
$_SESSION['cambiar'] = 1;
$_SESSION['borrar'] = 0;
 ?>
<!-- Page content-->
<div class="container-fluid" id="resultado">
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
          <th scope="col">Opción</th>
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
          <td><a class="btn_cambiar" href="cambiar_claves2.php?id='.$linea['num_inc'].'">Cambiar</a></td>
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
          <td><a class="btn_cambiar" href="cambiar_claves2.php?id='.$linea['num_inc'].'">Cambiar</a></td>
          </tr>';
          $valor = 1;
        }

      };
      echo'</tbody>
      </table>';
    };
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
  </body>
    </div>
  </div>
  </div>

  </div>
</div>
</div>
