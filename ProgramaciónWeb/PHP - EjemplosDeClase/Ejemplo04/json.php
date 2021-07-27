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


    class Libro{
        public $titulo = "";
        public $genero = "";
        public $fecha_pub = "";
        public $ISBN = "";
    }

    

    function ObtenerLibrosJSON(){
        $conexion = CrearConexion();

        $consulta = "SELECT titulo,genero,fecha_pub,ISBN from libro WHERE titulo like 'A%' order by genero,titulo";

        $resultado = $conexion->query($consulta);

        $DatosJSON = new stdClass;
        $libros = array();

        if( $resultado->num_rows > 0 ){

            while ( $fila = $resultado->fetch_assoc() ) {
                $libro = new Libro;
                $libro->titulo = $fila['titulo'];
                $libro->genero = $fila['genero'];
                $libro->fecha_pub = $fila['fecha_pub'];
                $libro->ISBN = $fila['ISBN'];
                array_push($libros,$libro);
            }
            $DatosJSON=array("Resultado"=>$libros);

        }
        else{
            $DatosJSON=array("Resultado"=>"No se encontraron libros");
        }

        $ResultadoJSON = json_encode($DatosJSON);
        return $ResultadoJSON;
    }

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $datos = ObtenerLibrosJSON();
    http_response_code(200);
    echo($datos);

?>