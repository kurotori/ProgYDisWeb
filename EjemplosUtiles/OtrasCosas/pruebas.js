const divContenedor = document.getElementById('contenedor');

class Celda{
    constructor(x,y,div){
        this.x = x;
        this.y = y;
        this.div = div;
        this.vecinos = Array();
    }

}

let tablero = Array();

function CompletarTablero() {
    for (let x = 0; x < 7; x++) {
        for (let y = 0; y < 6; y++) {
            const divCelda = document.createElement('div');
            divCelda.classList.add('celda');
            divCelda.classList.add('col_'+(x+1));
            divCelda.classList.add('fil_'+(y+1));
            divContenedor.appendChild(divCelda)
            const celda = new Celda(x,y,divCelda);
            tablero.push(celda);
        }
        
    }
}


function ObtenerVecinos(celda) {
    let vecinos = Array();
    tablero.forEach(elemento => {
        switch (elemento.x) {
            case (celda.x+1):
                if (elemento.y == (celda.y-1)) {
                    vecinos.push(elemento);
                }
                if (elemento.y == celda.y) {
                    vecinos.push(elemento);
                }
                if (elemento.y == (celda.y+1)) {
                    vecinos.push(elemento);
                }
                break;
            case(celda.x):
                if (elemento.y == (celda.y-1)) {
                    vecinos.push(elemento);
                }
                if (elemento.y == celda.y+1) {
                    vecinos.push(elemento);
                }
                break;
            case (celda.x-1):
                    if (elemento.y == (celda.y-1)) {
                        vecinos.push(elemento);
                    }
                    if (elemento.y == celda.y) {
                        vecinos.push(elemento);
                    }
                    if (elemento.y == (celda.y+1)) {
                        vecinos.push(elemento);
                    }
            default:
                break;
        }
    });
    celda.vecinos = vecinos;
}

function ObtenerTodosVecinos() {
    tablero.forEach(celda => {
        ObtenerVecinos(celda);
    });
}

CompletarTablero();
let celda = tablero[5];
ObtenerVecinos(celda);

