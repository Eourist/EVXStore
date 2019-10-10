//var piezas = new Array();
//piezas = [_dr, _dl, _ur, _ul, _dlr, _ulr, _lr, _ud, _udr, _udl, _udlr];

// Const
    var piezas = [
        _udlr = {
            imgPath: base_url + 'assets/img/piezas/udlr',
            up: true,
            down: true,
            left: true,
            right: true
        },
        _udl = {
            imgPath: base_url + 'assets/img/piezas/udl',
            up: true,
            down: true,
            left: true,
            right: false
        },
        _udr = {
            imgPath: base_url + 'assets/img/piezas/udr',
            up: true,
            down: true,
            left: false,
            right: true
        },
        _ud = {
            imgPath: base_url + 'assets/img/piezas/ud',
            up: true,
            down: true,
            left: false,
            right: false
        },
        _lr = {
            imgPath: base_url + 'assets/img/piezas/lr',
            up: false,
            down: false,
            left: true,
            right: true
        },
        _ulr = {
            imgPath: base_url + 'assets/img/piezas/ulr',
            up: true,
            down: false,
            left: true,
            right: true
        },
        _dlr = {
            imgPath: base_url + 'assets/img/piezas/dlr',
            up: false,
            down: true,
            left: true,
            right: true
        },
        _ul = {
            imgPath: base_url + 'assets/img/piezas/ul',
            up: true,
            down: false,
            left: true,
            right: false
        },
        _ur = {
            imgPath: base_url + 'assets/img/piezas/ur',
            up: true,
            down: false,
            left: false,
            right: true
        },
        _dl = {
            imgPath: base_url + 'assets/img/piezas/dl',
            up: false,
            down: true,
            left: true,
            right: false
        },
        _dr = {
            imgPath: base_url + 'assets/img/piezas/dr',
            up: false,
            down: true,
            left: false,
            right: true
        }
    ];

    var botonUp = $('#dir-up');
    var botonDown = $('#dir-down');
    var botonLeft = $('#dir-left');
    var botonRight = $('#dir-right');

    var tablero = $('#tablero');
//

var enemigos_activos;

function start(){
    var pieza_actual;
    enemigos_activos = 0;

    // Limpiar tablero
    tablero.html(''); 
    botonUp.hide();
    botonDown.hide();
    botonLeft.hide();
    botonRight.hide();

    // Elegir proximo escenario
    var rand = random(0,10);
    piezas.forEach(function(item, index) {
        if (index == rand){
            pieza_actual = item;
        }
    });

    //tablero.addClass('bounceInLeft'); animate.css ya esta funcionando
    // Mostrar fondo
    tablero.css({
        "background-image": 'url(' + pieza_actual.imgPath + '.png)',
        "background-repeat": 'no-repeat',
        "background-size": '100%'
    });

    // Mostrar enemigos y botones
    if (pieza_actual.up){
        llenarCamino('up');
    }
    if (pieza_actual.down){
        llenarCamino('down');
    }
    if (pieza_actual.left){
        llenarCamino('left');
    }
    if (pieza_actual.right){
        llenarCamino('right');
    }
    console.log(enemigos_activos);
}

function llenarCamino(dir){
    // Margenes
    var m_top = 0;
    var m_left = 0;

    switch (dir)
    {
        case 'left':
            m_top = 170;
            m_left = 30;
            botonLeft.show();
        break;
        case 'up':
            m_top = 30;
            m_left = 170;
            botonUp.show();
        break;
        case 'down':
            m_top = 320;
            m_left = 170;
            botonDown.show()
        break;
        case 'right':
            m_top = 170;
            m_left = 320;
            botonRight.show();
        break;
    }

    // Agregar enemigo con los margenes proporcionados
    var tablero = $('#tablero');
    tablero.append('<div id="mob-'+dir+'" style="padding: 14px 20px 20px 20px;position: fixed; margin-top: '+m_top+'px; margin-left: '+m_left+'px; background-color: red; height: 50px; width: 50px;"></div>');
    
    // Decidir la cantidad de enemigos que hay en el camino
    var cantidad_enemigos = random(1,10);
    cantidad_enemigos = (cantidad_enemigos > 7) ? 2 : 1;

    // Mostrar el numero de enemigos
    var enemigo = $('#mob-'+dir);
    enemigo.append('<span>'+cantidad_enemigos+'</span>');
    enemigos_activos += cantidad_enemigos;
}

function random(min, max){
    return Math.floor(Math.random() * ((max + 1) - min) ) + min;
}

start();