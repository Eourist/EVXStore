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
var puntaje_actual = 0;

var objetivo_c = 'null';

// Opciones del jugador
    var centrarse; // Distribucion de ataques = Centrarse en un enemigo hasta matarlo o dañar a todos poco a poco
    var defenderse; // Uso de pociones = Usar pociones para mantener la salud alta o solo al borde de la muerte
    // Tipos de aliados = Tanque, Supertanque, Guerrero, Superguerrero
    var cantidad_aliados = 3; // 3 es el maximo, los supertipos ocupan 2 (??¿¿ con gemas se puede comprar un espacio mas ??¿¿)
    var heroe1;
    var heroe2;
    var heroe3;
    // Items = 10 es el maximo (??¿¿ con gemas se pueden comprar  mas ??¿¿)
    //var bombas = 5;
    var pociones;
    var heroes = new Array();
//
var vel = 1;
function velocidad(activacion){
    if (activacion = 'rapida'){
        vel = 2;
    } else {
        vel = 1;
    }
}

function inicializar_heroes(){ // VERSION VIEJA MEJORAR
    heroe1 = (heroe1 == 'tanque') 
            ? { salud_in: 150, salud: 150, daño: 30, tipo: 'tanque', img: base_url + 'assets/img/dng/tanque.png', elem: $('#heroe1') }
            : { salud_in: 75, salud: 75, daño: 60, tipo: 'guerrero', img: base_url + 'assets/img/dng/guerrero.png', elem: $('#heroe1') };
    heroe1['nombre'] = 'heroe1';
    heroe2 = (heroe2 == 'tanque') 
            ? { salud_in: 150, salud: 150, daño: 30, tipo: 'tanque', img: base_url + 'assets/img/dng/tanque.png', elem: $('#heroe2') }
            : { salud_in: 75, salud: 75, daño: 60, tipo: 'guerrero', img: base_url + 'assets/img/dng/guerrero.png', elem: $('#heroe2') };
    heroe2['nombre'] = 'heroe2';
    heroe3 = (heroe3 == 'tanque') 
            ? { salud_in: 150, salud: 150, daño: 30, tipo: 'tanque', img: base_url + 'assets/img/dng/tanque.png', elem: $('#heroe3') }
            : { salud_in: 75, salud: 75, daño: 60, tipo: 'guerrero', img: base_url + 'assets/img/dng/guerrero.png', elem: $('#heroe3') };
    heroe3['nombre'] = 'heroe3';
    heroes = [heroe1, heroe2, heroe3];

    heroes.forEach(function(item, index){
        item.elem.css('background-image', 'url('+item.img+')');
        item.elem.children('.he_vida').html(item.salud);
    });
    render();
}

function game_over(){
    $.ajax({
        url: base_url + 'inicio/cargar_puntaje',
        type: 'POST',
        data: { puntaje: puntaje_actual }
    });
    enemigos.forEach(function(item, index){
        item.elem.hide();
    });
    console.log("FIN DEL JUEGO!");
}

function inicializar(){
    var img_tanque = base_url + 'assets/img/dng/tanque.png';
    var img_guerrero = base_url + 'assets/img/dng/guerrero.png';

    heroe1 = $('#heroe1-select').val();
    heroe2 = $('#heroe2-select').val();
    heroe3 = $('#heroe3-select').val();

    defenderse = ($('#defenderse-select').val() == 1) ? true : false;
    centrarse = ($('#centrarse-select').val() == 1) ? true : false;

    pociones = $('#input-pociones').val();

    heroe1 = (heroe1 == 'tanque') 
            ? { salud_in: 160, salud: 160, daño: 40, tipo: 'tanque', img: img_tanque, elem: $('#heroe1'), nombre: 'heroe1' }
            : { salud_in: 70, salud: 70, daño: 80, tipo: 'guerrero', img: img_guerrero, elem: $('#heroe1'), nombre: 'heroe1' };
    heroe2 = (heroe2 == 'tanque') 
            ? { salud_in: 160, salud: 160, daño: 40, tipo: 'tanque', img: img_tanque, elem: $('#heroe2'), nombre: 'heroe2' }
            : { salud_in: 70, salud: 70, daño: 80, tipo: 'guerrero', img: img_guerrero, elem: $('#heroe2'), nombre: 'heroe2' };
    heroe3 = (heroe3 == 'tanque') 
            ? { salud_in: 160, salud: 160, daño: 40, tipo: 'tanque', img: img_tanque, elem: $('#heroe3'), nombre: 'heroe3' }
            : { salud_in: 70, salud: 70, daño: 80, tipo: 'guerrero', img: img_guerrero, elem: $('#heroe3'), nombre: 'heroe3' };

    heroes = [heroe1, heroe2, heroe3];
    heroes.forEach(function(item, index){
        item.elem.css('background-image', 'url('+item.img+')');
        item.elem.children('.he_vida').html(item.salud);
    });
    gastar_pociones();
    render();
    jugador_atacar();
}

