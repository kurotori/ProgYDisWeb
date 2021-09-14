var infoServidor = "";

/**
 * Recopila los datos del formulario y los envía al servidor mediante la función
 * correspondiente.
 */
function RecopilarYEnviar(){
    //Se obtienen los datos de los campos específicos.
    var nombre = $("#nombre").val();
    var pass = $("#pass").val();

    //Se borra el contenido del campo de la contraseña.
    $("#pass").val("");    
    
    //Se genera un hash sobre la contraseña proporcionada
    var hashPass = GenerarHash(pass);

    //Se envían los datos al servidor mediante la función EnviarFormularioRegistro()
    EnviarFormularioRegistro(nombre,hashPass);
}


/**
 * Envía los datos del formulario de registro al servidor
 * @param {*} nombreUsuario El nombre del usuario
 * @param {*} hashPass El hasheo local de la contraseña
 */
function EnviarFormularioRegistro(nombreUsuario, hashPass) {
    
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"registro.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos que se recibirán, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato a enviar
            data:{
                nombre : nombreUsuario,
                hash : hashPass
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (data) {
                //la variable 'data' representa a los datos que vienen del servidor
                alert("Los datos se recibieron en el servidor");
                
                //Paso los datos recibidos a la variable global infoObtenida
                infoServidor = data;

                alert(data.Respuesta.estado);
                alert(data.Respuesta.mensaje);

            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error(errorThrown.responseText);
            }
        }
    );
}

/**
 * Permite generar un hash con la contraseña proporcionada por el usuario
 * @param {*} password La contraseña del usuario.
 * @returns El hash de la contraseña proporcionada.
 */
function GenerarHash(password) {
        //1 - Creamos un objeto de hasheo
        var hasheador = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
        //2 - Agregamos el password al objeto de hasheo
        hasheador.update(password);
        //3 - Obtenemos el hash en formato hexadecimal...
        var hash = hasheador.getHash("HEX");
        // ...y devolvemos el mismo.
        return hash;
}


function EnviarFormularioLogin(nombreUsuario) {
    
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"verificarUsuario.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                nombre : nombreUsuario
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (data) {
                //la variable 'data' representa a los datos que vienen del servidor
                alert("Los datos se recibieron en el servidor");
                
                //Paso los datos recibidos a la variable global infoObtenida
                infoObtenida = data;

                alert(data.Respuesta.estado);
                alert(data.Respuesta.mensaje);

            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error(errorThrown.responseText);
            }
        }
    );

    
}