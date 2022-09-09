<?php
    
    include_once "../../clases.php";
    include_once "../../funciones.php";
    include_once "../../basesdedatos.php";



    if ( ! empty($_GET['nombre']) and ! is_null($_GET['nombre'])) {
       $nombre_usuario = validarDatos($_GET['nombre']);

       if ( ! empty($nombre_usuario) and ! is_null($nombre_usuario) ) {
            $respuesta = buscarUsuarios($nombre_usuario);
            $json = TransformarEnJSON($respuesta);
            MostrarJSON($json);
        }

    }

    
    function buscarUsuarios($nombre){
        $bdd =CrearConexion();
        $respuesta = new Respuesta();

        if ($bdd->estado == "OK") {
            $conexion = $bdd->conexion;
            
            $consulta = "SELECT nombre,ci,fecha_nac,email from usuario where nombre like ?";
            $sentencia = $conexion->prepare($consulta);
            //echo($nom);
            $termino = "%".$nombre."%";
            $sentencia->bind_param("s",$termino);
             $sentencia->execute();
            
        
                $resultado = $sentencia->get_result();
                
                $respuesta->estado = "OK";
                $respuesta->mensaje = "OK";
                $respuesta->datos = array();

                if ($resultado->num_rows > 0) {
                    
                    foreach($resultado as $fila){
                        $usuario = new Usuario();
                        $usuario->nombre = $fila['nombre'];
                        $usuario->ci = $fila['ci'];
                        $usuario->fecha_nac = $fila['fecha_nac'];
                        $usuario->email = $fila['email'];

                        array_push($respuesta->datos,$usuario);
                    }
                    /*
                    while ($fila = $resultado->fetch_assoc()) {

                    }
                    */
                }
                else{
                    $respuesta->estado = "OK";
                    $respuesta->mensaje = "No se encontraron resultados para la búsqueda";
                }

        
            //Cerramos la sentencia y la conexión
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