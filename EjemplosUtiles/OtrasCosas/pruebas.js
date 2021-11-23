

class Celda{
    constructor(x,y){
        this.x = x;
        this.y = y;
        this.vecinos = Array();
    }

}

let tablero = Array();

function CompletarTablero() {
    for (let x = 0; x < 6; x++) {
        for (let y = 0; y < 4; y++) {
            const celda = new Celda(x,y);
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

