<?php

include 'conexion.php';

$id = $_GET['id'];

$borrar= "DELETE FROM `claves` WHERE num_inc = ".$id."";

$resultado = $conexion->query($borrar);

header("LOCATION:index.php?cd=21&tp=2");
?>
