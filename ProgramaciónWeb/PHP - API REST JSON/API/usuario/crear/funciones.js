const formulario=document.getElementById('datos_usuario');





function cargarDatos() {

    let datos = {
        nombre:formulario['nombre'].value,
        ci:formulario['ci'].value,
        email:formulario['email'].value,
        fecha_nac:formulario['fecha_nac'].value
    }

    let usuario = {
        usuario:datos
    }
    console.log(usuario);

    fetch('crear2.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(usuario)
    }).then(res => res.json())
    .then(res => console.log(res));
}