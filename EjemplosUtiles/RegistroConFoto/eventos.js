function CargarImagenes() {
    var inputArchivos = Array.from(document.getElementById('archivoImagen').files);
    const divVistaPrevia = document.getElementById('vistaPrevia');

    inputArchivos.forEach(imagen => {
        imgNuevaImagen = document.createElement('img');
        let lector = new FileReader();
        lector.readAsDataURL(imagen)
        lector.onload = function (datos) {
            imgNuevaImagen.src = datos.target.result;
        }
        imgNuevaImagen.style.width="200px";
        divVistaPrevia.appendChild(imgNuevaImagen);
    });
}