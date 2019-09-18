$(document).ready(function(){
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
});

