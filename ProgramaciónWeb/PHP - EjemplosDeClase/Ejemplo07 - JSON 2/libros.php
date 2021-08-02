<?php

    include "funciones.php";

    if ( isset( $_GET['dato'] ) ) {
        $dato = $_GET['dato'];
        
        ObtenerLibrosJSON("$dato");
    }
    else {
        header("Location: index.php");
        exit();
    }

?>