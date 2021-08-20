//AJAX básico para recibir datos en JSON
function AjaxBasico(){
    //Se inicializa el proceso llamando a la función ajax de JQuery
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"url_de_la_pagina_con_los_datos",
            //2 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //3 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (data) {
                //la variable 'data' representa a los datos que vienen del servidor
            },
            //4 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.log(errorThrown.responseText);
            }
        }
    );
    
    //En esta zona agregamos eventos para que se ejecuten mientras se espera la
    //  respuesta del servidor, por ejemplo, mostrar un diálogo, una animación de espera,
    //  etc.
}


/**
 * AJAX con envío de datos.
 * Este AJAX permite complementar la solicitud con envío de datos específicos
 * relacionados a la solicitud (términos de búsqueda, datos de registro, etc).
 * Es recomendable indicar estos datos como parámetros de la función, al igual
 * que en este ejemplo.
 */
function AjaxConS(dato1, dato2) {
        //Se inicializa el proceso llamando a la función ajax de JQuery
        $.ajax(
            {
                //1 - Indicar la URL de donde se obtienen los datos
                url:"url_de_la_pagina_con_los_datos",
                //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
                method: "POST",
                //3 - Indicar la forma que tendran los datos, en este caso es 'json'
                datatype: "json",
                //4 - Indicar los datos que se incluirán. 
                // Primero se indica el nombre del dato esperado por la página y luego el dato
                data:{
                    datoEnDestino1 : dato1,
                    datoEnDestino2 : dato2
                },
                //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
                success:function (data) {
                    //la variable 'data' representa a los datos que vienen del servidor
                },
                //6 - Establecemos una función que se ejecuta en caso de error
                error:function(errorThrown){
                    console.error(errorThrown.responseText);
                }
            }
        );
        
        //En esta zona agregamos eventos para que se ejecuten mientras se espera la
        //  respuesta del servidor, por ejemplo, mostrar un diálogo, una animación de espera,
        //  etc.
}
