<?php
    session_start();

    $nombreUsuario="";
    $estado="";

    //Chequeo de existencia de una sesión
    if ( isset( $_SESSION['nombreUsuario'] ) ) {
        $nombreUsuario = $_SESSION['nombreUsuario'];

        $estado = "Se recuperó una sesión existente a nombre de: $nombreUsuario";
    }
    //Chequeo de existencia de cookies
    elseif( isset( $_COOKIE['sesionEjemplo'] ) ){
        
        $valorCookie = explode( ':', $_COOKIE['sesionEjemplo'] );

        $nombreUsuario = $valorCookie[0];

        $_SESSION['nombreUsuario'] = $nombreUsuario;

        setcookie( "sesionEjemplo", $_COOKIE['sesionEjemplo'], time()+3600 );

        $estado = "Se recuperó una cookie con una sesión existente a nombre de: $nombreUsuario";
    }

    //Si no hay una sesión, ni cookies, se inicia una sesión y se almacena en una cookie
    else {
        $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $valorCookie = $nombreUsuario . ":" . session_id();

        setcookie("sesionEjemplo",$valorCookie,time()+3600);

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
            echo 'ID de sesión: <b>'.session_id().'</b> ';
        ?>
    </p>

    <p>
        <a href="cerrarSesion.php">
            <button>Cerrar Sesión</button>
        </a>
    </p>

</body>
</html>