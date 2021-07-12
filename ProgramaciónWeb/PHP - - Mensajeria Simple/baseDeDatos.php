<?php

include "credenciales.php";

function CrearConexion(){    
    

    $conexion = new mysqli( $GLOBALS['servidor'], 
                            $GLOBALS['usuario'], 
                            $GLOBALS['password'], 
                            $GLOBALS['bdd']);

    if ($conexion->connect_error) {
        die("ERROR: " . $conexion->connect_error);
    }
    return $conexion;
}


function IniciarSesion($nombre, $ci){
    
}

?>