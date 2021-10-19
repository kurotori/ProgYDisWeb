
const divListado = document.getElementById('listado');
const divBusqueda = document.getElementById('busqueda');

let datosServidor;

function mostrarListado() {
    divBusqueda.style.height="5%";
    divListado.style.height="50%";
    cargarLibros();
}

function mostrarBusqueda() {
    divBusqueda.style.height="50%";
    divListado.style.height="5%";
    //cargarLibros();
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

                datos.Respuesta.datos.forEach(dato => {
                    const pLibro =  document.createElement('p');
                    const bTitulo = document.createElement('b');
                    const iGenero = document.createElement('i');
                    const iFechaPub = document.createElement('i');
                    bTitulo.textContent = dato.titulo;
                    iGenero.textContent = " "+dato.genero ;
                    iFechaPub.textContent = " - "+dato.fecha_pub;
                    pLibro.appendChild(bTitulo);
                    pLibro.appendChild(iGenero);
                    pLibro.appendChild(iFechaPub);
                    divListado.appendChild(pLibro);
                });


                //la variable 'datos' representa a los datos que vienen del servidor
            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error("ERROR:" + errorThrown.responseText);
            }
        }
    );
}