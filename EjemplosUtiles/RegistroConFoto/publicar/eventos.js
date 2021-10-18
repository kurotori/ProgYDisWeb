const archivoImagen = document.getElementById('archivoImagen');
const divVistaPrevia = document.getElementById('vistaPrevia');
const inputTitulo = document.getElementById('titulo');
const inputDescripcion = document.getElementById('descripcion');

let listaDeFotos = [];
var algo;

archivoImagen.addEventListener('change',archivosAgregados);

function archivosAgregados() {
    ListarArchivos(archivoImagen);
}


function ListarArchivos(inputOrigen) {
    const lista = Array.from(inputOrigen.files);
    
    divVistaPrevia.innerHTML = "";
    listaDeFotos.length = 0;

    imgsrc = "";
    idFoto = 0;

    lista.forEach(element => {
        lector = new FileReader();
        
        lector.onload = function (e) {
            imgsrc = e.target.result;

            fotoTamanio = (element.size)/(1024*1024);
            
            if (fotoTamanio > 2) {
                mensaje = "Foto demasiado grande";
                estado = "NO";
            } else {
                mensaje = "OK";
                estado = "OK";
            }

            idFoto++;
            divFoto = document.createElement('div');
            divFoto.classList.add('foto');

            pIdFoto = document.createElement('p');
            pIdFoto.innerText = "Foto "+ idFoto;
            
            pTamFoto = document.createElement('p');
            pTamFoto.innerText = fotoTamanio.toFixed(2) + " MB | " + mensaje ;
            
            divFoto.appendChild(pIdFoto);
            divFoto.appendChild(pTamFoto);

            imagen = document.createElement('img');
            imagen.src = imgsrc;
            imagen.style.width = '200px';
            divFoto.appendChild(imagen);
            divVistaPrevia.appendChild(divFoto);

            foto = {
                id : idFoto,
                datos : imgsrc,
                subirFoto : estado
            }

            listaDeFotos.push(foto);

        }
        imgSrc = lector.readAsDataURL(element);
        
        
        //CargarDatosDeImagen(element).then( (datos)=> console.log(datos) );
       
    });
}

function CargarVistaPrevia(imagen) {
    
}

function SubirImagen(datosImg, idPublicacion) {
    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"nueva_publicacion.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                'modo' : 3,
                'datosImagen' : datosImg,
                'idPublicacion' : idPublicacion
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (datos) {
                console.log("Estado:" + datos.Resultado.estado);
                console.log("Datos:" + datos.Resultado.datos);
                algo=datos;
                //la variable 'data' representa a los datos que vienen del servidor
            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error("ERROR:" + errorThrown.responseText);
            }
        }
    );
}



/**
 * Permite subir una publicación y las imágenes asociadas a la misma.
 */
function SubirPublicacion() {
    let tituloPub = inputTitulo.value;
    let descripcionPub = inputDescripcion.value;

    $.ajax(
        {
            //1 - Indicar la URL de donde se obtienen los datos
            url:"nueva_publicacion.php",
            //2 - Método para el envío de los datos, puede ser 'GET' o 'POST'
            method: "POST",
            //3 - Indicar la forma que tendran los datos, en este caso es 'json'
            datatype: "json",
            //4 - Indicar los datos que se incluirán. 
            // Primero se indica el nombre del dato esperado por la página y luego el dato
            data:{
                'modo' : 3,
                'tituloPub' : tituloPub,
                'descripcionPub' : descripcionPub
            },
            //5 - Establecemos una función que se ejecuta en caso de éxito en la operación
            success:function (datos) {
                console.log("Estado:" + datos.Resultado.estado);
                console.log("Datos:" + datos.Resultado.datos);
                algo=datos;

                listaDeFotos.forEach(foto => {
                    SubirImagen(foto.datos);
                });
                //la variable 'data' representa a los datos que vienen del servidor
            },
            //6 - Establecemos una función que se ejecuta en caso de error
            error:function(errorThrown){
                console.error(errorThrown.responseText);
            }
        }
    );


}