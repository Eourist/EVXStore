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
var piezas_recorridas = 0;
var potenciacion = 1;
var pieza_actual;

// Opciones del jugador
    var centrarse = false; // Distribucion de ataques = Centrarse en un enemigo hasta matarlo o dañar a todos poco a poco
    var defenderse = false; // Uso de pociones = Usar pociones para mantener la salud alta o solo al borde de la muerte
    // Tipos de aliados = Tanque, Supertanque, Guerrero, Superguerrero
    var cantidad_aliados = 3; // 3 es el maximo, los supertipos ocupan 2 (??¿¿ con gemas se puede comprar un espacio mas ??¿¿)
    var heroe1 = 'tanque';
    var heroe2 = 'guerrero';
    var heroe3 = 'guerrero';
    // Items = 10 es el maximo (??¿¿ con gemas se pueden comprar  mas ??¿¿)
    var bombas = 5;
    var pociones = 5;
    var heroes = new Array();
//

function inicializar_heroes(){ // MEJORAR
    heroe1 = (heroe1 == 'tanque') 
            ? { salud: 400, daño: 30, tipo: 'tanque' }
            : { salud: 200, daño: 60, tipo: 'guerrero' };
    heroe2 = (heroe2 == 'tanque') 
            ? { salud: 400, daño: 30, tipo: 'tanque' }
            : { salud: 200, daño: 60, tipo: 'guerrero' };
    heroe3 = (heroe3 == 'tanque') 
            ? { salud: 400, daño: 30, tipo: 'tanque' }
            : { salud: 200, daño: 60, tipo: 'guerrero' };
    heroes = [heroe1, heroe2, heroe3];
    console.log("Heroes listos!");
}

function jugador_atacar(){
    if (centrarse){

    } else {
        var heroe_actual = 0;
        var intervaloAtaque = setInterval(function(){
            var objetivo = elegir_objetivo();
            if (objetivo === 0 || heroe_actual === heroes.length){ 
                clearInterval(intervaloAtaque);
            }

            if(heroes[heroe_actual].salud > 0){
                console.log(objetivo);
                objetivo.salud -= heroes[heroe_actual].daño / 2;
                console.log('El heroe ' + heroe_actual + ' ataco al enemigo ' + objetivo.dir + '!');
            } else {
                console.log('El heroe ' + heroe_actual + ' no puede atacar porque esta muerto!');
            }
            heroe_actual++;
            render();
        },1000);
    }
}

function render(){
    enemigos.forEach(function(item, index){
        item.elem.html(item.salud);
    });
}

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

function elegir_objetivo(arreglo = enemigos){
    // Averiguar cuantos enemigos vivos quedan
    var posibles_objetivos = -1;
    arreglo.forEach(function(item, index){
        if (item.salud > 0){
            posibles_objetivos++;
        }
    });
    // Si hay enemigos vivos elegir uno al azar, si no return 0
    if (posibles_objetivos == -1){ return 0; }
    var enemigo_seleccionado = (posibles_objetivos == 0) ? arreglo[0] : 'null';
    for(let i = 0; i < posibles_objetivos; i++){
        do {
            let rand = randomInt(0,posibles_objetivos);
            if (arreglo[rand] != undefined){
                enemigo_seleccionado = (arreglo[rand].salud > 0) ? arreglo[rand] : 'null';
            }
        } while (enemigo_seleccionado == 'null')
    }
    return enemigo_seleccionado;
}

function randomInt(min, max){ return Math.floor(Math.random() * ((max + 1) - min) ) + min; }

function randomFloat(min, max){ return (Math.random() * (max - min) + min).toFixed(2); }

jQuery(document).ready(function($) {
    movimiento('start');
    inicializar_heroes();
});