<?php

//  if (isset($_COOKIE['cookie'])) {
    $estado="";

    if( isset( $_COOKIE['sesionEjemplo'] ) ){
        header("Location: abrirSesion.php");
        exit();
    }
    else{
        $estado = "No se encontraron cookies";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones CON COOKIES</title>
</head>
<body>
    <p>
        <?php
            echo("$estado");
        ?>
    </p>
    <form action="abrirSesion.php" id="formulario" method="post">
        <label for="nombreUsuario">Nombre:</label>
        <input type="text" name="nombreUsuario" id="nombreUsuario">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>