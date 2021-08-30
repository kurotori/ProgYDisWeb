var infoServidor = "";


function RecopilarYEnviar(){
    var nombre = $("#nombre").val();
    var pass = $("#pass").val();
    var hashPass = GenerarHash(pass);

    EnviarFormulario(nombre,hashPass);
}



function EnviarFormulario(nombreUsuario, hashPass) {
    
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"registro.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                nombre : nombreUsuario,
                hash : hashPass
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