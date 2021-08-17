<?php
include "clases.php";
//session_start();


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

/**
 * Crea un token de acuerdo a varios modos:
 * 1 - acceso
 * 2 - inicio de login
 * 3 - login autorizado
 */
function CrearToken($modo,$usuario=null){
    $token = new Token;

    //1 - Obtenemos la marca de tiempo del sistema
    $tiempo = time();

    //2 - Obtenemos el ID de sesión
    $sesion = session_id();
    
    switch ($modo) {
        case 1:
            //Si el $modo es 1, creamos un token temporal
            $tipo = "temporal";
            $ID = password_hash($sesion.$tiempo,PASSWORD_BCRYPT);
            
            $token->tipo = $tipo;
            $token->valor = $ID;
            
            break;
            
        case 2:
            //Si el modo es 2, se comprobó la existencia del usuario
            // y es un dato requerido
            if ( isset($usuario) ) {
                
            }
            
            $tipo = "preingreso";
            
            break;
        
        case 3:
            # code...
            break;
        
        default:
            echo("");
            break;
    }

    return $token;
}


?>