<?php
    
    include "basededatos.php";
    include "clases.php";


    /**
     * Crea un token temporal. Requiere que se ejecute session_start() al comienzo
     * del archivo donde se llame esta función.
     */
    function GenerarToken(){
        //Obtenemos el tiempo del servidor
        $tiempo = time();
        //Obtenemos la ID de sesión
        $sesion_id = session_id();
        //Generamos una secuencia alfanumérica al azar con los dos mediante password_hash()
        $ID = password_hash($tiempo.$sesion_id, PASSWORD_BCRYPT);

        //Obtenemos el valor para usarlo en otras funciones.
        return $ID;
    }

    /**
     * Función para generar un token de contraseña.
     * Requiere la constraseña y un token existente.
     */
    function GenerarPassToken($password, $token){
        $passToken = password_hash($password.$token, PASSWORD_BCRYPT);
        return $passToken;
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
     * Chequea si un usuario ya existe en el sistema.
     * Devuelve TRUE si es asi, o FALSE, si no existe.
     */
    function UsuarioYaExiste($usuario){
        $basededatos = CrearConexion();
        $consulta = "SELECT count(*) as 'conteo' from usuario WHERE nombre = '".$usuario."'";
        
        $respuesta = $basededatos->conexion->query($consulta);

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
        $basededatos->conexion->close();

        return $resultado;        
    }



    

    function RegistrarUsuario($nombre, $passHash, $passToken){
        //1 - Creamos una conexión a la base de datos.
        $basededatos = CrearConexion();
        $conexion = $basededatos->conexion;
        //2 - Creamos un objeto de respuesta para enviarla al JavaScript
        $resultado = new Respuesta;

        //Consulta a ser ejecutada para registrar al usuario. Los '?' en la zona de
        // valores son para reemplazarlos con los parámetros de forma segura más adelante.
        $consulta = "INSERT INTO usuario(nombre,passHash,passToken) values (?,?,?)";

        //3 - Creamos una SENTENCIA mediante la función prepare() 
        //  para poder utilizar parámetros seguros en la ejecución de la consulta 
        $sentencia = $conexion->prepare($consulta);

        //5 - Almacenamos los datos en los parámetros establecidos en el paso anterior.
        $nomUsuario = $nombre;
        $pHash = $passHash;
        $pToken = $passToken;

        //4 - Vinculamos parámetros a la sentencia mediante la función bind_param()
        //   El parámetro "sss" indica, en orden, el tipo de datos de los parámetros.
        //   Ej.:  s - String  i - int
        $sentencia->bind_param("sss", $nomUsuario, $pHash, $pToken);

        if ( ( $sentencia->execute() ) ) {
            $resultado->estado = "EXITO";
            $resultado->mensaje = "El usuario $nombre se registró con éxito";
        }
        else {
            //ERROR: No se pudo concretar el registro por errores con el servidor
            $resultado->estado = "ERROR";
            $resultado->mensaje = "Errores en la sentencia";
        }
        //Cerramos la sentencia y la conexión
        $sentencia->close();
        $conexion->close();

        return $resultado;

    }

    
?>