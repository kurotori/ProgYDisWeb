function AbrirMenu() {
    var estadoMenu = $('#menu_cuerpo').css('width');
    
    if (estadoMenu=="50px") {
        $('#menu_cuerpo').animate(
            {
                width: "200px"
            },
            "slow"
        );
        $('#menu_boton').css('background-image',"url('imagen/menu_abierto.png')");
        $('.menu_item_texto').toggle();
    } else {
        $('#menu_cuerpo').animate(
            {
                width: "50px"
            },
            "slow"
        );
        $('#menu_boton').css('background-image',"url('imagen/menu_cerrado.png')");
        $('.menu_item_texto').toggle();
    }
}