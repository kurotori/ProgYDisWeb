<?php
    
    include_once "../../clases.php";
    include_once "../../funciones.php";

    if ( ! empty($_GET['id_usuario']) and ! is_null($_GET['id_usuario'])) {
       $id_usuario = validarDatos($_GET['id_usuario']);

       if ( ! empty($id_usuario) and ! is_null($id_usuario) ) {
            $usuario = new Usuario();
            $usuario->estado = "OK";
            $usuario->mensaje = "OK";
            
            $usuario->id = $id_usuario;

            $json = TransformarEnJSON($usuario);
            MostrarJSON($json);
        }

    }


   

    

    
    

?>