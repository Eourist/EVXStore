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
});

