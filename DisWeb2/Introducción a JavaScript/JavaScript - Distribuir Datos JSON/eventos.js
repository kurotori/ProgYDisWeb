



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