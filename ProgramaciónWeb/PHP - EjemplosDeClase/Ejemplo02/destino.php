<?php
    $nombreUsuario = $_POST["nombreDeUsuario"];
    $fechaActual = $_POST["fechaActual"];
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

    <h1>Datos Recibidos</h1>
    <p>
        <?php
            echo("Nombre de Usuario: $nombreUsuario");
        ?>
    </p>

    <p>
        <?php
            echo("Fecha Actual: $fechaActual");
        ?>
    </p>

</body>
</html>