



function DistribuirDatos(datos) {
    var contenidoNuevo = "";
    datos.forEach(elemento => {
        var datosPrincipales = elemento.nombre + " " + elemento.apellido;

        var datosSecundarios = elemento.direccion + 
                                ", " + elemento.ciudad +
                                " - " + elemento.telefono;
        
        var colorImagen =   elemento.colorR + "," + 
                            elemento.colorG + "," + 
                            elemento.colorb; 
        
        contenidoNuevo = contenidoNuevo + 
                     "<div class='elemento'>"+
                        "<div class='elemento_datos'>"+
                            "<div class='datos_principales'>"+
                            datosPrincipales +
                            "</div>"+
                            "<div class='datos_secundarios'>"+
                            datosSecundarios +
                            "</div>"+
                        "</div>"+
                        "<div style='backgroundColor:rgb("+ colorImagen +
                        ")' class='elemento_imagen'>"+
                        "</div>" +
                    "</div>";
    });

    $("#contenido").html(contenidoNuevo);
}


function DistribuirDatosMejor(datos) {
    //var divContenido = $("#contenido"); --> con JQuery
    var divContenido = document.getElementById("contenido");
    divContenido.innerHTML = null;
    
    datos.forEach(
        elemento => {
            var datosPrincipales = elemento.nombre + " " + elemento.apellido;

            var datosSecundarios = elemento.direccion + 
                                ", " + elemento.ciudad +
                                " - " + elemento.telefono;
        
            var colorImagen =  elemento.colorR + "," + 
                            elemento.colorG + "," + 
                            elemento.colorb;
            
            var divElemento = document.createElement('div');
            divContenido.appendChild( divElemento );
            
            $(divElemento).addClass('elemento');
            //divContenido.classList.add('contenido');

            var divElementoDatos = document.createElement('div');
            divElemento.appendChild(divElementoDatos);
            $(divElementoDatos).addClass('elemento_datos');

            var divElementoImagen = document.createElement('div');
            divElemento.appendChild(divElementoImagen);
            $(divElementoImagen).addClass('elemento_imagen');

            var divDatosPrincipales = document.createElement('div');
            var divDatosSecundarios = document.createElement('div');
            divElementoDatos.appendChild(divDatosPrincipales);
            divElementoDatos.appendChild(divDatosSecundarios);
            $(divDatosPrincipales).addClass('datos_principales');
            $(divDatosSecundarios).addClass('datos_secundarios');

            divDatosPrincipales.innerHTML = datosPrincipales;
            divDatosSecundarios.innerHTML = datosSecundarios;

            $(divElementoImagen).css(
                {
                    backgroundColor: 'rgb(' + colorImagen + ')'
                }
            );
        }
    );

}