function jugador_atacar(){
    console.log("%c Comienza el turno del jugador", 'color: green');
    var heroe_actual = 0; // i
    // Intervalo de ataque que se repite segun la cantidad de heroes
    var intervalo_ataque = setInterval(function(){
        // Elegir objetivo segun "distribucion de ataques"
        objetivo_c = (objetivo_c == 'null') ? elegir_objetivo(enemigos) : objetivo_c;
        var objetivo = (centrarse) ? objetivo_c : elegir_objetivo(enemigos);
        if (objetivo == 0){ 
            // elegir_objetivo() devuelve 0 si no encuentra ninguno vivo
            console.log('%c ¡No quedan enemigos vivos! Moviendose a otra zona...', 'color: green');
            movimiento();
            clearInterval(intervalo_ataque);
        }  else if (heroe_actual === heroes.length) {
            // Ya atacaron todos los heroes
            console.log('%c Fin del turno del jugador', 'color: green');
            enemigo_atacar();
            clearInterval(intervalo_ataque);
        } else if (objetivo.salud > 0) {
            if (heroes[heroe_actual].salud > 0) {
                // Decidir si se cura o no
                var recibe_curacion = curacion(heroes[heroe_actual]);
                if (!recibe_curacion){
                    // Atacar
                    heroes[heroe_actual].elem.removeClass('shake');
                    heroes[heroe_actual].elem.addClass('flash');
                    objetivo.elem.removeClass('shake');

                    objetivo.salud -= heroes[heroe_actual].daño / 2;
                    if (objetivo.salud <= 0){
                        puntaje_actual++;
                    }
                    console.log('%c El heroe ' + heroe_actual + ' atacó al enemigo en la posición: ' + objetivo.zona + '!', 'color: green');
                } else {
                    heroes[heroe_actual].elem.removeClass('shake');
                    heroes[heroe_actual].elem.addClass('tada');
                    console.log('%c El heroe ' + heroe_actual + ' se curó con una poción!', 'color: green');
                }
            } else {
                // El heroe está muerto
                console.log('El heroe ' + heroe_actual + ' no puede atacar porque esta muerto!', 'color: green');
            }
            heroe_actual++;
        } else {
            objetivo_c = 'null';
        }
        setTimeout(function(){
            render();
        }, 1000 / vel);
    }, 1600 / vel);
    
}

function enemigo_atacar(){
    console.log("%c Comienza el turno del enemigo", 'color: red');
    var enemigo_actual = 0; // i
    // Intervalo de ataque que se repite segun la cantidad de enemigos
    var intervalo_ataque = setInterval(function(){
        // Elegir objetivo
        var objetivo = elegir_objetivo(heroes);
        if (objetivo == 0){ 
            // elegir_objetivo() devuelve 0 si no encuentra ninguno vivo
            console.log('%c ¡No quedan heroes vivos! Fin del juego', 'color: red');
            clearInterval(intervalo_ataque);
            game_over();
        } else if (enemigo_actual === enemigos.length){
            // Ya atacaron todos los enemigos
            console.log('%c Fin del turno del enemigo', 'color: red');
            jugador_atacar();
            clearInterval(intervalo_ataque);
        } else if (objetivo.salud > 0) {
            if(enemigos[enemigo_actual].salud > 0){
                // Atacar
                enemigos[enemigo_actual].elem.removeClass('shake');
                enemigos[enemigo_actual].elem.addClass('flash');
                objetivo.elem.removeClass('shake');

                objetivo.salud -= enemigos[enemigo_actual].daño / 2;
                console.log('%c El enemigo ' + enemigo_actual + ' atacó a: ' + objetivo.nombre + '! (' + objetivo.salud + ')', 'color: red');
            } else {
                // El enemigo está muerto
                console.log('%c El enemigo ' + enemigo_actual + ' no puede atacar porque esta muerto!', 'color: red');
            }
            enemigo_actual++;
        }
        setTimeout(function(){
            render();
        }, 1000 / vel);
    }, 1600 / vel);
}

function render(){
    enemigos.forEach(function(item, index){
        item.elem.removeClass('flash');
        if (item.salud <= 0){
            // Muerte
            item.elem.children('.en_vida').html('');
            item.elem.css('background-image', 'none');
            item.elem.html('');
        } else {
            // Recibir daño
            if (item.elem.children('.en_vida').html() != item.salud){
                item.elem.addClass('shake');

                item.elem.children().css('color', 'red');
                setTimeout(function(){
                    item.elem.children().css('color', 'white');
                }, 500 / vel);
            }
            item.elem.children('.en_vida').html(item.salud);
        }
    });

    heroes.forEach(function(item, index){
        item.elem.removeClass('flash');
        if (item.salud <= 0){
            // Muerte
            item.elem.children('.he_vida').html('');
            item.elem.css('background-image', 'none');
            item.elem.html('');
        } else {
            if (item.elem.children('.he_vida').html() > item.salud){
                // Recibir daño
                item.elem.addClass('shake');

                item.elem.children().css('color', 'red');
                setTimeout(function(){
                    item.elem.children().css('color', 'white');
                }, 500 / vel);
            } else if (item.elem.children('.he_vida').html() < item.salud){
                // Curacion
                item.elem.removeClass('tada');

                item.elem.children().css('color', 'green');
                setTimeout(function(){
                    item.elem.children().css('color', 'white');
                }, 500 / vel);  
            }
            item.elem.children('.he_vida').html(item.salud);
        }
    });

    $('#pociones').html(pociones);
    $('#zonas').html(piezas_recorridas);
    $('#puntos').html(puntaje_actual);
}

