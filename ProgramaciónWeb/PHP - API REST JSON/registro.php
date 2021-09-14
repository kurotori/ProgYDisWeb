<?php
    session_start();
    
    include "funciones.php";

    //Variables Auxiliares
    $nombre="";
    $hashPass="";

    //Objeto resultado para almacenar la respuesta del servidor
    $respuestaSRV = new Respuesta;

    //1 - Chequeamos si se envió un dato con el nombre de usuario, y que tenga algún caracter
    if ( isset($_POST['nombre']) and strlen($_POST['nombre'])>0 ) {

        //2 - Realizamos lo mismo con el valor del hash.
        if ( isset($_POST['hash']) and strlen($_POST['hash'])>0 ) {
            
            //3 - Si nombre y hash son válidos, los almacenamos en las variables auxiliares
            $nombre = $_POST['nombre'];
            $hashPass = $_POST['hash'];

            //4 - Chequeamos que no haya un usuario con el mismo nombre antes de continuar
            if ( UsuarioYaExiste($nombre) ) {
                
                //Si hay un usuario con ese nombre, se devuelve un error en el objeto resultado
                $respuestaSRV->estado="ERROR";
                $respuestaSRV->mensaje="El usuario '$nombre' ya existe";
            }
            else {
                //Si el usuario NO existe creamos un token de registro
                // y con el, un token con el hash de la contraseña
                $token = GenerarToken();
                $passToken = GenerarPassToken($hashPass, $token);
                
                //Registramos al usuario en la base de datos con su nombre, 
                //  el token y el token de contraseña. El resultado de la 
                //  operación se almacena en una variable auxiliar.
                $resultado = RegistrarUsuario($nombre, $token, $passToken);

                //Almacenamos en el objeto de respuesta el resultado de la operación.
                $respuestaSRV->estado = $resultado->estado;
                $respuestaSRV->mensaje = $resultado->mensaje;
            }
        }

        //Los siguientes casos manejan errores en los datos recibidos.
        //   Los detalles de los mismos se almacenan en el objeto resultado.
        // ERROR: No hay hash de contraseña en los datos recibidos
        else {
            $respuestaSRV->estado="ERROR";
            $respuestaSRV->mensaje="Falta una contraseña";
        }

    }
    // ERROR: No hay nombre en los datos recibidos
    else {
        $respuestaSRV->estado="ERROR";
        $respuestaSRV->mensaje="Falta un nombre";
    }

    //Se transforma el objeto resultado en una secuencia JSON
    //   y se lo almacena en una variable auxiliar.
    $datosJSON = TransformarEnJSON($respuestaSRV);

    //Se envía la secuencia JSON al JavaScript
    MostrarJSON($datosJSON);

?>