<?php
include 'conexion.php';

$id = $_GET['id'];

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$clave = $_POST['clave'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];

$cambiar = "UPDATE claves SET nombre = '$nombre', tipo = '$tipo', clave = '$clave', descripcion = '$descripcion', cantidad = '$cantidad', estado = '$estado' Where num_inc = '$id'";

$resultado = $conexion->query($cambiar);

if ($resultado) {
  header("Location: index.php");
  include("creado.php");
}

 ?>
