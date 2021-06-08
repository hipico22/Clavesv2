<?PHP
// Creamos la conexión con la base de datos y nos conectamos a ella.
$conexion = new mysqli("localhost", "root", "", "claves");
if ($conexion->connect_errno) {
        printf("Conexión fallida: %s\n", $mysqli->connect_error);
        exit();
    }
?>
