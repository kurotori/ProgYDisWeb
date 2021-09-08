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
    var elementos = idBoton.parentElement.children;

    //Creamos un bucle sobre ellos con .each
    $(elementos).each(
        //Esta función colapsa todos los div con la clase 'contenido'
        function () {
            //Para cada elemento, obtenemos su lista de clases
            var clases = this.classList;
            //Si en esa clase encontramos la clase 'contenido'...
            if ( clases.contains("contenido") ) {
                //...colapsamos su altura
                $(this).animate(
                    {
                        height:"0%"
                    }
                );
            } 
        }
    );
    var alturaMax = ObtenerEspacioLibre(idBoton.parentElement.id);

    var divContenido = idBoton.nextElementSibling;
    $(divContenido).animate(
        {
            height:alturaMax+"px"
        }
    );
}

function AgregarBoton(textoBoton,contenedor) {
    var contenido = document.getElementById(contenedor).innerHTML;
    var span = "<span>"+textoBoton+"</span>";
    var boton = "<div class='boton' onclick='ActivarBoton(this)'>"+
                span+"</div><div class='contenido'></div>";
    document.getElementById(contenedor).innerHTML += boton;
}