<?php
    
    if( isset( $_COOKIE['sesionChat'] ) ){
        
        header("Location: chat/");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <div id="contenido">
        <div id="encabezado">
            <h1>Chat PHP</h1>
        </div>
        <div id="formulario">
            
    <form action="iniciarSesion.php" method="post">
        <table id="tablaInicio">
            <tr>
                <td>
                    <label for="nombre">Nombre:</label>
                </td>
                <td>
                    <input type="text" name="nombre" id="nombre">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nombre">CI:</label>
                </td>
                <td>
                    <input type="text" name="ci" id="ci">
                </td>
            </tr>
            <tr>
                <td class="celdaBoton" colspan=2>
                    <input id="btnEntrar" type="submit" value="Entrar al Chat">
                </td>
            </tr>
        </table>
    </form>
        </div>
        <div id="pie">
        </div>
    </div>

</body>
</html>