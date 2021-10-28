
const divTitulo = document.getElementById('titulo');
const spanNombreAutor = document.getElementsByClassName('nombreAutor')[0];
const spanNacionalidadAutor = document.getElementsByClassName('nacionalidad')[0];
const spanFechaNacAutor = document.getElementsByClassName('fecha_nac')[0];
const spanFechaDecAutor = document.getElementsByClassName('fecha_dec')[0];

const spanFechaPubLibro = document.getElementsByClassName('fecha_pub')[0];
const spanGeneroLibro = document.getElementsByClassName('genero')[0];
const spanIsbnLibro = document.getElementsByClassName('isbn')[0];

const divDatosAutor = document.getElementById('datosAutor');
const divDatosLibro = document.getElementById('datosLibro');

let datosServidor="";

function obtenerDatosLibro() {
    let isbnLibro = obtenerParametroURL();
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"../api.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                'isbnLibro' : isbnLibro,
                'modo' : 3
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (data) {
                //la variable 'data' representa a los datos que vienen del servidor
                datosServidor = data;
                let datosAutor = data.Respuesta.datos[1];
                let datosLibro = data.Respuesta.datos[0];
                console.log(datosLibro);

                spanNombreAutor.innerText = datosAutor.nombreCompleto;
                spanNacionalidadAutor.innerText = datosAutor.nacionalidad;
                spanFechaNacAutor.innerText = datosAutor.fecha_nac;
                spanFechaDecAutor.innerText = datosAutor.fecha_dec;

                const h1Titulo = document.createElement('h1');
                h1Titulo.innerText = datosLibro.titulo;
                divTitulo.appendChild(h1Titulo);
                spanFechaPubLibro.innerText = datosLibro.fecha_pub;
                spanIsbnLibro.innerText = datosLibro.isbn;
                spanGeneroLibro.innerText = datosLibro.genero;

            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error(errorThrown.responseText);
            }
        }
    );
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