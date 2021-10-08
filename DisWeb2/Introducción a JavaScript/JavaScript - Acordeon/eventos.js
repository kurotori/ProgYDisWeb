var btnActivo="";

function ObtenerEspacioLibre(elemento) {
    var div = document.getElementById(elemento);

    var contenido = div.children;
    var ocupado = 0;
    $(contenido).each(
        function() {
            ocupado = ocupado + this.offsetHeight;
        }
    );
    
    var espacio = div.clientHeight - ocupado;
    return espacio;
}


function ActivarBoton(idBoton) {
    //Obtenemos todos los elementos del div contenedor
    let elementos = idBoton.parentElement.children;

    //Transformamos la HTMLCollection en un array
    elementos = Array.from(elementos);

    //Creamos un bucle sobre ellos con .each
    elementos.forEach(elemento => {
        var clases = elemento.classList;
        if ( clases.contains("contenido") ) {
            elemento.style.height = "0px"
        }
    });
    
    
    
/*     $(elementos).each(
        //Esta función colapsa todos los div con la clase 'contenido'
        function () {
            //Para cada elemento, obtenemos su lista de clases
            var clases = this.classList;
            //Si en esa lista encontramos la clase 'contenido'...
            if ( clases.contains("contenido") ) {
                //...colapsamos su altura
                $(this).animate(
                    {
                        height:"0%"
                    }
                );
            } 
        }
    ); */
    var alturaMax = ObtenerEspacioLibre(idBoton.parentElement.id);

    var divContenido = idBoton.nextElementSibling;
    divContenido.style.height = alturaMax+"px";

    /*$(divContenido).animate(
        {
            height:alturaMax+"px"
        }
    );*/
}

function AgregarBoton(textoBoton,contenedor) {
    var contenido = document.getElementById(contenedor).innerHTML;
    var span = "<span>"+textoBoton+"</span>";
    var boton = "<div class='boton' onclick='ActivarBoton(this)'>"+
                span+"</div><div class='contenido'></div>";
    document.getElementById(contenedor).innerHTML += boton;
}