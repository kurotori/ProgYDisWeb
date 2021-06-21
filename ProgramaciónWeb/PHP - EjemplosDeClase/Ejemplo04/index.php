<?php
    include "basededatos.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Listado Completo de Libros</h1>

    <table border=1>
        <tr>
            <th>Título</th>
            <th>Género</th>
            <th>Fecha de Publicación</th>
            <th>ISBN</th>
        </tr>
        <?php

            $libros = ObtenerLibrosEnTabla();
            echo($libros);

        ?>

    </table>
    
</body>
</html>