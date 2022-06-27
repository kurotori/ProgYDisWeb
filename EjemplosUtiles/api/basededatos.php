<?php
    class BaseDeDatos{
        public $conexion;
        public $estado;
        public $mensaje;
    }

    function CrearConexion(){
        //INSEGURO
        $servidor = "localhost";
        $usuario = "alumno";
        $contrasenia = "alumno";
        $bdd = "registro";

        $basededatos = new BaseDeDatos();
        $basededatos->conexion = new mysqli(
            $servidor,
            $usuario,
            $contrasenia,
            $bdd
        );
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