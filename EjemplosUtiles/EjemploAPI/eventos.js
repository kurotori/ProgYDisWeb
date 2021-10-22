
const divListado = document.getElementById('listado');
const divListadoContenido = divListado.children[1]; 
const divBusqueda = document.getElementById('busqueda');
const divBusquedaBuscador = divBusqueda.children[1];
const divBusquedaContenido = divBusqueda.children[2];
const inputBuscador = document.getElementById('buscaLibro');

let datosServidor;

function mostrarListado() {
    divBusqueda.style.height="5%";
    divListado.style.height="50%";
    divBusquedaBuscador.style.display = "none";
    cargarLibros();
}

function mostrarBusqueda() {
    divBusqueda.style.height="50%";
    divListado.style.height="5%";
    divListadoContenido.innerHTML = "";
    divBusquedaBuscador.style.display = "block";
}

function buscarLibros() {
    divBusquedaContenido.innerHTML = "";
    let valorBusqueda = inputBuscador.value;
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"api.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                'modo' : 2,
                'busqueda' : valorBusqueda
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (datos) {
                
                console.log(datos);
            
                if (datos.Respuesta.estado == "OK") {
                    listado = datos.Respuesta.datos;

                    listado.forEach(libro => {
                        const pLibro =  document.createElement('p');
                        const bTitulo = document.createElement('b');
                        const aLinkLibro = document.createElement('a');
                        const iGenero = document.createElement('i');
                        const iFechaPub = document.createElement('i');
                        
                        bTitulo.textContent = libro.titulo;
                        aLinkLibro.href = "verlibro.html?isbn="+libro.isbn;
                        aLinkLibro.appendChild(bTitulo);

                        iGenero.textContent = " "+libro.genero;
                        iFechaPub.textContent = " - "+libro.fecha_pub;
    
                        pLibro.appendChild(aLinkLibro);
                        pLibro.appendChild(iGenero);
                        pLibro.appendChild(iFechaPub);
                        divBusquedaContenido.appendChild(pLibro);
                    });
                }
                else{
                    const pAviso =  document.createElement('p');
                    pAviso.textContent = datos.Respuesta.estado + " : "+datos.Respuesta.datos;
                    divBusquedaContenido.appendChild(pAviso);
                }
                //la variable 'datos' representa a los datos que vienen del servidor
            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error("ERROR:" + errorThrown.responseText);
            }
        }
    );
}

function cargarLibros() {
    
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"api.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                'modo' : 1
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (datos) {
                
                console.log(datos);
            
                if (datos.Respuesta.estado == "OK") {
                    listado = datos.Respuesta.datos;

                    listado.forEach(libro => {
                        const pLibro =  document.createElement('p');
                        const bTitulo = document.createElement('b');
                        const iGenero = document.createElement('i');
                        const iFechaPub = document.createElement('i');
    
                        bTitulo.textContent = libro.titulo;
    
                        iGenero.textContent = " "+libro.genero;
                        iFechaPub.textContent = " - "+libro.fecha_pub;
    
                        pLibro.appendChild(bTitulo);
                        pLibro.appendChild(iGenero);
                        pLibro.appendChild(iFechaPub);
                        divListadoContenido.appendChild(pLibro);
                    });
                }
                else{
                    const pAviso =  document.createElement('p');
                    pAviso.textContent = datos.Respuesta.estado + " : "+datos.Respuesta.datos;
                    divListadoContenido.appendChild(pAviso);
                }
                //la variable 'datos' representa a los datos que vienen del servidor
            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error("ERROR:" + errorThrown.responseText);
            }
        }
    );
}

function obtenerParametroURL() {
    let paginaURL = window.location.href;
    let datos = paginaURL.split('?');
    parametro = datos[1].split('=');
    parametro = parametro[1];
    return parametro;
}