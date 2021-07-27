<?php

$puntaje = 0;
$apuesta = 0;
$valorRuleta = 0;

if(isset($_POST['apuesta'])){
   $apuesta = $_POST['apuesta'];
}

if(isset($_POST['puntaje'])){
    $puntaje = $_POST['puntaje'];
}

if ($apuesta!=0 && $puntaje!=0) {
    $valorRuleta = rand(1,10);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ruleta</h1>
    <h2>
        <?php
        if ($valorRuleta!=0) {
            echo("Salió un: $valorRuleta");
        }
        ?>
    </h2>
    <h2>
        <?php
            if ($apuesta==0 && $puntaje==0) {
                echo("Inicia un juego para continuar");
            }
            if($puntaje!=0){
                echo("Tienes $puntaje puntos");
            }
        ?>
    </h2>
    <h2>
        <?php
            if ($apuesta!=0) {
                echo("Apostaste al $apuesta");
            } else {
                # code...
            }
            
        ?>
    </h2>

    


    <form action="ruleta.php" method="post">
        <label for="a1">1</label>
        <input type="radio" name="apuesta" id="a1" value=1>
        <label for="a2">2</label>
        <input type="radio" name="apuesta" id="a2" value=2>
        <label for="a3">3</label>
        <input type="radio" name="apuesta" id="a3" value=3>
        <label for="a4">4</label>
        <input type="radio" name="apuesta" id="a4" value=4>
        <label for="a5">5</label>
        <input type="radio" name="apuesta" id="a5" value=5>
        <label for="a6">6</label>
        <input type="radio" name="apuesta" id="a6" value=6>
        <label for="a7">7</label>
        <input type="radio" name="apuesta" id="a7" value=7>
        <label for="a8">8</label>
        <input type="radio" name="apuesta" id="a8" value=8>
        <label for="a9">9</label>
        <input type="radio" name="apuesta" id="a9" value=9>
        <label for="a10">10</label>
        <input type="radio" name="apuesta" id="a10" value=10>
        <br>
        <input type="submit" value="Apostar">
    </form>

    <form action="ruleta.php" method="post">
        <input type="hidden" name="puntaje" id="puntaje" value=100>
        <input type="submit" value="Nuevo Juego">
    </form>
</body>
</html>