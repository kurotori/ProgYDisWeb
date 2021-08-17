<?php
    session_start();
    include "funciones.php";

    // class Cosa{
    //     public $dato;
    // }
    
    // $objeto = new Cosa;
    // $objeto->dato = "Esto es algo";

    // //MostrarJSON( TransformarEnJSON($objeto) );
    $token  = CrearToken(1);
    $datosJSON = TransformarEnJSON($token);
    MostrarJSON($datosJSON);
    
?>