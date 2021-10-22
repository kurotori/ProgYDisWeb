
const divTitulo = document.getElementById('titulo');
const spanNombreAutor = document.getElementById('nombreAutor');
const divDatosAutor = document.getElementById('datosAutor');
const divDatosLibro = document.getElementById('datosLibro');

function obtenerDatosLibro() {
    
}


/**
 * Permite obtener el valor de un parámetro pasado a la página mediante GET
 * @returns El dato del primer parámetro incluído en la URL
 */
 function obtenerParametroURL() {
    let paginaURL = window.location.href;
    let datos = paginaURL.split('?');
    parametro = datos[1].split('=');
    parametro = parametro[1];
    return parametro;
}