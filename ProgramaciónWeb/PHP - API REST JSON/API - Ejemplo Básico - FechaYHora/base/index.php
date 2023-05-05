<?php 
/**Clases para el uso de la API */
    
    /**
     * Clase para respuestas del servidor
     */
    class Respuesta{
        public $estado;
        public $datos;
    }

    /**
     * Clase para contener los datos de la fecha del sistema
     */
    class Fecha{
        public $dia;
        public $mes;
        public $anio;
    }

    class Hora{
        public $hora;
        public $minuto;
    }

    class FechaHora{
        public $hora;
        public $fecha;

        /**
         * Permite construir un nuevo objeto de la clase
         */
        function __construct()
        {
            $this->hora = new Hora;
            $this->fecha = new Fecha;
        }
    }

    /** Funciones */

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

 ?>