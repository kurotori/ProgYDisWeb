<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Registro</h1>
    <div id="controles">
        <p>Elija un archivo de imágen</p>
        <input type="file" name="" id="archivoImagen" accept="image/png, image/gif, image/jpeg" multiple>
        <br>
        <button id="btnImagen" onclick="ListarArchivos(archivoImagen)">Añadir Imágen</button>
    </div>
    
    <div id="vistaPrevia">

    </div>

    <div>
        <form action="registro.php" method="post">
            <input type="text" name="titulo" id="titulo">
            <input type="text" name="descripcion" id="descripcion">
            <input type="hidden" name="modo" value="1">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
<script src="eventos.js"></script>
</html>