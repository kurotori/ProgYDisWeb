


function MostrarFondo() {
    var fondo = document.getElementById('fondo');
    fondo.style.opacity = "1";
}

function OcultarFondo() {
    var fondo = document.getElementById('fondo');
    fondo.style.opacity = "0";
}


function AbrirDialogo() {
    var dialogo = document.getElementById('dialogo');
    dialogo.style.opacity="1";
}


function CerrarDialogo() {
    var dialogo = document.getElementById('dialogo');
    dialogo.style.opacity="0";
}

function AbrirMenu() {
    const menu = document.getElementById('menu');
    menu.style.width="25%";
}

function CerrarMenu() {
    const menu = document.getElementById('menu');
    menu.style.width="50px";
}


function Dialogo() {
    var estadoFondo = document.getElementById("fondo").style.opacity;
    var estadoDialogo = document.getElementById("dialogo").style.opacity;

    if (estadoFondo != "1" && estadoDialogo != "1") {
        MostrarFondo();
        AbrirDialogo();
    } else {
        CerrarDialogo();
        OcultarFondo();
    }
}

function Menu() {
    var estadoFondo = document.getElementById("fondo").style.opacity;
    var estadoMenu = document.getElementById("menu").style.width;

    if (estadoFondo != "1" && estadoMenu != "25%") {
        MostrarFondo();
        AbrirMenu();
    } else {
        CerrarMenu();
        OcultarFondo();
    }
}

