const archivoImagen = document.getElementById('archivoImagen');
const divVistaPrevia = document.getElementById('vistaPrevia');

let listaDeFotos = [];


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