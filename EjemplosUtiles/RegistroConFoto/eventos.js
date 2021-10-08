function CargarImagenes() {
    var inputArchivos = Array.from(document.getElementById('archivoImagen').files);
    const divVistaPrevia = document.getElementById('vistaPrevia');

    inputArchivos.forEach(imagen => {
        imgNuevaImagen = document.createElement('img');
        srcImagen = LeerDatosImagen(imagen);
        imgNuevaImagen.src = srcImagen;
        imgNuevaImagen.style.width="200px";
        divVistaPrevia.appendChild(imgNuevaImagen);
    });
}

function LeerDatosImagen(archivoImagen) {
    let lector = new FileReader();
    lector.readAsDataURL(archivoImagen);
    var datos;
    lector.onload = function (data) {
        datos = data.target.result;
    }
    return datos;
}

//https://web.dev/read-files/