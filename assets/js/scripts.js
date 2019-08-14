var j1_nombre = "Jugador 1";
var j2_nombre = "Jugador 2";

var j1_vida = 100;
var j2_vida = 100;

function render()
{
	document.getElementById('j1_vida').innerHTML = j1_vida;
	document.getElementById('j2_vida').innerHTML = j2_vida;
	if (j1_vida <= 0 || j2_vida <= 0)
	{
		alert('Fin del combate');

		j1_vida = 100;
		j2_vida = 100;
	}
	document.getElementById('j1_nombre').innerHTML = j1_nombre;
	document.getElementById('j2_nombre').innerHTML = j2_nombre;
}

function atacar(atacante)
{
	if (atacante == 'j1')
	{
		j2_vida -= 10;
		if(j2_vida < 0)
		{
			j2_vida = 0;
		}
	} else if (atacante == 'j2')
	{
		j1_vida -= 10;
		if(j1_vida < 0)
		{
			j1_vida = 0;
		}
	}

	render();
}
function curar(jugador)
{
	if (jugador == 'j1')
	{
		if(j1_vida > 0)
			j1_vida += 10;
		if(j1_vida > 100)
		{
			j1_vida = 100;

		}
	} else if (jugador == 'j2')
	{
		if(j2_vida > 0)
			j2_vida += 10;
		if(j2_vida > 100)
		{
			j2_vida = 100;
		}
	}

	render();
}

render();