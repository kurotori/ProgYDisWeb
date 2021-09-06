<?php

    include "clases.php";


    function CrearConexion(){
        $servidor="localhost";
        $usuario="";
        $password="";
        $bdd="registro";

        $conexion = 

        $conexion = new mysqli($servidor, $usuario, $password, $bdd);

        if ($conexion->connect_error) {
            die("ERROR: " . $conexion->connect_error);
        }
        return $conexion;
    }


    function UsuarioYaExiste($usuario){
        $conexion = CrearConexion();
        $consulta = "SELECT count(*) as 'conteo' from usuario WHERE nombre = '".$usuario."'";
        
        $respuesta = $conexion->query($consulta);

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
        $conexion->close();

        return $resultado;        
    }


    function RegistrarUsuario($nombre, $passHash, $passToken){
        $conexion = CrearConexion();

        $resultado = array();

        $sentencia = $conexion->prepare("INSERT INTO usuario(nombre,passHash,passToken) values (?,?,?)");
        $sentencia->bind_param("sss", $nomUsuario, $pHash, $pToken);
        $nomUsuario = $nombre;
        $pHash = $passHash;
        $pToken = $passToken;

        if ( !( $sentencia->execute() ) ) {
            //ERROR: No se pudo concretar el registro por errores con el servidor
            $resultado = array(
                "estado" => "ERROR",
                "mensaje" => $conexion->error
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


    function obtenerLibrosEnTabla(){
        $conexion = CrearConexion();
        $consulta = "SELECT titulo,genero,fecha_pub,ISBN from libro order by genero,titulo";

        $resultado = $conexion->query($consulta);
        
        $tabla="";

        if($resultado->num_rows > 0){
            while( $fila = $resultado->fetch_assoc() ){
                $tabla = $tabla . "<tr>";
                $tabla = $tabla . "<td>" . $fila["titulo"] . "</td>";
                $tabla = $tabla . "<td>" . $fila["genero"] . "</td>";
                $tabla = $tabla . "<td>" . $fila["fecha_pub"] . "</td>";
                $tabla = $tabla . "<td>" . $fila["ISBN"] . "</td>";
                $tabla = $tabla . "</tr>";
            }
        }
        else{
            $tabla = "<tr><td colspan='4'>No se encontraron libros en la Base de Datos</td></tr>";
        }

        $conexion->close();

        return $tabla;
    }

?>