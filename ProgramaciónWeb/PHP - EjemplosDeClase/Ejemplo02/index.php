<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario</h1>
    <form action="destino.php" method="post">
        <p>
            <label for="nombreDeUsuario">Usuario</label>
            <input type="text" name="nombreDeUsuario" id="nombreDeUsuario">
        </p>
        <p>
            <label for="fechaActual">Fecha Actual</label>
            <input type="date" name="fechaActual" id="fechaActual">
        </p>
        <p>
            <input type="submit" value="Enviar Datos">
        </p>
    </form>
</body>
</html>