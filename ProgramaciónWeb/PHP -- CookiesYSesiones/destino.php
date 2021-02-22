<?php
    session_start();

    $nombreUsuario="";
    $estado="";

    if ( isset( $_SESSION['nombreUsuario'] ) ) {
        //session_name( session_id() );
        $nombreUsuario = $_SESSION['nombreUsuario'];
        $estado = "Se recuperó una sesión existente a nombre de: $nombreUsuario";
    }
    else {
        $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
        
        $nombreUsuario = $_SESSION['nombreUsuario'];
        $estado = "Se inició una sesión a nombre de: $nombreUsuario";
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>
<body>

    <b>
        <?php
        echo $estado;
        ?>
    </b>

    <p>
        <?php
            echo 'ID de sesión: <b>'.session_id().'</b> '.session_name();
        ?>
    </p>

    <p>
        <a href="cerrarSesion.php">
            <button>Cerrar Sesión</button>
        </a>
    </p>

</body>
</html>