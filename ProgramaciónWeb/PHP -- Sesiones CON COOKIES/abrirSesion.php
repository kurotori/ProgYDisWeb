<?php
    session_start();

    $nombreUsuario="";
    $estado="";

    //Chequeo de existencia de una sesión
    if ( isset( $_SESSION['nombreUsuario'] ) ) {
        $nombreUsuario = $_SESSION['nombreUsuario'];

        //Chequeamos si existen cookies
        if ( isset( $_COOKIE['sesionEjemplo'] ) ) {
            $estado = "Se recuperó una una cookie y una sesión existente a nombre de: $nombreUsuario";
        } else {
            $estado = "Se recuperó una sesión existente a nombre de: $nombreUsuario";
        }
        
        
        
    }
    //Si no hay sesión, chequeo de existencia de cookies
    elseif( isset( $_COOKIE['sesionEjemplo'] ) ){
        
        //Si la cookie existe, creamos una variable para su contenido
        //usaremos la función explode() para separar las claves de los datos
        $valorCookie = explode( ':', $_COOKIE['sesionEjemplo'] );

        //Almacenamos el primer valor, que corresponderá al nombre del usuario
        $nombreUsuario = $valorCookie[0];

        //Almacenamos el nombre del usuario en los datos de la sesión
        $_SESSION['nombreUsuario'] = $nombreUsuario;

        //Actualizamos la cookie y establecemos su caducidad en una hora
        setcookie( "sesionEjemplo", $_COOKIE['sesionEjemplo'], time()+3600 );

        $estado = "Se recuperó una cookie y recreeamos una sesión a nombre de: $nombreUsuario";
    }

    //Si no hay una sesión, ni cookies, se inicia una sesión y se almacena en una cookie
    else {
        $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $valorCookie = $nombreUsuario . ":" . session_id();

        setcookie("sesionEjemplo",$valorCookie,time()+3600);

        $estado = "Se inició una sesión NUEVA a nombre de: $nombreUsuario";
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
            echo 'ID de sesión: <b>'.session_id().'</b> <br>';
            
        ?>
    </p>

    <p>
        <a href="cerrarSesion.php">
            <button>Cerrar Sesión</button>
        </a>
    </p>

</body>
</html>