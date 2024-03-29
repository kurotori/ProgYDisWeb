<?php


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



/* Zona de Ejecución */
$info = new Resultado;
$info->estado = "";
$info->datos= "";

if ($_POST) {
    if (isset($_POST['modo']) ) {
        
        $modo = ValidarDatos($_POST['modo']);

        switch ($modo) {
            //Modo 1: Registro de Publicaciones
            case '1':
                $info = NuevaPublicacion();
                break;
            //Modo 2: Listado de Publicaciones
            case '2':
                $info = ObtenerListadoPublicaciones();
                break;
            case '3':
                //Modo 3: Subir una imagen
                $info=SubirImagen();
                # code...
                break;
            case '4':
                # Modo 4: Asociar una imagen a una publicación
                //$info = 
                break;
            default:
                # code...
                break;
        }
    }
}

$json = TransformarEnJSON($info);
MostrarJSON($json);

/* ----------------------------- */

/* CLASES */
    
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
 * Clase para contener resultados de la base de datos
 */

 class Resultado{
     public $estado;
     public $datos;
 }

 /**
  * Clase para contener una publicación
  */

  class Publicacion{
      public $id;
      public $titulo;
      public $fecha;
      public $descripcion;
      public $imagenes;
  }

  /**
   * Clase para contener los datos de imágenes
   */

   class Imagen{
       public $id;
       public $ruta;
   }

/**
 * Crea una nueva conexión a la base de datos en un objeto.
 */
