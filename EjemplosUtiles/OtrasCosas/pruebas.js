const divContenedor = document.getElementById('contenedor');

class Celda{
    constructor(x,y,div){
        this.x = x;
        this.y = y;
        this.div = div;
    }
    vecinos = {
        v_N:"",
        v_S:"",
        v_W:"",
        v_E : "",
        v_NW : "",
        v_NE : "",
        v_SW : "",
        v_SE : ""
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
            divCelda.addEventListener('click',MarcarVecinos,false);
            divCelda.id = (x+1)+'_'+(y+1);
            divContenedor.appendChild(divCelda);

            const celda = new Celda(x,y,divCelda);
            tablero.push(celda);
        }
    }
    ObtenerTodosVecinos();
}


function ObtenerVecinos(celda) {
    tablero.forEach(elemento => {
        switch (elemento.x) {
            case (celda.x+1):
                if (elemento.y == (celda.y-1)) {
                    celda.vecinos.v_NE = elemento;
                }
                if (elemento.y == celda.y) {
                    celda.vecinos.v_E = elemento;
                }
                if (elemento.y == (celda.y+1)) {
                    celda.vecinos.v_SE = elemento;
                }
                break;
            case(celda.x):
                if (elemento.y == (celda.y-1)) {
                    celda.vecinos.v_N = elemento;
                }
                if (elemento.y == celda.y+1) {
                    celda.vecinos.v_S = elemento;
                }
                break;
            case (celda.x-1):
                    if (elemento.y == (celda.y-1)) {
                        celda.vecinos.v_NW = elemento;
                    }
                    if (elemento.y == celda.y) {
                        celda.vecinos.v_W = elemento;
                    }
                    if (elemento.y == (celda.y+1)) {
                        celda.vecinos.v_SW = elemento;
                    }
            default:
                break;
        }
    });
}

function ObtenerTodosVecinos() {
    tablero.forEach(celda => {
        ObtenerVecinos(celda);
    });
}

CompletarTablero();
ObtenerTodosVecinos();


function LimpiarTablero() {
    tablero.forEach(celda => {
        celda.div.classList.remove('marcada');
    });
}

function MarcarVecinos() {
    LimpiarTablero();
    let celda = window.event.target;
    //console.log(celda);
    let elm = tablero.find(
        elemento=>elemento.div.id == celda.id
    );
    for (const vecino in elm.vecinos) {
        if (elm.vecinos[vecino]) {
            elm.vecinos[vecino].div.classList.add('marcada');
        }
        
    }
}


