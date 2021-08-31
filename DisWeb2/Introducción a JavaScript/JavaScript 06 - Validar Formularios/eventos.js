/**
 * Función para comprobar que la longitud del contenido de un campo no sea 0.
 * Si un campo no tiene contenido, devuelve 'false'
 */
function CampoEsVacio(campo) {
    
    if ( $(campo).val().length == 0 ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Función para resetear el contenido de un campo
 * @param {*} campo una variable con un objeto que contenga el campo a resetear
 */
function ResetearCampo(campo){
    $(campo).val("");
}


/**
 * Función que valida el contenido del formulario para continuar.
 * Si no hay errores, devuelve true
 * @param {*} idFormulario 
 */
function ValidarFormulario(idFormulario) {
    var resultado = true;
    //Reseteamos los errores
    ResetearErrores();

    var formulario = "#" + idFormulario;

    //Obtengo todos los elementos del formulario
    var campos = $(formulario + ">*");

    //Establezco un bucle que recorre todos los elementos
    // del formulario mediante la función .each()
    campos.each(
        //Establecemos una función anónima para trabajar sobre los elementos
        // del formulario.
       function(){
            
            //Filtramos los elementos según su tipo de etiqueta con la función
            // .prop('tagName'), y elegimos solo los de tipo 'INPUT'
            if( $(this).prop("tagName") == "INPUT" ){
                
                //Si la validación devuelve 'false' le agregamos a los campos
                // sin contenido la clase 'error' con la función .addClass()
                if ( CampoEsVacio(this) ) {
                    $(this).addClass("error");
                    $("#errorCampos").css(
                        {
                            display:"block"
                        }
                    );
                    $("#errorCampos").html("Los campos marcados con '*' deben completarse.");
                    
                    resultado = false;
                }
            }
        }
   );
   
   //Obtengo el contenido del campo '#pass'
   var password = $("#pass").val();

   //Chequeo si su longitud es la adecuada
   if ( password.length >= 8 ) {
    
        //Obtengo el contenido del campo '#repPass'
       var repPassword = $("#repPass").val();
        
       //Comparo el contenido de los dos campos
       if ( password != repPassword ) {
           //Muestro los errores de coincidencia de contraseñas
           $("#errorRepPass").toggle();
           $("#errorRepPass").html("Las contraseñas no coinciden.");
           resultado = false;
       }
   }
   else{
       //Muestro los errores de tamaño de contraseña
       $("#errorPass").toggle();
       $("#errorPass").html("La contraseña debe tener al menos 8 caracteres.");
       resultado = false;
   }

   return resultado;
}

/**
 * Función que limpia los mensajes y las marcas de error en la pantalla
 */
function ResetearErrores() {
    //A todos los elementos con la clase '.error' les quitamos esa clase
    $(".error").removeClass("error");
    
    //Ocultamos todos los elementos con la clase '.mensajeError' pasándoles
    // la propiedad display: "none"
    $(".mensajeError").css(
        {
            display:"none"
        }
    );
}


/**
 * Función que borra todos los datos ingresados en el formulario
 * @param {*} idFormulario El ID del formulario que se quiere resetear
 */
function ResetearFormulario(idFormulario) {
    //Se muestra un mensaje de confirmación al usuario.
    var opcion = confirm("¿Desea eliminar los datos ingresados?");

    // La función nativa confirm muestra un diálogo que muestra un mensaje y 
    // da las opciones 'Aceptar' y 'Cancelar'. Al dar click en 'Aceptar' se devuelve
    // el valor 'true', y al hacerlo en 'Cancelar', se devuelve 'false'
    
    //Si el usuario da click en 'Aceptar'...
    if ( opcion ) {
        var formulario = "#" + idFormulario;

        //Obtengo todos los elementos del formulario
        var campos = $(formulario + ">*");

        //Establezco un bucle que recorre todos los elementos
        // del formulario mediante la función .each()
        campos.each(
            function () {
                //Reseteo cada campo del formulario.
                ResetearCampo(this);
            }
        );
    }
}

