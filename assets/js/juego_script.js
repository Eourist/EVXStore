var pieza1 = {
    imgPath: 'blablabla',
    up: false,
    down: true,
    left: false,
    right: true
}

var pieza_actual;

function spawnEnemigo(dir){
    var m_top = 0;
    var m_left = 0;

    switch (dir)
    {
        case 'left':
            m_top = 170;
            m_left = 30;
        break;
        case 'up':
            m_top = 30;
            m_left = 170;
        break;
        case 'down':
            m_top = 320;
            m_left = 170;
        break;
        case 'right':
            m_top = 170;
            m_left = 320;
        break;
    }

    var tablero = $('#tablero');
    tablero.append('<div id="mob-'+dir+'" style="padding: 14px 20px 20px 20px;position: fixed; margin-top: '+m_top+'px; margin-left: '+m_left+'px; background-color: red; height: 50px; width: 50px;"></div>');
    
    // DECIDIR SI LOS ENEMIGOS PUEDEN SER 2 EN UNA CASILLA O NO
    var cantidad_enemigos = Math.floor(Math.random() * (10 - 1)) + 1;
    cantidad_enemigos = (cantidad_enemigos > 6) ? 2 : 1;

    var enemigo = $('#mob-'+dir);
    enemigo.append('<span>'+cantidad_enemigos+'</span>');
}