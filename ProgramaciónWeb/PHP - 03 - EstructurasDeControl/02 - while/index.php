<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de Control - while</title>
</head>
<body>

    <h1>Una lista generada con un bucle While</h1>
    <ol>

        <?php

        /**
         * El bucle WHILE permite ejecutar un conjunto de instrucciones de forma repetitiva
         * mientras una condición se cumpla. Si la condición no se cumple, se termina la ejecución
         * del bucle. 
         * 
         * Esto implica dos cosas que deben tenerse en cuenta: 
         *      1) Si la condición nunca se cumple, el bucle nunca se ejecutará
         *      2) Si la condición nunca deja de cumplirse, el bucle nunca terminará de ejecutarse
         *          y seguirá consumiendo recursos del sistema.
         * 
         * La sintaxis de WHILE es la siguiente:
         *  
         *      while( condición ){
         *          acciones que se ejecutan si la condición se cumple o su valor es TRUE
         *      }
         * 
         */

        $numero = 1;

        while ($numero <= 15) {
            echo '<li> Elemento '.$numero.'</li>';
            $numero++;
            /**
             * Los símbolos '++' al final de una llamada a una variable (DEBE SER DE TIPO NUMÉRICO)
             * provocan que se sume 1 al valor de la variable.
             * Es equivalente a la siguiente línea de código: 
             *      $variable = $variable + 1;
             */

        }

        ?>

    </ol>
    
</body>
</html>