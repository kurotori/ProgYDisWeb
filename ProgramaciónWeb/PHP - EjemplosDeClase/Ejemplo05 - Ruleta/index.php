<?php

$error="";
if ( isset($_GET['error']) && strlen($_GET['error']) > 0 ) {
    $error = "Error: " . $_GET['error'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta - Inicio</title>
</head>
<body>
    <form action="ruleta.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <p>
            <?php
                echo($error);
            ?>
        </p>


        <input type="submit" value="Entrar">
    </form>
</body>
</html>