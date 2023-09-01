const divVentana = document.getElementById("ventana")
const divCarrusel = document.getElementById("carrusel")
const btnAdelante = document.getElementById("btnAdelante")
const btnAtras = document.getElementById("btnAtras")



posicion = 0

window.addEventListener("load", (event) => {
    cargarCarrusel(divCarrusel)
    //log.textContent += "load\n";
    //divVentana.scrollLeft= Math.round((cantFotos / 2))*50;
  });


btnAdelante.addEventListener("click",moverImagenesAdelante)
btnAtras.addEventListener("click",moverImagenesAtras)


/**
 * Basado en código tomado de: https://jsfiddle.net/pGR3B/2/
 */
function deslizarHorizontal(elemento,direccion,velocidad,distancia,pasos){
    scrollAmount = 0;
    let slideTimer = setInterval(function(){
        if(direccion == 'izq'){
            elemento.scrollLeft -= pasos;
        } else {
            elemento.scrollLeft += pasos;
        }
        
        scrollAmount += pasos;
        if(scrollAmount >= distancia){
            window.clearInterval(slideTimer);
        }
    }, velocidad);
    elemento.scrollLeft=0;
}


function moverImagenesAdelante() {
    //deslizarHorizontal(divVentana,"der",25,50,5)
    //posicion++

    //if (cantFotos-posicion < 3) {
        let elm1 = divCarrusel.children[0]
        elm1.remove();
        divCarrusel.appendChild(elm1)    
    //}

    
    
}

function moverImagenesAtras() {
    
    let ultimoElm = divCarrusel.childElementCount - 1
    let elmF = divCarrusel.children[ultimoElm]
    elmF.remove();
    divCarrusel.insertBefore(elmF, divCarrusel.children[0])
    //deslizarHorizontal(divVentana,"izq",25,50,5)
}
//console.log(listaImagenes)

function cargarCarrusel(carrusel) {

    

    const elmContenedor = carrusel.parentElement
    let ancho = (elmContenedor.clientWidth / 3)
    cantFotos = carrusel.childElementCount
    carrusel.style.setProperty("width",cantFotos*ancho+"px")
    console.log(ancho)

    let listaDeImagenes = Array.prototype.slice.call(carrusel.children)
    carrusel.innerHTML = null
    

    listaDeImagenes.forEach(elemento => {
        const divMarco = document.createElement("div")
        divMarco.style.setProperty("width",ancho+"px")
        divMarco.classList.add("marco")
        divMarco.appendChild(elemento)
        carrusel.appendChild(divMarco)
    });


    console.log(listaDeImagenes)
}
