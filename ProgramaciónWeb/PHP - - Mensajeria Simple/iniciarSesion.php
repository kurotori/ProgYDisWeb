<?php
    session_start();

    require "herramientasSesion.php";

    $nombre="";
    $ci="";

    if ( validarDatosSesionPOST() ) {

        if ( validarDatosSesionSESSION() ) {
            $nombre = $_SESSION['nombre'];
            $ci = $_SESSION['ci'];
    
            //$estado = "Se recuperó una sesión existente a nombre de: $nombreUsuario";
        }
        //Chequeo de existencia de cookies
        elseif( isset( $_COOKIE['sesionChat'] ) ){
            
            $valorCookie = explode( ':', $_COOKIE['sesionChat'] );
    
            $nombre = $valorCookie[0];
    
            $_SESSION['sesionChat'] = $nombre;
    
            setcookie( "sesionChat", $_COOKIE['sesionChat'], time()+3600 );
    
            //$estado = "Se recuperó una cookie con una sesión existente a nombre de: $nombreUsuario";
        }
    
        //Si no hay una sesión, ni cookies, se inicia una sesión y se almacena en una cookie
        else {
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['ci'] = $_POST['ci'];
    
            $nombre = $_SESSION['nombre'];
            $ci = $_SESSION['ci'];
    
            $valorCookie = $nombre . ":" . $ci . ":" . session_id();
    
            setcookie("sesionChat",$valorCookie,time()+3600);
    
            //$estado = "Se inició una sesión a nombre de: $nombreUsuario";
        }
        
        

        //$estado = "Se recuperó una sesión existente a nombre de: $nombreUsuario";
    }
    else{
        /**
         * Si no hay datos de POST (o sea que el usuario accedió a esta página sin pasar
         * por el formulario de ingreso.
         */
        
        header("Location: index.php");
        exit();
    }

    echo("Usuario: $nombre CI: $ci");



    

    


?>