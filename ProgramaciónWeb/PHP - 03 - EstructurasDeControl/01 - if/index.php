<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de control - if</title>
</head>
<body>


    <?php

    /**
     * La estructura IF permite que el programa realice una acción (o no la realice) de acuerdo
     * al cumplimiento de una condición.
     * 
     * la sintaxis de IF es la siguiente:
     * 1) IF SIMPLE
     * 
     *      if ( condición ){
     *          acciones que se ejecutan si la condición se cumple o su valor es TRUE
     *      }
     * 
     * 2) IF COMPLETO
     * 
     *      if ( condición ){
     *          acciones que se ejecutan si la condición se cumple o su valor es TRUE
     *      }
     *      else {
     *          acciones que se ejecutan si la condición NO se cumple o su valor es FALSE
     *      }
     */

     $numero = 35;

     echo '<h1>';

     if ($numero < 30) {
         echo 'El número es menor que 30';
     }
     else {
         echo 'El número es mayor o igual que 30';
     }

     echo '</h1>';

    ?>


</body>
</html>

