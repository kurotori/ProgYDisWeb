/**
 * Función para comprobar que la longitud del contenido de un campo no sea 0.
 * Si un campo no tiene contenido, devuelve 'false'
 */
function ValidarCampo(idCampo) {
    var campo = "#" + idCampo;
    
    if ( $(campo).val().length == 0 ) {
        return false;
    } else {
        return true;
    }
}

function ValidarFormulario(idFormulario) {
    var formulario = "#" + idFormulario;

    var campos = $(formulario + "> :input");

    campos.each(
       function(){
            if ( $(this).val().length == 0 ) {
                alert( "El campo "+ this.id + " esta vacío");
                return;
            }
       }
   );

   var password = $("#pass").val();
   

}

