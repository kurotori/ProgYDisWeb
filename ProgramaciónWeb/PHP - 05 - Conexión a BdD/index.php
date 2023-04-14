<?php

$servidor = "localhost";
$usuario = "root";
$password = "soloyoeh";

// Crear y establecer conexión 
$conexion = new mysqli($servidor, $usuario, $password);

// Chequear la conexión
if ($conexion->connect_error) {
    die("ERROR: " . $conexion->connect_error);
}
else{
    echo "Conexión exitosa";
}

?>
