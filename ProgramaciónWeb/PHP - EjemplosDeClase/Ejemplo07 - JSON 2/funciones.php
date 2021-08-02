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

    /**
     * Clase para los resultados.
     * Es recomendable declarar clases para cada tipo de resultado
     * que tengamos.
     */
    class Libro{
        public $titulo = "";
        public $genero = "";
        public $fecha_pub = "";
        public $ISBN = "";
    }

    

    function ObtenerLibrosJSON($datoBusqueda){
        //1 - Crear la Conexión
        $conexion = CrearConexion();

        
        //2.1 - Establecemos la consulta con parámetros
        $consulta = $conexion->prepare("SELECT titulo,genero,fecha_pub,ISBN from libro WHERE titulo like '?%' order by genero,titulo");
        
        //2.2 - Añadimos los parámetros en orden con su tipo
        $dato = $datoBusqueda;
        $consulta->bind_param("s", $dato);

        //3 - Ejecutar la consulta y guardar el resultado de la 
        // misma en el objeto '$resultado'
        $resultado = $consulta->execute();

        //4 - Declaramos objetos para manejar el resultado.
        //4.1 - Creamos el objeto '$DatosJSON' utilizando la clase standard
        // que usaremos para generar el objeto JSON luego.
        $DatosJSON = new stdClass;

        //4.2 - Creamos un array para almacenar los registros del resultado
        // como objetos independientes.
        $DatosLibros = array();

        //5 - Procesamos el resultado
        //5.1 - Chequeamos si el resultado tiene algún registro
        if( $resultado->num_rows > 0 ){

            //5.2 - Obtenemos de a uno los registros del resultado...
            while ( $fila = $resultado->fetch_assoc() ) {
                //...por cada uno creamos un objeto con la clase correspondiente...
                $libro = new Libro;

                //...completamos sus atributos con los datos del registro obtenido...
                $libro->titulo = $fila['titulo'];
                $libro->genero = $fila['genero'];
                $libro->fecha_pub = $fila['fecha_pub'];
                $libro->ISBN = $fila['ISBN'];

                //... y añadimos el objeto al array de registros.
                array_push($DatosLibros, $libro);
            }

            //5.3 - Añadimos el array de registros al objeto de datos...
            $DatosJSON = array("Resultado"=>$DatosLibros);

        }
        else{
            //... o un mensaje de error, si no hay ningún registro.
            $DatosJSON=array("Resultado"=>"No se encontraron libros");
        }

        //6 - Creamos '$ResultadoJSON', un objeto para almacenar los datos
        // en formato JSON, convertimos el objeto de datos a JSON y almacenamos
        // los datos en el objeto '$ResultadoJSON'
        $ResultadoJSON = json_encode($DatosJSON);

        //Cerramos la función devolviendo el objeto con los datos en formato JSON.
        return $ResultadoJSON;
    }


    function MostrarJSON(){
        // Encabezados requeridos para la correcta lectura de los datos en el lado
        //  del cliente.
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        //Creamos un objeto para los datos y llamamos a la función correspondiente.
        $datos = ObtenerLibrosJSON();

        //Establecemos el código de respuesta HTTP correspondiente
        // el código 200 indica que el procedimiento fue exitoso.
        http_response_code(200);

        //Devolvemos el contenido del objeto $datos mediante echo.
        echo($datos);

    }
    
?>