function CrearConexion(){
    $servidor="localhost";
    $usuario="alumno";
    $password="alumno";
    $bdd="ejemPubl";

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


 /**
     * Transforma un objeto en una secuencia JSON para
     * enviar como respuesta a una solicitud.
     */
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

    /**
     * Permite convertir datos de imágen en base64 a un archivo en el servidor.
     * Devuelve un objeto de clase Resultado o la ruta completa a la imágen en el servidor 
     * o False en caso de error
     */
    function DatosAImagen($datos_base64, $ruta, $id_imagen) {
        $resultado = new Resultado;

        $datos_puros = explode(',', $datos_base64);
        $extension = explode('/', explode(';', $datos_puros[0])[0])[1];

        $ruta_completa = $ruta.'/'.$id_imagen.'.'.$extension;

        $archivo = fopen($ruta_completa, "w");

        if ($archivo) {
            fwrite($archivo, base64_decode($datos_puros[1]));
            fclose($archivo);
            $resultado->estado = "OK";
            $resultado->datos = $ruta_completa;
        } else {
            $resultado->estado = "ERROR";
            $error = error_get_last();
            $resultado->datos = $error['message']." Archivo: ".$error['file']." Línea:".$error['line'];
        }
        return $resultado;
    }


    /** Funciones de manejo de publicaciones */

    /**
     * Permite obtener el listado de publicaciones almacenadas en el servidor
     */
    function ObtenerListadoPublicaciones(){
        $basededatos = CrearConexion();
        $resultado = new Resultado;

        //Chequeamos posibles errores en la conexión a la BdD
        if ($basededatos->estado == "ERROR") {
            $resultado->estado = $basededatos->estado;
            $resultado->datos = $basededatos->mensaje;
        }
        else {
            $consulta = "SELECT id, titulo, descripcion, fecha from publicacion order by fecha DESC";
            $respuesta = $basededatos->conexion->query($consulta);

            if ($respuesta->num_rows > 0) {
                $resultado->estado = "OK";
                $resultado->datos = array();
                while ($fila = $respuesta->fetch_assoc()) {
                    $publicacion = new Publicacion;
                    $publicacion->id = $fila['id'];
                    $publicacion->titulo = $fila['titulo'];
                    $publicacion->fecha = $fila['fecha'];
                    $publicacion->descripcion = $fila['descripcion'];
                    //Esta función no obtiene las imágenes.
                    $publicacion->imagenes = "";

                    array_push($resultado->datos,$publicacion);
                }
            }
            else {
                $resultado->estado = "OK";
                $resultado->datos = "No se encontraron registros";
            }
        }

        $basededatos->conexion->close();
        return $resultado;
    }

    /**
     * Registra una nueva publicación en la base de datos
     */
    function NuevaPublicacion(){
        $resultado = new Resultado;
        $basededatos = CrearConexion();

        $titulo = ValidarDatos($_POST['titulo']);
        $descripcion = ValidarDatos($_POST['descripcion']);

        $consulta = "INSERT into publicacion(titulo,descripcion) values (?,?)";
        $sentencia = $basededatos->conexion->prepare($consulta);
        $sentencia->bind_param("ss",$titulo,$descripcion);
        $sentencia->execute();
        $respuesta = $basededatos->conexion->insert_id;

        if ($respuesta>0) {
            $resultado->estado = "OK";
            $resultado->datos = $respuesta;//"La publicación '$titulo' se ha agregado con éxito con la ID $respuesta";
        }
        else {
            $resultado->estado = "ERROR";
            $resultado->datos = "No se pudo realizar la publicación";
        }

        $basededatos->conexion->close();
        return $resultado;
    }

    /**
     * Permite verificar que una publicación exista en la BdD.
     * Si existe, devuelve TRUE, de lo contrario, devuelve FALSE.
     */
    function PublicacionExiste($id_publicacion){
        $resultado = false;

        $id = intval(ValidarDatos($id_publicacion));
        $basededatos = CrearConexion();

        $consulta = "SELECT count(*) as conteo from publicacion WHERE id=?";
        $sentencia = $basededatos->conexion->prepare($consulta);
        $sentencia->bind_param("i",$id);
        $sentencia->execute();
        $respuesta = $sentencia->get_result();

        if ($respuesta->num_rows == 1) {
            $fila = $respuesta->fetch_assoc();
            if ($fila['conteo'] == 1) {
                $resultado=true;
            }
        }

        $basededatos->conexion->close();
        return $resultado;
    }

    /**
     * Permite subir una imágen al servidor y registrarla en la BdD.
     * Devuelve un objeto de clase Resultado con la ID de la imágen en la BdD o el detalle del error
     */
    function SubirImagen(){
        $resultado = new Resultado;
        $basededatos = CrearConexion();

        $consulta = "INSERT INTO imagen() values()";
        $basededatos->conexion->query($consulta);
        $imagenId = $basededatos->conexion->insert_id;

        $datosImagen = $_POST['datosImagen'];
        $ruta = DatosAImagen($datosImagen,"../imagenes",$imagenId);

        if ($ruta->estado == "ERROR") {
            $resultado->estado = "ERROR";
            $resultado->datos = $ruta->datos;

            $consulta3 = "DELETE FROM imagen WHERE id=$imagenId";
            $basededatos->conexion->query($consulta3);

        } else {
            $consulta2 = "UPDATE imagen set ruta=? where id=?";
            $sentencia = $basededatos->conexion->prepare($consulta2);
            $sentencia->bind_param("ss",$ruta->datos,$imagenId);
            $sentencia->execute();

            $resultado2 = AgregarImagenAPublicacion($imagenId);

            if ($resultado2->estado == "ERROR") {
                
            } else {
                
            }
            

            $resultado->estado = $imagenId;
            $resultado->datos = "OK";
        }
        
        $basededatos->conexion->close();
        return $resultado;
    }

    /**
     * Permite agregar una imágen a una publicación existente.
     * Devuelve un objeto de clase Resultado
     */
    function AgregarImagenAPublicacion($idImagen){ //$id_publicacion, $id_imagen){
        $id_publicacion = ValidarDatos($_POST['idPublicacion']);
        //$id_imagen = ValidarDatos($_POST['idImagen']);
        $resultado =  new Resultado;

        if ( PublicacionExiste($id_publicacion) ) {
            
            $basededatos = CrearConexion();
            $consulta="INSERT into tiene(publicacion_id, imagen_id) values (?,?)";
            $sentencia = $basededatos->conexion->prepare($consulta);
            $sentencia->bind_param("ii", $idPublicacion, $idImagen);
            $sentencia->execute();
            
            $resultado->estado="OK";
            $resultado->datos="OK";

            $basededatos->conexion->close();
        }
        else{
            $resultado->estado = "ERROR";
            $resultado->datos = "No se pudo agregar la imágen";
        }
        
        return $resultado;
    }




?>