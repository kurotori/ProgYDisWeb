<?php
    include "basededatos.php";
    include "funciones.php";
    include "clases.php";

    $nombre = $_POST['nombre'];

    $respuesta = new Respuesta;
    
    if ( UsuarioYaExiste($nombre) ) {
        $respuesta->estado = "OK";
        $respuesta->mensaje = "El usuario ".$nombre." esta registrado";
    }
    else{
        $respuesta->estado = "ERROR";
        $respuesta->mensaje = "El usuario ".$nombre." NO esta registrado";
    }

    $datosJSON = TransformarEnJSON($respuesta);
    
    MostrarJSON($datosJSON);




?>