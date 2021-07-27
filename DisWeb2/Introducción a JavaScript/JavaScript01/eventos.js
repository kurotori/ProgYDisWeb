//Todas las funciones dependen de JQuery

/**
 * Función para ocultar el DIV 'uno'
 */
function ocultarUno() {
    $('#uno').css('display','none');
}

/**
 * Función para mostrar el DIV 'uno'
 */
function mostrarUno(){
    $('#uno').css('display','block');
}

/**
 * Esta función permite conmutar la visibilidad del
 * DIV 'uno'.
 */
function interruptorUno(){
    //Obtenemos el estado actual de visibilidad del DIV
    var estadoUno = $('#uno').css('display');
    
    //Si el estado es DISTINTO a 'none', 
    // lo establecemos en 'none' (ocultamos el DIV)
    //Si el estado es IGUAL a 'none',
    // lo establecemos en 'block' (mostramos el DIV)
    
    if (estadoUno != 'none') {
        $('#uno').css('display','none');
    } else {
        $('#uno').css('display','block');
    }

    //NOTA: resulta más práctico utilizar la función 'toggle' de JQuery
}