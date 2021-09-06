<?php

    
    class BaseDeDatos{
        public $conexion;
        public $estado;
        public $mensaje;
    }

    function CrearConexion(){
        $servidor="localhost";
        $usuario="";
        $password="";
        $bdd="registro";

        $basededatos = new BaseDeDatos;

        $basededatos->conexion = new mysqli($servidor, $usuario, $password, $bdd);
        $basededatos->estado = "OK";
        $basededatos->mensaje = "OK";

        if ($basededatos->conexion->connect_error) {
            $basededatos->estado = "ERROR";
            $basededatos->mensaje = $basededatos->$conexion->connect_error;
            return $basededatos;
            exit(1);
        }
        return $basededatos;
    }


    function UsuarioYaExiste($usuario){
        $basededatos = CrearConexion();
        $consulta = "SELECT count(*) as 'conteo' from usuario WHERE nombre = '".$usuario."'";
        
        $respuesta = $basededatos->conexion->query($consulta);

        $cant=0;
        $resultado = false;

        if ($respuesta->num_rows > 0) {
            
            while ($fila = $respuesta->fetch_assoc()) {
                $cant = (int)$fila['conteo'];
                if ($cant == 1) {
                    $resultado = true;
                }
            }
        }
        $basededatos->conexion->close();

        return $resultado;        
    }


    function RegistrarUsuario($nombre, $passHash, $passToken){
        $basededatos = CrearConexion();

        $resultado = array();

        $consulta = "INSERT INTO usuario(nombre,passHash,passToken) values (?,?,?)";

        $sentencia = $basededatos->conexion->prepare($consulta);
        $sentencia->bind_param("sss", $nomUsuario, $pHash, $pToken);

        $nomUsuario = $nombre;
        $pHash = $passHash;
        $pToken = $passToken;

        if ( !( $sentencia->execute() ) ) {
            //ERROR: No se pudo concretar el registro por errores con el servidor
            $resultado = array(
                "estado" => $basededatos->estado,
                "mensaje" => $basededatos->mensaje
            );
        }
        else {
            $resultado = array(
                "estado" => "EXITO",
                "mensaje" => "El usuario $nombre se registró con éxito"
            );
        }
        $sentencia->close();
        $conexion->close();

        return $resultado;

    }

?>