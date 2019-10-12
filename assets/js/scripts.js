$(document).ready(function(){

	if ($('#error-alerta').length > 0){
		setTimeout(function(){
			ocultarAlerta();
		}, 6000);
	}

	$('#error-alerta').click(function() {
		ocultarAlerta();
	});
	// $(".nav-item").hover(function(){
	// 	var bg = "bg" + $(this).attr('id');
	// 	$(bg).slideDown('fast');
	// },
	// function(){
	// 	var bg = "bg" + $(this).attr('id');
	// 	$(bg).slideUp('fast');
	// });
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

	/*$('#evx-login-btn').click(function(){
		$('#evx-login-modal').modal('show');
	});

	$('#evx-signup-btn').click(function(){
		$('#evx-signup-modal').modal('show');
	});

	$('#evx-logout-btn').click(function(){
		$('#evx-logout-modal').modal('show');
		console.log('click!');
	});*/

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
			
			$('#modal-juego-comprar').html('Confirmar ($' + (data.precio - 0.01 )+ ')');
			$('#modal-juego-nombre').html('<b>' + data.nombre + '</b>');
		});
		
	});
});

function ocultarAlerta(){
	$('#error-alerta').hide();
	$.ajax({
		url: base_url + 'inicio/cerrar_sesion',
		type: 'POST'
	});
}

