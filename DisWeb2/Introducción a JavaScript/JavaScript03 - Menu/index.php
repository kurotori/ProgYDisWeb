<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu con JavaScript</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="jquery-3.6.0.js"></script>
    <script src="eventos.js"></script>
</head>
<body>
    <div id="menu_cuerpo">
        <div id="menu_boton" onClick="AbrirMenu()"></div>
        <div id="menu_elementos">
            <div class="menu_item">
                <div class="menu_item_texto">Búsqueda</div>
                <div id="item_1" class="menu_item_icono"></div>
            </div>
            <div class="menu_item">
                <div class="menu_item_texto">Publicación</div>
                <div id="item_2" class="menu_item_icono"></div>
            </div>
            <div class="menu_item">
                <div class="menu_item_texto">Contactos</div>
                <div id="item_3" class="menu_item_icono"></div>
            </div>
            <div class="menu_item">
                <div class="menu_item_texto">Documentos</div>
                <div id="item_4" class="menu_item_icono"></div>
            </div>
            <div class="menu_item">
                <div class="menu_item_texto">Configuración</div>
                <div id="item_5" class="menu_item_icono"></div>
            </div>
        </div>
    </div>
</body>
</html>