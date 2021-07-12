<?php
    session_start();
    $nombre="";
    $puntaje=0;
    $valorRuleta=0;
    $valorApuesta=0;
    $mensaje="";
    $resultado="";


    if ( isset($_SESSION['nombre']) && isset($_SESSION['puntaje'] )) {
        $nombre = $_SESSION['nombre'];
        $puntaje = $_SESSION['puntaje'];
    }
    elseif( strlen($_POST['nombre']) > 0 ) {
        $nombre = $_POST['nombre'];
        $puntaje = 100;
        
        $_SESSION['nombre'] = $nombre;
        $_SESSION['puntaje'] = $puntaje;
    }
    else{
        header("Location: index.php?error=No ingresaste un nombre.");
        exit();
    }


    if ( isset( $_POST['valorApuesta'] ) ) {
        $valorApuesta = (int) $_POST['valorApuesta'];
        $valorRuleta = rand(1,10);
        $mensaje = "La ruleta dió un $valorRuleta, y tu apostaste un $valorApuesta";

        if ($valorApuesta == $valorRuletaR) {
            $puntaje = $puntaje + 10;
            $resultado = "GANASTE";
        }
        else{
            $puntaje = $puntaje - 10;
            $resultado = "PERDISTE";
        }
    }
    else {
        $mensaje = "Realiza tu apuesta";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta</title>
</head>
<body>
    <h1>Ruleta</h1>
    
    <h2>
        <?php
        
        ?>
    </h2>
    <h2>Mensaje</h2>

    <h2>Realiza tu apuesta:</h2>
    <form action="ruleta.php" method="post">
        <label for="ap1">1</label>
        <input type="radio" name="apuesta" id="ap1" value=1>
        <label for="ap2">2</label>
        <input type="radio" name="apuesta" id="ap2" value=2>
        <label for="ap3">3</label>
        <input type="radio" name="apuesta" id="ap3" value=3>
        <label for="ap1">4</label>
        <input type="radio" name="apuesta" id="ap4" value=4>
        <label for="ap1">5</label>
        <input type="radio" name="apuesta" id="ap5" value=5>
        <label for="ap1">6</label>
        <input type="radio" name="apuesta" id="ap6" value=6>
        <label for="ap1">7</label>
        <input type="radio" name="apuesta" id="ap7" value=7>
        <label for="ap1">8</label>
        <input type="radio" name="apuesta" id="ap8" value=8>
        <label for="ap1">9</label>
        <input type="radio" name="apuesta" id="ap9" value=9>
        <label for="ap1">10</label>
        <input type="radio" name="apuesta" id="ap10" value=10>

        <input type="submit" value="Apostar">
    </form>



</body>
</html>