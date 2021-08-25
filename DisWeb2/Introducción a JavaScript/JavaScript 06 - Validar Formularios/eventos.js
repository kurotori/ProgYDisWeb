/**
 * Función para comprobar que la longitud del contenido de un campo no sea 0.
 * Si un campo no tiene contenido, devuelve 'false'
 */
function ValidarCampo(campo) {
    
    if ( $(campo).val().length == 0 ) {
        return false;
    } else {
        return true;
    }
}

function ValidarFormulario(idFormulario) {
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
                if ( ! ValidarCampo(this) ) {
                    $(this).addClass("error");
                    
                    //Código anterior: muestra una advertencia por cada campo.
                    //alert( "El campo "+ this.id + " esta vacío");
                    //return false;
                }
            }

            
       }
   );

}

