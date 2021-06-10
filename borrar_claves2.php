<?php

include 'conexion.php';

$id = $_POST['id'];

$borrar= "DELETE FROM `claves` WHERE num_inc = ".$id."";

$resultado = $conexion->query($borrar);

header("LOCATION:index.php");
?>
