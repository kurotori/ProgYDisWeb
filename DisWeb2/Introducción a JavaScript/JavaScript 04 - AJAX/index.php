<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.6.0.js"></script>
    <script src="eventos.js"></script>
</head>
<body>
    <button onclick="ObtenerDatosConAJAX()">Obtener Datos</button>
    <div id="mensajes"></div>
    <table id="tabla_resultados">
        <td>
            <th>ID</th>
            <th>Número</th>
            <th>Valor</th>
        </td>
    </table>
</body>
</html>