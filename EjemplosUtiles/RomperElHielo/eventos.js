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
            let porcX1 = ((posRatonX - posObjetoX)*100/objAncho);
            let porcX2 = 100-porcX1;
            bloque1.style.width = "calc("+porcX1+'% - 4px)';
            bloque2.style.width = "calc("+porcX2+'% - 4px)';

            bloque1.classList.add('alto');
            bloque2.classList.add('alto');
        } 
        else {
            let porcX1 = ((posRatonY - posObjetoY)*100/objAltura);
            let porcX2 = 100-porcX1;
            bloque1.style.height = "calc("+porcX1+'% - 4px)';
            bloque2.style.height = "calc("+porcX2+'% - 4px)';

            bloque1.classList.add('ancho');
            bloque2.classList.add('ancho');
        }

        objeto.appendChild(bloque1);
        objeto.appendChild(bloque2);
        objeto.classList.remove('hielo');
        objeto.classList.add('agua');

    }

}, false);

/*document.addEventListener('pointermove',
    function(){
        let posRatonX = window.event.clientX;
        let posRatonY = window.event.clientY;
        console.log(posRatonX + "," + posRatonY);
    },
false);*/