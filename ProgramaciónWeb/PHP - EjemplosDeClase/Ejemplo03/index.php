<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Estructuras de Control</h1>
    <ol>
        <h2>Condicionales</h2>
        <h3><li>IF</li> </h3>
        <p>

        <?php
            $numeroA = 35;
            $numeroB = 25;

            if ($numeroA < 30) {
                echo('Este texto NO se va a ver');
            }

            if ($numeroB < 30) {
                echo('Este texto SI se va a ver');
            }
        ?>

        </p>
        <h3><li>IF / ELSE</li></h3>

        <p>
            <?php
                if ($numeroA < 30) {
                    echo('El numeroA es menor a 30');
                }
                else {
                    echo('El numeroA es mayor a 30');
                }
            ?>
        </p>

        <h3><li>IF / ELSEIF</li></h3>
        <p>
            <?php
                if ($numeroA < 30) {
                    echo('El numeroA es menor a 30');
                }
                elseif($numeroA < 40) {
                    echo('El numeroA es menor a 40');
                }
            ?>
        </p>
        <h3><li>IF / ELSEIF / ELSE</li> </h3>
        <p>
            <?php
                if ($numeroA < 30) {
                    echo('El numeroA es menor a 30');
                }
                elseif($numeroA < 40) {
                    echo('El numeroA es menor a 40');
                }
                else{
                    echo('El numeroA es mayor o igual a 30');
                }
            ?>
        </p>
        <h3><li>SWITCH / CASE</li> </h3>
        <p>
            <?php
                $opcion = "rojo";
                $resultado = "";
                switch($opcion){
                    case "rojo":
                        $resultado = "Rojo";
                        break;
                    case "azul":
                        $resultado = "Azul";
                        break;
                    case "verde":
                        $resultado = "Verde";
                        break;
                }
                echo ("Color $resultado");
            ?>
        </p>
        <h2>Bucles</h2>
        <h3><li>WHILE</li> </h3>
        <p>
            <ol>
            <?php
                $contador = 0;

                while($contador < 10){
                    echo("<li>");
                    echo("Contador: $contador");
                    echo("</li>");
                    $contador++;
                }
            ?>
            </ol>
        </p>

        <h3><li>FOR</li> </h3>
        <p>
            <ol>
            <?php

                for ($contador=0; $contador < 10; $contador++) { 
                    echo("<li>");
                    echo("Contador: $contador");
                    echo("</li>");
                }
            ?>
            </ol>
        </p>
        
        <h3><li>DO WHILE</li> </h3>
        <p>
            <ol>
            <?php
                $contador = 10;

                do{
                    echo("<li>");
                    echo("Contador: $contador");
                    echo("</li>");
                    $contador++;
                }
                while($contador < 10);
            ?>
            </ol>
        </p>

        
        <h3><li>FOREACH</li> </h3>
        <p>
            <ol>
            <?php
                $lista = array("A 10","B 9","C 8","D 7");
/*La función array() devuelve un array/lista de los elementos incluidos entre paréntesis
*/
foreach ($lista as $elemento) {
echo("<li>");
echo("Item de Lista: $elemento");
echo("</li>");
}

            ?>
            </ol>
        </p>


    </ol>

</body>
</html>