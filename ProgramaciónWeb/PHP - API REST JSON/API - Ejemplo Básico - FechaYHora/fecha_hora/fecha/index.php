<?php 
    include_once "../../base/index.php";

    $fecha = new Fecha;
    $fecha->dia = date("d");
    $fecha->mes = date("m");
    $fecha->anio = date("Y");

    $respuesta = new Respuesta;

    $respuesta->estado = "OK";
    $respuesta->datos = $fecha;

    $json = TransformarEnJSON($respuesta);
    MostrarJSON($json);
?>