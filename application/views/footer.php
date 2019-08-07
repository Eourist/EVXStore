<button id="btn">Prueba AJAX</button>
<p id="div2">Texto de prueba</p>

<script>
	$(document).ready(function(){
		$('#btn').click(function(){
			
			var data = {nombre: "nombrePrueba", apellido: "apellidoPrueba", edad: 99, correo: "correoPrueba@ej.com", telefono: 12345};

			$.ajax({
				url: "<?php echo base_url(); ?>inicio/prueba_ajax",
				type: 'POST',
				dataType: 'json',
				data: {data: data}
			})
			.done(function(){
				$('#div2').fadeOut('slow');
				console.log("Success!");
			})
			.fail(function(){
				console.log("Error!");
			});
		});
	});
	
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>