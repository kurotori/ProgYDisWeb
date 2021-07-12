<?php
    session_start();

    $nombre = "";
    $estado = "";

    //$_SESSION
    if ( isset( $_SESSION['nombre'] ) ) {
        $nombre = $_SESSION['nombre'];
        $estado = "Se recuperó una sesión a nombre de: $nombre";
    }
    else {
        $_SESSION['nombre'] = $_POST['nombre'];
        $nombre = $_POST['nombre'];
        $estado = "Se inició una sesión a nombre de: $nombre";
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión</title>
</head>
<body>
    <h1>
        <?php
        echo ($estado);
        ?>
    </h1>
    <a href="cerrarSesion.php">Cerrar Sesion</a>
</body>
</html>