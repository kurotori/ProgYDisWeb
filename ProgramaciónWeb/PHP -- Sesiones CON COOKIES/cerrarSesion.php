<?php
     session_start();

     $nombreUsuario="";
     $ID_sesion="";
 
     if ( isset( $_SESSION['nombreUsuario'] ) ) {
         $nombreUsuario = $_SESSION['nombreUsuario'];
         $ID_sesion = session_id();
     }

     setcookie( "sesionEjemplo", "", time()-3600 );
     session_regenerate_id();
     session_unset();
     session_destroy();
     $_SESSION = array();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        Se ha cerrado la sesión a nombre de: 
        <b>
            <?php
                echo $nombreUsuario;
            ?>
        </b><br>
        
        ID de la sesión cerrada: 
        <b>
            <?php
                echo $ID_sesion;
            ?>
        </b>
    </p>
    <a href="index.php">
        <button>Volver al Inicio</button>
    </a>
        
</body>
</html>