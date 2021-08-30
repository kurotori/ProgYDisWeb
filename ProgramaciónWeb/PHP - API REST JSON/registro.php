<?php
    session_start();
    
    include "clases.php";
    include "funciones.php";
    include "basededatos.php";

    $nombre="";
    $hashPass="";
    $respuestaSRV = new Respuesta;

    if ( isset($_POST['nombre']) ) {
        
        if ( isset($_POST['hash']) ) {
            
            $nombre = $_POST['nombre'];
            $hashPass = $_POST['hash'];

            

            //Chequeamos que no hay aun usuario con el mismo nombre antes de continuar
            if ( UsuarioYaExiste($nombre) ) {
                ///echo("El usuario ya existe");
                $respuestaSRV->estado="ERROR";
                $respuestaSRV->mensaje="El usuario '$nombre' ya existe";
            }
            else {
                //echo("El usuario NO existe");
                //Creamos un token de registro y con el, un token de contraseña
                $token = GenerarToken();
                $passToken = GenerarPassToken($hashPass, $token);
                
                $resultado = RegistrarUsuario($nombre, $hashPass, $passToken);
                
                $respuestaSRV->estado = $resultado["estado"];
                $respuestaSRV->mensaje = $resultado["mensaje"];
            }
        }
        // No hay hash de constraseña en los datos recibidos
        else {
            $respuestaSRV->estado="ERROR";
            $respuestaSRV->mensaje="Falta una contraseña";
        }

    }
    // No hay nombre en los datos recibidos
    else {
        $respuestaSRV->estado="ERROR";
        $respuestaSRV->mensaje="Falta un nombre";
    }

    $datosJSON = TransformarEnJSON($respuestaSRV);
    MostrarJSON($datosJSON);






/*
    $hash = GenerarToken();

    echo($hash);

    $res = (bool)UsuarioExiste("fulano");

    print_r($res);
*/




?>