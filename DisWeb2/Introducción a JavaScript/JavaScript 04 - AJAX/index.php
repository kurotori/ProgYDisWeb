<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="jquery-3.6.0.js"></script>
    <script src="eventos.js"></script>
</head>
<body>
    <button onClick="ObtenerDatosConAJAX()">Prueba</button>

    <div id="telon">
        <div class="dialogo">
            <div class="btnCerrar" onClick="MostrarDialogo()">x</div>
            <div class="txtDialogo">
                
            </div>
        </div>
    </div>

    <div id="resultado">
        <table id="tabla_resultado">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Valor</th>
            </tr>
        </table>
    </div>

</body>
</html>