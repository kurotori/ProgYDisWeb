<?php

    function validarDatosSesionPOST(){
        $validacion=false;
        if ( isset( $_POST['nombre'] ) && isset( $_POST['ci'] ) ) {
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