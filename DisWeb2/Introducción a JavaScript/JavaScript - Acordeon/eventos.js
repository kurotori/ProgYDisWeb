var btnActivo="";

function ActivarBoton(idBoton) {
    var elementos = idBoton.parentElement.children;

    $(elementos).each(
        function () {
            var tipo = this.classList;
            if ( tipo.contains("contenido") ) {
                $(this).animate(
                    {
                        height:"0%"
                    }
                );
            } 
        }
    );

    
    var divContenido = idBoton.nextElementSibling;
    $(divContenido).animate(
        {
            height:"80%"
        }
    );

    
}