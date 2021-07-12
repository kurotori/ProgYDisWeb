<?php
    session_start();

    if ( isset($_SESSION['nombre']) && isset($_SESSION['puntaje'] )) {
        //Si 'nombre' y 'puntaje' estan definidos en la sesión, el usuario
        //inició correctamente una nueva partida y recuperamos esos datos para usarlos
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

?>