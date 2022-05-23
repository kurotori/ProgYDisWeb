<?php
    session_start();
    include "funciones.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.6.0.js"></script>
    <script src="sha512.js"></script>
    <script src="eventos.js"></script>
</head>
<body>
    <form>
        <label for="nombre"></label>
        <input type="text" name="nombre" id="nombre">
        <label for="pass"></label>
        <input type="password" name="pass" id="pass">
    </form>
    <button onclick="RecopilarYEnviar()">Registrarse</button>
</body>
</html>