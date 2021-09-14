<?php
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    /**
     * Clase para contener una conexión a la base de datos.
     * Incluye el estado de la misma y los posibles mensajes de error.
     */
    class BaseDeDatos{
        public $conexion;
        public $estado;
        public $mensaje;
    }


    /**
     * Crea una nueva conexión a la base de datos en un objeto.
     */
    function CrearConexion(){
        $servidor="localhost";
        $usuario="alumno";
        $password="alumno";
        $bdd="registro";

        $basededatos = new BaseDeDatos;

        $basededatos->conexion = new mysqli($servidor, $usuario, $password, $bdd);
        $basededatos->estado = "OK";
        $basededatos->mensaje = "OK";

        if ($basededatos->conexion->connect_error) {
            $basededatos->estado = "ERROR";
            $basededatos->mensaje = $basededatos->conexion->connect_error;
            return $basededatos;
            exit(1);
        }
        return $basededatos;
    }

?>