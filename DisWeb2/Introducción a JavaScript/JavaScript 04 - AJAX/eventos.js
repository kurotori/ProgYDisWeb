
var infoObtenida = "";

function MostrarDialogo(texto) {
    $('#telon').toggle();
    $('.txtDialogo').html(texto);
}



function ObtenerDatosConAJAX() {
    var resultado = $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"info.php",
            //2 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //3 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (data) {
                infoObtenida = data;
                MostrarDialogo("");
                MostrarDialogo("Se obtuvieron los datos solicitados");
                
                infoObtenida.Dato.datos.forEach(elemento => {
                    $("#tabla_resultado").append(
                        "<tr><td>"+elemento.id+"</td><td>"+elemento.numero+"</tr>"
                    );
                });

                
            },
            //4 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.log(errorThrown.responseText);
            }
        }
    );
    
    MostrarDialogo("Espere por favor...");
}