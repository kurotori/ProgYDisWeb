<?php
    session_start();
    include "funciones.php";

    $token = GenerarToken();
    echo($token);
    $verif = password_verify(,$token);
    echo("<br>");
    echo($verif);
?>