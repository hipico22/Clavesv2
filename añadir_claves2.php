<?php
include 'conexion.php';


$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$clave = $_POST['clave'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];

$insert = "INSERT INTO claves (nombre, tipo, clave, description, cantidad, estado) VALUES ('$nombre', '$tipo', '$clave', '$descripcion', '$cantidad', '$estado')";

$resultado = $conexion->query($insert);

if ($resultado) {
  header("Location: index.php");
  include("creado.php");
}
 ?>
