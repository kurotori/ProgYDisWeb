<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables en PHP</title>
</head>
<body>
    
    <?php

        /**
         * PHP es un lenguaje LEVEMENTE TIPADO (a diferencia de Java que es FUERTEMENTE TIPADO)
         * eso permite declarar variables sin tener que especificar sus tipos.
         * Esto no significa que el tipo no importa, sino que el tipo de la variable se define 
         * de forma dinámica POR SU CONTENIDO.
         * 
         * Para declarar una variable simplemente se escribe el símbolo '$' seguido del nombre deseado
         * para la variable. Luego se inicializa la variable asignándole un valor mediante el símbolo '='
         */

        $variable1 = 10;

        echo 'La variable llamada <b>\'variable1\'</b> tiene este valor: '.$variable1.'<br/>';

        /**
         * Para acceder al contenido de una variable, o para asignarle un valor nuevo, siempre debemos usar su nombre 
         * con el símbolo '$'.
         * 
         * El punto '.' permite concatenar texto y el contenido de variables. Esto es útil para incluír el contenido
         * de variables en expresiones.
         * 
         * La barra invertida '\' indica que un caracter debe ser considerado como tal y no por su efecto en el código.
         * Por ejemplo, en la línea de echo más arriba, los paréntesis simples estan "escapados" y no se los considera
         * para cerrar el texto.
         */

        echo 'Tipo de la variable llamada <b>\'variable1\'</b>: '.gettype($variable1).'<br/>';

        /**
         * Tambien se puede concatenar el resultado de funciones en un texto mediante el punto.
         * En este caso se usa la función 'gettype()' que analiza una variable y devuelve su tipo de datos actual.
         */

        echo '<br/>';


        $variable1 = "Otra cosa";

        echo 'La variable llamada <b>\'variable1\'</b> tiene este valor: '.$variable1.'<br/>';
        echo 'Tipo de la variable llamada <b>\'variable1\'</b>: '.gettype($variable1).'<br/>';

        
        
    ?>

    <br/>

    <?php
        echo "Estado Final de la variable <b>'variable1'</b>: Contenido = $variable1 Tipo = ".gettype($variable1);

        /**
         * Otra forma de mostrar el contenido de una variable dentro de un texto usando el comando echo es
         * mediante comillas dobles (" "). Dentro de las comillas dobles las variables se reemplazan por su contenido
         * sin necesidad de usar una concatenación. Este método no funciona con el resultado de las funciones (como gettype)
         * el cual debe concatenarse o almacenarse en una variable para ser mostrado.
         * Otra limitación de las comillas dobles es que consumen más recursos que las comillas simples, por lo que se recomienda
         * utilizarlas solo cuando es estríctamente necesario.
         */
    ?>



</body>
</html>