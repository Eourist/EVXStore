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

    var enemigos = [];

    var botonUp = $('#dir-up');
    var botonDown = $('#dir-down');
    var botonLeft = $('#dir-left');
    var botonRight = $('#dir-right');

    var tablero = $('#tablero');
//

var enemigos_activos;
var aliados_activos = 3;
var piezas_recorridas = 0;
var potenciacion = 1;
var pieza_actual;

function movimiento(dir){
    if (dir != 'start'){
        piezas_recorridas++;
        potenciacion += 0.1;
    }

    // Limpiar tablero
        tablero.html(''); 

        botonUp.hide();
        botonDown.hide();
        botonLeft.hide();
        botonRight.hide();

        enemigos_activos = 0;
        enemigos = [];
    //

    // Elegir proximo escenario
        var dirOp = (dir == 'up') ? 'down' : ((dir == 'down') ? 'up' : ((dir == 'left') ? 'right' : 'left'));
        pieza_actual = 0;
        while (pieza_actual == 0){
            var rand = randomInt(0,10);
            piezas.forEach(function(item, index) {
                if (index == rand && item[dirOp] == true){
                    pieza_actual = item;
                }
            });
        }
    //

    // Mostrar fondo, enemigos y botones
        tablero.css({"background-image": 'url(' + pieza_actual.imgPath + '.png)'});

        if (pieza_actual.up && dir != 'down')
            llenarCamino('up');
        if (pieza_actual.down && dir != 'up')
            llenarCamino('down');
        if (pieza_actual.left && dir != 'right' && dir != 'start')
            llenarCamino('left');
        if (pieza_actual.right && dir != 'left')
            llenarCamino('right');
    //

    console.log(enemigos);
}

function llenarCamino(dir){
    // Margenes
    var m_top = 0;
    var m_left = 0;

    // Ajustar posición del enemigo
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
                botonDown.show();
            break;
            case 'right':
                m_top = 170;
                m_left = 320;
                botonRight.show();
            break;
        }
    //

    // Agregar enemigo con los margenes proporcionados
    tablero.append('<div id="mob-'+dir+'" style="text-align: center; padding: 0px;position: fixed; margin-top: '+m_top+'px; margin-left: '+m_left+'px; background-color: red; height: 50px; width: 50px;"></div>');
    
    // Decidir la cantidad de enemigos que puede haber en un camino
    var cantidad_enemigos = randomInt(1,10);
    cantidad_enemigos = (cantidad_enemigos > 7) ? 1 : 1; // Cambiar a "? 2 : 1" si quiero que halla mas de un enemigo

    // Inicializar enemigo
        var elem = $('#mob-'+dir);
        var nombre = "en_" + enemigos_activos;
        var randomVida = randomFloat(0.8, 1.2);
        var randomDaño = randomFloat(0.8, 1.2);
        enemigos[enemigos_activos] = { 
            nombre: nombre, 
            salud:  Math.floor(100 * potenciacion * randomVida),
            daño:   Math.floor(10 * potenciacion * randomDaño),
            elem:   elem,
            zona:   dir
        }
        enemigos[enemigos_activos].elem.append('<span>' + enemigos[enemigos_activos].salud + '</span>');
        enemigos_activos += cantidad_enemigos;
    //
}

function juego_automatico(){ // ESTO HACE CUALQUIER COSA, REVISAR
    var caminos = enemigos_activos - 1;
    for (let i = 0; i < aliados_activos; i++){
        console.log('ataco el aliado ' + i);
        let target =  enemigos[randomInt(0, enemigos_activos - 1)];
        target.salud -= 15;
        target.elem.html('<span>' + target.salud + '</span>');
        console.log('el enemigo ' + target.zona + ' recibio daño');

        if (target.salud <= 0){
            target.elem.hide();
            enemigos_activos--;
        }
    }
    if (enemigos_activos == 0)
        movimiento(enemigos[randomInt(0, caminos)].zona);
}

function randomInt(min, max){

    return Math.floor(Math.random() * ((max + 1) - min) ) + min;
}

function randomFloat(min, max){

    return (Math.random() * (max - min) + min).toFixed(2);
}

jQuery(document).ready(function($) {
    movimiento('start');
});