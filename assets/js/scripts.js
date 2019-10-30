$(document).ready(function(){

	$('.row-monedas').click(function() {
		$('.row-monedas').children('.fondo-radio').children('.radio-cantidad').removeAttr('checked');
		$('.row-monedas').css({
			background: 'white',
			color: 'black'
		});
		$('.row-monedas').removeClass('pulse');

		$(this).children('.fondo-radio').children('.radio-cantidad').attr('checked', 'checked');
		$(this).css({
			background: 'linear-gradient(#f71414, #ff4d17)',
			color: 'white'
		});

		$('#btn-comprar-monedas').html('Confirmar (' + $(this).children('.fondo-precio').html() + ')');
		$(this).addClass('pulse');
	});

	$('#error-alerta').click(function(event) {
		ocultarAlerta();
	});

	$(".nav-item").hover(function(){
  		var bh = $(this).attr('id') + 'h';
		var bd = $(this).attr('id') + 'd';
	 	$("#" + bh).slideDown('fast');
	 	$("#" + bd).slideUp('fast');
  		}, function(){
  		var bh = $(this).attr('id') + 'h';
		var bd = $(this).attr('id') + 'd';
	 	$("#" + bh).slideUp('fast');
	 	$("#" + bd).slideDown('fast');
	});

	$('.evx-modal-btn').hover(function(){
		$(this).css({'border-bottom' : '9px solid #ff2200'});
		}, function(){
		$(this).css({'border-bottom' : '9px solid white'});
	});

	$('.btn-sb').click(function(){
		var id = $(this).attr('id');
		$('#collapse-'+id).fadeToggle();
	});

	$('.btn-comprar').click(function(){
		var juego_id = $(this).data('juego-id');
		$.ajax({
			url: base_url + 'inicio/ver_juego',
			type: 'POST',
			data: {juego_id: juego_id},
		})
		.done(function(data) {
			data = jQuery.parseJSON(data);
			$('#evx-comprar-modal').modal().show();
			
			$('#btn-confirmar-compra-juego').html('Confirmar ($' + (data.precio - 0.01 )+ ')');
			$('#modal-juego-nombre').html('<b>' + data.nombre + '</b>');

			$('#juego-id').val(juego_id);
			$('#juego-precio').val(data.precio);
		});
	});

	$('#btn-confirmar-compra-juego').click(function(e){
		e.preventDefault();
		var juego_id 	= $('#juego-id').val();
		var precio 		= $('#juego-precio').val();

		$(this).html('Procesando <i class="fas fa-spinner fa-spin"></i>')
		$(this).attr('disabled', 'disabled');
		setTimeout(function(){
			$.ajax({
				url: base_url + 'inicio/comprar_juego',
				type: 'POST',
				data: { juego_id: juego_id, precio: precio },
				success: function(data){
					data = jQuery.parseJSON(data);
					if (data.error){
						mostrarAlerta(data.error);
					} else {
						//$('#mostrar-creditos').html(data.creditos + ' ');
						mostrarAlerta('Compra realizada correctamente', 'linear-gradient(#2cc9bf, #38fff2)');
					}

					$('#btn-confirmar-compra-juego').html('Confirmar')
					$('#btn-confirmar-compra-juego').removeAttr('disabled');
					$('#evx-comprar-modal').modal('hide');
				}
			});
		}, 500);
	});

	$('#btn-comprar-monedas').click(function(e){
		e.preventDefault();
		var cantidad = $('input[name=f_cantidad]:checked').val();

		$(this).html('Procesando <i class="fas fa-spinner fa-spin"></i>')
		$(this).attr('disabled', 'disabled');

		if (cantidad >= 100){
			setTimeout(function(){
				$.ajax({
					url: base_url + 'inicio/comprar_monedas',
					type: 'POST',
					data: { cantidad: cantidad },
					success: function(data){
						data = jQuery.parseJSON(data);
						console.log(data);
						$('#btn-comprar-monedas').html('Confirmar')
						$('#btn-comprar-monedas').removeAttr('disabled');

						$('.row-monedas').children('.fondo-radio').children('.radio-cantidad').removeAttr('checked');
						$('.row-monedas').css({ background: 'white', color: 'black' });
						$('.row-monedas').removeClass('pulse');

						$('#mostrar-creditos').html(data.creditos + ' ');
						$('#evx-coins-modal').modal('hide');
						mostrarAlerta('Compra realizada correctamente', 'linear-gradient(#2cc9bf, #38fff2)');
					}
				});
			}, 500);
		} else {
			$('#monedas-info').addClass('pulse');
			$('#monedas-info').css('color', 'red');
			setTimeout(function(){
				$('#monedas-info').removeClass('pulse');
				$('#monedas-info').css('color', 'black');
			}, 1000);
			$('#btn-comprar-monedas').html('Confirmar')
			$('#btn-comprar-monedas').removeAttr('disabled');
		}
	});
});

function mostrarAlerta(texto, color = 'red'){
	$('.evx-alerta').html(texto);
	$('.evx-alerta').css('background', color);
	$('#error-alerta').show();
	setTimeout(function(){
		ocultarAlerta();
	}, 4000);
}
function ocultarAlerta(){
	$('#error-alerta').fadeOut('slow');
}
function cerrarSesion(){
	$.ajax({ url: base_url + 'inicio/cerrar_sesion' });
}

