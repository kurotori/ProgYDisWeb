<?php

    function CrearConexion(){
        $servidor = "localhost";
        $usuario = "root";
        $password = "soloyoeh";
        $bdd = "libreria";

        $conexion = new mysqli($servidor,$usuario,$password,$bdd);

        if( $conexion->connect_error ){
            die("ERROR: " . $conexion->connect_error);
        }

        return $conexion;
    }


    function ObtenerLibrosEnTabla(){
        $conexion = CrearConexion();

        $consulta = "SELECT titulo,genero,fecha_pub,ISBN from libro WHERE titulo like 'A%' order by genero,titulo";

        $resultado = $conexion->query($consulta);

        $tabla = "";

        if( $resultado->num_rows > 0 ){

            while ( $fila = $resultado->fetch_assoc() ) {
                $tabla = $tabla . "<tr>";
                $tabla = $tabla . "<td>" . $fila['titulo'] . "</td>";
                $tabla = $tabla . "<td>" . $fila['genero'] . "</td>";
                $tabla = $tabla . "<td>" . $fila['fecha_pub'] . "</td>";
                $tabla = $tabla . "<td>" . $fila['ISBN'] . "</td>";
                $tabla = $tabla . "</tr>";
            }

        }
        else{
            $tabla = "<tr><td colspan=4> No se encontraron libros </td></tr>";
        }

        return $tabla;
    }

?>