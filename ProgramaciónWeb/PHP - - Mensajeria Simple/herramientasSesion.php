<?php

    function validarDatosSesionPOST(){
        $validacion=false;
        if ( strlen( $_POST['nombre'] ) > 0 && strlen( $_POST['ci'] ) > 0 ) {
            $validacion = true;            
        }
        return $validacion;
    }

    function validarDatosSesionSESSION(){
        $validacion=false;
        if ( isset( $_SESSION['nombre'] ) && isset( $_SESSION['ci'] ) ) {
            $validacion = true;
        }
        return $validacion;
    }


?>