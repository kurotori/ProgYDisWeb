<?php


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
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
     * Permite obtener el listado de publicaciones almacenadas en el servidor
     */
    function ObtenerListadoPublicaciones(){
        $basededatos = CrearConexion();
        $consulta = "SELECT id, titulo, descripcion, fecha from publicacion order by fecha DESC";
        
        $resultado = new Resultado;
        
        $respuesta = $basededatos->conexion->query($consulta);

        if ($respuesta->num_rows > 0) {
            $resultado->estado = "OK";
            $resultado->datos = array();
            while ($fila = $respuesta->fetch_assoc()) {
                $publicacion = new Publicacion;
            }
        }

    }


?>