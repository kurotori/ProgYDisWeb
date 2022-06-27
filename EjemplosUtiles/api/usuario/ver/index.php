<?php
    include_once("../../clases.php");
    include_once("../../funciones.php");
    include_once("../../basededatos.php");

    if ( ! empty($_GET['nombre']) 
        and 
        isset($_GET['nombre'])
        ) 
        {
        $nombre = $_GET['nombre'];
        
        $respuesta = buscarUsuario($nombre);

        $json = TransformarEnJSON($respuesta);
        MostrarJSON($json); 
    }

    function buscarUsuario($nombre){
        $bdd = CrearConexion();
        $respuesta = new Respuesta();

        if ( strstr($bdd->estado,"OK") ) {
            $conexion = $bdd->conexion;

            $consulta = 
            "SELECT nombre,ci,fecha_nac,email from usuario where nombre like ?";
            $termino = "%".$nombre."%";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->bind_param("s",$termino);
            $sentencia->execute();

            $resultado = $sentencia->get_result();
            $respuesta->estado = "OK";
            $respuesta->mensaje = "OK";

            if ( $resultado->num_rows > 0 ) {
                $respuesta->datos = array();
                
                foreach($resultado as $fila){
                    $usuario = new Usuario();
                    
                    $usuario->nombre = $fila['nombre'];
                    $usuario->ci = $fila['ci'];
                    $usuario->fecha_nac = $fila['fecha_nac'];
                    $usuario->email = $fila['email'];

                    array_push($respuesta->datos, $usuario);
                }

            } else {
                $respuesta->mensaje = "No hubieron resultado";
            }

            $sentencia->close();
            $conexion->close();
            
        }
        else{
            $respuesta->estado = $bdd->estado;
            $respuesta->mensaje = $bdd->mensaje;
        }
        return $respuesta;
    }
?>