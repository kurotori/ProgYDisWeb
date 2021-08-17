<?php

    class Dato{
        public $nombre="";
        public $datos="";
    }

    class Item{
        public $id = 0;
        public $numero = "";
        public $valor = "";
    }

    function CrearJson(Dato $objeto){
        $datosJSON = new stdClass;
        $clase = get_class($objeto);
        $datosJSON = array($clase=>$objeto);
        $objJSON = json_encode($datosJSON);
        return $objJSON;
    }

    function MostrarJSON($objJSON){
        // required headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);
        echo($objJSON);
    }

    function GenerarDatos(){
        $datos = new Dato;
        $datos->nombre = "Resultado";

        $datos->datos = new stdClass;
        $datos->datos = array();

        for ($i=0; $i < 75; $i++) {
            $item = new Item;

            $item->id = $i;

            $tiempo = time();
            $item->numero = $tiempo;
            
            $valor = password_hash($tiempo, PASSWORD_BCRYPT);
            $item->valor = $valor;

            array_push($datos->datos, $item);
        }

        return $datos;
    }

    $a = GenerarDatos();
    $objJSON = CrearJson($a);
    MostrarJSON($objJSON);

?>