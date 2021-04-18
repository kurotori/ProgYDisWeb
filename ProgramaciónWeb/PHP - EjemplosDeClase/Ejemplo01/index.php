<?php
    $nombre = "Sebastián de los Ángeles";
    $anio = 2021;

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
    <h1>Esto es una página con código PHP</h1>
    <p>Esto es un texto cualquiera para hacer pruebas</p>
    <p>
        <?php
            echo("Este texto es generado por PHP <br>");
            echo("Este código fue creado por: $nombre en el año $anio <br>");
            echo(gettype($nombre));
            
            $nombre=1234;
            echo("<br>");
            echo(gettype($nombre));

            $nombre=true;
            echo("<br>");
            echo(gettype($nombre));
        ?>
    </p>
</body>
</html>