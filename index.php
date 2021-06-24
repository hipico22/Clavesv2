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
  <meta name="author" content="Jose Carlos and Gonçalo Silva" />
  <title>Claves Page</title>
  <!-- Icon-->
  <link rel="icon" href="img/key.ico" />

  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/css.scss" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

  <?php
  //Zona de alerts
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


      <?php
      if(!isset($_GET['tipo']))
      {
        // Page content-->
        ?>
        <script type="text/javascript">
        document.getElementById("mostrar").classList.add('pag-atual');
        document.getElementById("añadir").classList.remove('pag-atual');
        document.getElementById("cambiar").classList.remove('pag-atual');
        document.getElementById("borrar").classList.remove('pag-atual');
        </script>
        <?php
        include 'mostrar_claves.php';

      }elseif ($_GET['tipo']=='anadir') {
        $tipo = "anadir";
        ?>
        <script type="text/javascript">
        document.getElementById("añadir").classList.add('pag-atual');
        document.getElementById("mostrar").classList.remove('pag-atual');
        document.getElementById("cambiar").classList.remove('pag-atual');
        document.getElementById("borrar").classList.remove('pag-atual');
        </script>
        <?php
        include 'añadir_claves.php';

      }elseif ($_GET['tipo']=='cambiar') {
        $tipo = "cambiar";
        ?>
        <script type="text/javascript">
        document.getElementById("cambiar").classList.add('pag-atual');
        document.getElementById("mostrar").classList.remove('pag-atual');
        document.getElementById("añadir").classList.remove('pag-atual');
        document.getElementById("borrar").classList.remove('pag-atual');
        </script>
        <?php
        include 'cambiar_claves.php';

      }elseif ($_GET['tipo']=='borrar') {
        $tipo = "borrar";
        ?>
        <script type="text/javascript">
        document.getElementById("borrar").classList.add('pag-atual');
        document.getElementById("mostrar").classList.remove('pag-atual');
        document.getElementById("añadir").classList.remove('pag-atual');
        document.getElementById("cambiar").classList.remove('pag-atual');
        </script>
        <?php
        include 'borrar_claves.php';
      }
?>

</div>
</div>
<?php
include 'footer.php';
?>
</body>
