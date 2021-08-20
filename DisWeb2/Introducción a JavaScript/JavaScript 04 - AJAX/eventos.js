

function MostrarDialogo(texto) {
    $('#telon').toggle();
    $('.txtDialogo').html(texto);
}


var infoObtenida = "";

function ObtenerDatosConAJAX() {
    var resultado = $.ajax(
        {
            url:"info.php",
            datatype:"json",
            data:{
                termino: "algo"
            ,
            method:"get",
            success:function(data){
                $("#mensajes").html("Datos Obtenidos");
                infoObtenida = data;

                infoObtenida.Dato.datos.forEach(element => {
                    $("#mensajes").after("<br>"+element.numero+" - "+element.valor);
                });
            },
            error:function(){}
        }
    );
    $("#mensajes").html("Solicitando Datos...");
}