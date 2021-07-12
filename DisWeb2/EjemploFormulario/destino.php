<?php
    $nombreUsuario = $_POST['nombre_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Formulario</title>
</head>
<body>
    <h1>
        <?php
            echo("Bienvenido $nombreUsuario");
        ?>
    </h1>
</body>
</html>