function curacion(heroe){
    if(pociones >= 1){
        if (defenderse){
            if (heroe.salud < (heroe.salud_in - 40)){
                heroe.salud += 40;
                pociones --;
                return true;
            }
        } else {
            if (heroe.salud < (heroe.salud_in * 0.7) && heroe.salud > (heroe.salud_in * 0.4)){
                // Si tiene menos del 70%
                if (randomInt(1, 10) > 9){
                    heroe.salud += 40;
                    pociones --;
                    return true;
                }
            } else if (heroe.salud < (heroe.salud_in * 0.4)){
                // Si tiene menos de 40%
                if (randomInt(1, 10) > 4){
                    heroe.salud += 40;
                    pociones --;
                    return true;
                }
            }
        }
    }
    return false;
}

function movimiento(dir = 'null', pieza_pre = 'null'){
    if (dir != 'start'){
        piezas_recorridas++;
        potenciacion += 0.1;
    }

    var atacar = false;
    if (dir == 'null'){
        var rand = randomInt(1,4);
        dir = (rand == 1) ? 'up' : ((rand == 2) ? 'down' : ((rand == 3) ? 'right' : 'left'))
        atacar = true;
        objetivo_c = 'null';
    }

    // Limpiar tablero
        tablero.html(''); 

        botonUp.hide();
        botonDown.hide();
        botonLeft.hide();
        botonRight.hide();

        enemigos_activos = 0;
        enemigos = new Array();
    //

    // Elegir próximo escenario
        var dirOp = (dir == 'up') ? 'down' : ((dir == 'down') ? 'up' : ((dir == 'left') ? 'right' : 'left'));
        pieza_actual = (pieza_pre == 'null') ? 0 : piezas[pieza_pre];
        while (pieza_actual == 0){
            var rand = randomInt(0,10);
            piezas.forEach(function(item, index) {
                if (index == rand && item[dirOp] == true){
                    pieza_actual = item;
                }
            });
        }
    //

    // Mostrar fondo, enemigos y botónes
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
    $('#zonas').html(piezas_recorridas);
    if(atacar){
        puntaje_actual += 10;
        $('#puntos').html(puntaje_actual);
        console.log("%c El jugador avanzó a una nueva zona", 'color: blue');
        enemigo_atacar();
        pociones =  parseInt(pociones) + randomInt(0, 2);
    }
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
    tablero.append('<div class="animated" id="mob-'+dir+'" style="text-align: center; padding: 0px;position: fixed; margin-top: '+m_top+'px; margin-left: '+m_left+'px; background-image: url('+base_url+'assets/img/dng/ogro.png); background-size: 100%; height: 50px; width: 50px;"></div>');
    
    // Decidir la cantidad de enemigos que puede haber en un camino
    var cantidad_enemigos = randomInt(1,10);
    cantidad_enemigos = (cantidad_enemigos > 7) ? 1 : 1; // Cambiar a "? X : 1" si quiero que halla mas de un enemigo

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
        enemigos[enemigos_activos].elem.append('<div class="en_vida animated" style="margin-top: -18px; color: white; font-weigth: bold">' + enemigos[enemigos_activos].salud + '</div>');
        enemigos_activos += cantidad_enemigos;
    //
}

function elegir_objetivo(arreglo = enemigos){
    // Averiguar cuantos enemigos vivos quedan y cual es el unico en caso de que solo quede uno
    var posibles_objetivos = -1;
    var ultimo_objetivo_vivo;
    arreglo.forEach(function(item, index){
        if (item.salud > 0){
            posibles_objetivos++;
            ultimo_objetivo_vivo = item;
        }
    });
    // Si hay enemigos vivos elegir uno al azar, si no return 0
    if (posibles_objetivos == -1){ 
        return 0;
    } else {
        var enemigo_seleccionado = (posibles_objetivos == 0) ? ultimo_objetivo_vivo : 'null';
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
}

function comprar_pocion(){
    $.ajax({
        url: base_url + 'inicio/comprar_pocion',
        type: 'POST',
        data: { pociones: parseInt($('#input-pociones').val())},
        success: function(data){
            data = jQuery.parseJSON(data);
            $('#mostrar-creditos').html(data.creditos + ' ');
            if (data.error != 1){
                var pociones = parseInt($('#input-pociones').val());
                $('#input-pociones').val(pociones + 1);
            }
        }
    });
}

function gastar_pociones(){
    $.ajax({url: base_url + 'inicio/gastar_pociones'});
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