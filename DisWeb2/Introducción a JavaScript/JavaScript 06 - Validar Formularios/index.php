<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Formularios</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="jquery-3.6.0.js"></script>
    <script src="eventos.js"></script>
</head>
<body>
    
    <form id="formRegistro">
        <br><br>
        <h1>Formulario</h1>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <span class="rojo">*</span>
        <br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido">
        <span class="rojo">*</span>
        <br><br>
        <label for="fechaNac">Fecha de Nacimiento:</label>
        <input type="date" name="fechaNac" id="fechaNac">
        <span class="rojo">*</span>
        <br><br>
        <label for="numCi">Cédula de Identidad:</label>
        <input type="text" name="numCi" id="numCi" maxlength=8>
        <span class="rojo">*</span>
        <br>
        <span id="errorCampos" class="mensajeError"></span>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass">
        <span class="rojo">*</span>
        <br>
        <span id="errorPass" class="mensajeError"></span>
        <br>
        <label for="repPass">Repetir Contraseña:</label>
        <input type="password" id="repPass" name="repPass" >
        <span class="rojo">*</span>
        <br>
        <span id="errorRepPass" class="mensajeError"></span>
        <br>
        
        <!-- NOTA: Un botón con parámetro type con valor 'button', 
        resulta inerte en el formulario y resulta útil para 
        añadir funciones de JavaScript sobre el mismo -->
        
        <button type="button" onclick="ValidarFormulario('formRegistro')" >Registrarse</button>
        <button type="button" onclick="ResetearFormulario('formRegistro')">Limpiar Formulario</button>
    </form>
    
</body>
</html>