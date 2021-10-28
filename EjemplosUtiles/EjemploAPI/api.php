<?php

    /* Zona de Ejecución */
    $info = new Respuesta;
    $info->estado = "";
    $info->datos= "";

    if ($_POST) {
        if (isset($_POST['modo']) ) {
            
            $modo = ValidarDatos($_POST['modo']);

            switch ($modo) {
                //Modo 1: Listado de todos los libros
                case '1':
                    $info = VerLibros();
                    break;
                //Modo 2: Buscar libros
                case '2':
                    $datoBusqueda = ValidarDatos($_POST['busqueda']);
                    $info = BuscarLibros($datoBusqueda);
                    break;
                //Modo 3: obtener datos completos de un libro y su autor
                case '3':
                    $isbnLibro = ValidarDatos($_POST['isbnLibro']);
                    $info = BuscarDatosDelLibro($isbnLibro);
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    $json = TransformarEnJSON($info);
    MostrarJSON($json);


    /** */
    class Respuesta{
        public $estado;
        public $datos;
    }


    class BaseDeDatos{
        public $conexion;
        public $estado;
        public $mensaje;
    }

    class Libro{
        public $isbn;
        public $titulo;
        public $genero;
        public $fecha_pub;
    }

    class Autor{
        public $nombreCompleto;
        public $nacionalidad;
        public $fecha_nac;
        public $fecha_dec;
    }


    /**
     * Valida y limpia datos de ingreso para evitar ataques de inyecciones SQL
     * @param datos Los datos de ingreso que se quieren limpiar.
     */
    function ValidarDatos($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }


    function CrearConexion(){
        $servidor="localhost";
        $usuario="alumno";
        $password="alumno";
        $bdd="libreria";
    
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
    

    function VerLibros(){
        $basededatos = CrearConexion();
        $respuesta = new Respuesta;
        
        $consulta = "SELECT isbn,titulo,genero,fecha_pub from libro";
        $datos = $basededatos->conexion->query($consulta);

        if ($datos->num_rows > 0) {
            $respuesta->estado = "OK";
            $respuesta->datos = array();

            while ( $fila=$datos->fetch_assoc() ) {
                $libro = new Libro;
                $libro->isbn = $fila['isbn'];
                $libro->titulo = $fila['titulo'];
                $libro->genero = $fila['genero'];
                $libro->fecha_pub = $fila['fecha_pub'];
                
                array_push($respuesta->datos, $libro);
            }
        }
        else {
            $respuesta->estado = "ERROR";
            $respuesta->datos = "No se encontraron registros";
        }

        $basededatos->conexion->close();
        return $respuesta;
    }


    /**
     * Busca los datos de libros de acuerdo a un criterio de búsqueda
     */
    function BuscarLibros($busqueda){
        $basededatos = CrearConexion();
        $respuesta = new Respuesta;
        
        $consulta = "SELECT ISBN,titulo,genero,fecha_pub from libro where titulo like ?";
        $sentencia = $basededatos->conexion->prepare($consulta);
        $termino = "%".$busqueda."%";
        $sentencia->bind_param("s",$termino);
        $sentencia->execute();

        $datos = $sentencia->get_result();

        if ($datos->num_rows > 0) {
            $respuesta->estado = "OK";
            $respuesta->datos = array();

            while ( $fila=$datos->fetch_assoc() ) {
                $libro = new Libro;
                $libro->isbn = $fila['ISBN'];
                $libro->titulo = $fila['titulo'];
                $libro->genero = $fila['genero'];
                $libro->fecha_pub = $fila['fecha_pub'];
                
                array_push($respuesta->datos, $libro);
            }
        }
        else {
            $respuesta->estado = "ERROR";
            $respuesta->datos = "No se encontraron registros";
        }

        $basededatos->conexion->close();
        return $respuesta;
    }

    function BuscarDatosDelLibro($isbnLibro){
        $basededatos = CrearConexion();
        $respuesta = new Respuesta;
        
        $consulta = "SELECT 
        libro.ISBN AS isbn, 
        libro.titulo AS titulo, 
        libro.genero AS genero, 
        libro.fecha_pub AS fecha_pub, 
        concat_ws(' ',autor.nombre, autor.apellido) as nombreCompleto, 
        autor.nacionalidad as nacionalidad, 
        autor.fecha_nac as fecha_nac, 
        autor.fecha_dec as fecha_dec
        from autor inner join escribe inner join libro
        where autor.DOC = escribe.autor_DOC
        and libro.ISBN = escribe.libro_ISBN
        and libro.ISBN = ?";

        $sentencia = $basededatos->conexion->prepare($consulta);
        $sentencia->bind_param("s",$isbnLibro);
        $sentencia->execute();

        $datos = $sentencia->get_result();

        if ($datos->num_rows > 0) {
            $respuesta->estado = "OK";
            $respuesta->datos = array();

            while ( $fila=$datos->fetch_assoc() ) {
                $libro = new Libro;
                $autor = new Autor;
                
                $libro->isbn = $fila['isbn'];
                $libro->titulo = $fila['titulo'];
                $libro->genero = $fila['genero'];
                $libro->fecha_pub = $fila['fecha_pub'];
                
                $autor->nombreCompleto = $fila['nombreCompleto'];
                $autor->nacionalidad = $fila['nacionalidad'];
                $autor->fecha_nac = $fila['fecha_nac'];
                $autor->fecha_dec = $fila['fecha_dec'];

                array_push($respuesta->datos, $libro);
                array_push($respuesta->datos, $autor);
            }
        }
        else {
            $respuesta->estado = "ERROR";
            $respuesta->datos = "No se encontraron registros";
        }

        $basededatos->conexion->close();
        return $respuesta;
    }


    function TransformarEnJSON($objeto){
        //1 - Creamos un objeto mediante la clase standard para 
        //  contener la secuencia JSON que crearemos.
        $jsonDatos = new stdClass;

        //2 - Obtenemos el nombre de la clase del objeto que queremos transformar
        $nombreClase = get_class($objeto);

        //3 - Creamos un array asociativo en el objeto contenedor, 
        // en el cual agregamos el objeto que queremos transformar 
        // asignándolo a su nombre de clase. 
        $jsonDatos=array("$nombreClase" => $objeto);

        //4 - Finalmente convertimos el objeto contenedor con la función json_encode
        //   y guardamos el resultado en una variable nueva.
        $objJSON = json_encode( $jsonDatos );

        //5 - Los datos en formato JSON se entregan con return para finalizar la función. 
        return $objJSON;
    }

    /**
     * Transforma un objeto con datos (debe basarse en una clase) en una secuencia
     * JSON para ser enviada al JavaScript del lado del cliente.
     */
    function MostrarJSON($datosEnJSON){
        // Encabezados requeridos para la correcta lectura de los datos en el lado
        //  del cliente.
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    
        //Establecemos el código de respuesta HTTP correspondiente
        // el código 200 indica que el procedimiento fue exitoso.
        http_response_code(200);
    
        //Devolvemos el contenido del objeto $datosEnJSON mediante echo.
        echo($datosEnJSON);
    
    }

?>