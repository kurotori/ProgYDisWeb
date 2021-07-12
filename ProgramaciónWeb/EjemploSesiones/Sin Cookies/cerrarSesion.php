<?php
    session_start();

    $nombre="";
    $ID_sesion="";

    if ( isset( $_SESSION['nombre'] ) ) {
        $nombre = $_SESSION['nombre'];
        $ID_sesion = session_id();
    }

    session_regenerate_id();
    session_unset();
    session_destroy();
    $_SESSION = array();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesión</title>
</head>
<body>
    <h1>
    Se ha cerrado una sesión a nombre de: 
    <?php
     echo($nombre);
    ?>
    </h1>

    ID de la sesión cerrada: 
    <?php
        echo($ID_sesion);
    ?>

</body>
</html>