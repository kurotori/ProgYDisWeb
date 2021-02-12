<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Introducción a PHP</title>
</head>
<body>
    
    <?php
        /**
         * Este texto esta COMENTADO y no será interpretado por el servidor al ejecutarse el archivo.
         * 
         * Todo código PHP debe declararse DENTRO de un bloque de código PHP.
         * El bloque se abre mediante '<?php' y se cierra mediante '?>'
         * 
         * Los bloques PHP pueden ir ENTRE el resto del código HTML sin problemas
         */


        echo '<h1>Este texto lo genera PHP</h1>';
        /**
         * El comando 'echo' indica al intérprete PHP que debe enviar el contenido indicado hacia
        * el navegador
        */

        echo '<br/>';

        /**
         * Dentro de un bloque PHP todo código HTML que querramos utilizar debe ser mediante un comando echo.
         */
    ?>

    <h1>Este texto esta fijo en el HTML</h1>

    <?php

        /**
         * Un bloque PHP puede cerrarse y abrirse otro bloque sin problemas. El intérprete PHP analiza todos los bloques
         * como una sola entidad.
         */
        echo '<h1>Este texto también lo genera PHP</h1>';
    ?>


</body>
</html>





