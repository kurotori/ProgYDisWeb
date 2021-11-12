const inputNombreUsuario = document.getElementById('nombre');
const inputContraseña = document.getElementById('pass');
const inputConfContraseña = document.getElementById('confPass');


/**
 * Permite obtener un número al azar entre los valores específicados, el máximo no está incluído
 * @param {*} min El valor más pequeño del intervalo de valores
 * @param {*} max El valor más grande del intervalo de valores, no incluído entre los posibles resultados
 * @returns Un número entre el valor mínimo y el valor máximo indicados.
 */
function AlAzarEntre(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }

/**
 * Crea una secuencia alfanumérica para aumentar la seguridad de la encriptación
 * @returns secuencia de caracteres casi al azar.
 */
function CrearSalBase() {
    let caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ|°¬~¨#$%&(){}[]^`´=¿¡!?*-+";
    caracteres = Array.from(caracteres);
    //console.log(caracteres);
    let resultado = "";
    for (let cont = 0; cont < 100; cont++) {
        let posicionAlAzar = AlAzarEntre(0, caracteres.length);
        resultado = resultado + caracteres[posicionAlAzar];
    }
    
    return resultado;
}

/**
 * Permite generar un hash con la contraseña proporcionada por el usuario y una sal generada por el sistema
 * @param {*} password La contraseña del usuario.
 * @param {*} sal Una sal alfanumérica generada por el sistema.
 * @returns El hash de la contraseña proporcionada.
 */
 function GenerarHash(password, sal) {
    //1 - Creamos un objeto de hasheo
    var hasheador = new jsSHA("SHA-256", "TEXT", {numRounds: 1});
    //2 - Agregamos el password y la sal al objeto de hasheo
    hasheador.update(password + sal);
    //3 - Obtenemos el hash en formato hexadecimal...
    var hash = hasheador.getHash("HEX");
    // ...y devolvemos el mismo.
    return hash;
}


function RegistrarUsuario() {
    let nombreUsuario = inputNombreUsuario.value;

    let contraseña = inputContraseña.value;
    inputContraseña.value = "";

    let confContraseña  = inputConfContraseña.value;
    inputConfContraseña.value = "";

    if (nombreUsuario.length > 7 && nombreUsuario.length <= 12) {
        if (contraseña.length > 7 && contraseña.length <=12) {
            if (contraseña == confContraseña) {

                let sal = CrearSalBase();
                let hash = GenerarHash(contraseña, sal);

                $.ajax(
                    {
                        //1 - Indicar la URL de donde se obtienen los datos
                        url:"api_registro.php",
                        //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
                        method: "POST",
                        //3 - Indicar la forma que tendran los datos, en este caso es 'json'
                        datatype: "json",
                        //4 - Indicar los datos que se incluirán. 
                        // Primero se indica el nombre del dato esperado por la página y luego el dato
                        data:{
                            'modo' : 2,
                            'nombreUsuario' : nombreUsuario//,
                            //'sal' : sal,
                            //'hash' : hash
                        },
                        //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
                        success:function (data) {
                            console.log(data);
                            let estado = data.Respuesta.estado;
                            let datos = data.Respuesta.datos;
                            console.log(datos);
                            if (!datos[0]) {
                                EnviarDatosDeUsuario(nombreUsuario,hash,sal);
                            } else {
                                alert(datos[1]);
                            }

                            //la variable 'data' representa a los datos que vienen del servidor
                        },
                        //6 - Establecemos una función que se ejecuta en caso de error
                        error:function(errorThrown){
                            console.error(errorThrown.responseText);
                        }
                    }
                );
            } else {
                alert("La contraseña y la confirmación no coinciden.");
            }
        } else {
            alert("La contraseña debe tener entre 8 y 12 caracteres.");
        }
    } else {
        alert("El nombre de usuario debe tener entre 8 y 12 caracteres.");
    }
}


function EnviarDatosDeUsuario(nombreUsuario,hash,sal) {
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"api_registro.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                'modo' : 1,
                'nombreUsuario' : nombreUsuario,
                'sal' : sal,
                'hash' : hash
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (data) {
                console.log(data);
                /* let estado = data.Respuesta.estado;
                let datos = data.Respuesta.datos;
                console.log(datos);
                if (!datos[0]) {
                    
                } else {
                    alert(datos[1]);
                } */

                //la variable 'data' representa a los datos que vienen del servidor
            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error(errorThrown.responseText);
            }
        }
    );
}


function probar() {
    let password = "cosa";
    let sal = CrearSalBase();
    return GenerarHash(password,sal);
}

document.addEventListener('click', function() {
    
    console.log(window.event.target);   
}, false);



