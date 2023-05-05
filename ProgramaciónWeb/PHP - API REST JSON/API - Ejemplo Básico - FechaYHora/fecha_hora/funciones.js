const titulo = document.getElementById("titulo");
const btnActualizar = document.getElementById("btnActualizar");

btnActualizar.addEventListener("click",obtenerFecha);

let servidor = {};

function obtenerFecha() {
    titulo.innerText="Espere...";
    setTimeout(() => {
        fetch("fecha/index.php")
        .then(respuesta=>respuesta.text())
        .then(datos=>{
            servidor = JSON.parse(datos);
            let dia = servidor.Respuesta.datos.dia;
            let mes = servidor.Respuesta.datos.mes;
            let anio = servidor.Respuesta.datos.anio;
            titulo.innerText = dia+"/"+mes+"/"+anio;
            }
        );
    }, 500);
    
}

