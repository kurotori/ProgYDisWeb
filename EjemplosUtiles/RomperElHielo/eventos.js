document.addEventListener('click', function() {
    
    //console.log(window.event.target);
    let objeto = window.event.target;
    
    let objClases = Array.from(objeto.classList);
    
    let posRatonX = window.event.clientX;
    let posRatonY = window.event.clientY;

    if (objClases.includes('bloque')) {
        console.log(objeto);
        let objAncho = objeto.clientWidth;
        let objAltura = objeto.clientHeight;

        let posObjetoX = objeto.getBoundingClientRect().left;
        let posObjetoY = objeto.getBoundingClientRect().top;

        console.log(posObjetoX + " " + posObjetoY);

        const bloque1 = document.createElement('div');
        const bloque2 = document.createElement('div');
        bloque1.classList.add('bloque','hielo');
        bloque2.classList.add('bloque','hielo');

        if (objAncho > objAltura) {
            bloque1.classList.add('alto','medioAncho');
            bloque2.classList.add('alto','medioAncho');
        } 
        else {
            bloque1.classList.add('medioAlto','ancho');
            bloque2.classList.add('medioAlto','ancho');
        }

        objeto.appendChild(bloque1);
        objeto.appendChild(bloque2);
        objeto.classList.remove('hielo');
        objeto.classList.add('agua');

    }

}, false);