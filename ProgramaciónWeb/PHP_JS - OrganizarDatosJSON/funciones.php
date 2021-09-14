<?php

//Pasa un objeto a JSON
    function TransformarEnJSON($objeto){
        //1 - Creamos un objeto mediante la clase standard
        $jsonDatos = new stdClass;

        //2 - Obtenemos la clase del objeto
        $nombreClase = get_class($objeto);

        //3 - Creamos un array asociativo asignando el objeto al mismo
        //  con su nombre de clase.
        $jsonDatos=array("$nombreClase"=>$objeto);

        //4 - Creamos un objeto y le asignamos la conversión de los datos
        //  a formato JSON al mismo.
        $objJSON = json_encode($jsonDatos);

        //5 - Cerramos la función entregando los datosen formato  JSON
        return $objJSON;
    }


    function MostrarJSON($datosEnJSON){
        // Encabezados requeridos para la correcta lectura de los datos en el lado
        //  del cliente.
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    
        //Establecemos el código de respuesta HTTP correspondiente
        // el código 200 indica que el procedimiento fue exitoso.
        http_response_code(200);
    
        //Devolvemos el contenido del objeto $datosEnJSON mediante echo.
        echo($datosEnJSON);
    
    }
?>