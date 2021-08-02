<?php

    $servidor = "localhost";
    $usuario = "root";
    $password = "soloyoeh";
    $bdd = "libreria";


    function ObtenerCredenciales(){
        //Creamos el objeto para los datos en forma de array
        $credenciales = array();

        //Cargamos los datos en el array con claves
        $credenciales['servidor'] = $GLOBALS['servidor'];
        $credenciales['usuario'] = $GLOBALS['usuario'];
        $credenciales['password'] = $GLOBALS['password'];
        $credenciales['bdd'] = $GLOBALS['bdd'];
        
        //Retornamos el array con los datos
        return $credenciales;
    }

    print_r (ObtenerCredenciales());
?>