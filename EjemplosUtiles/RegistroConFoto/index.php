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
    <h1 id="hTitulo">Nueva Publicación</h1>
    <div id="nuevaPub" class="bordes">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion">
    
        
    </div>
    
    <div id="pubImagenes" class="bordes">
        <label for="archivoImagen">Seleccione Imágenes:</label>
        <br><br>
        <input type="file" name="archivoImagen" id="archivoImagen" accept="image/png, image/gif, image/jpeg" multiple>
        <br><br>
        <div id="vistaPrevia" class="bordes" >
        </div>
    </div>
    
    <button id="btnSubir">Publicar</button>
    
</body>
<script src="jquery-3.6.0.js"></script>
<script src="eventos.js"></script>
</html>