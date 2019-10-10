<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/juego_syle.css"> -->

<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%);">
	<div class="titulo"> Nombre del juego </div>
	<div class="row" style="padding: 30px;">
		<div class="col-sm-5">
			<div class="direcciones" style="position: fixed; width: 400px; height: 400px;">
				<button class="btn btn-primary btn-sm" id="dir-left" onclick="spawnEnemigo('left')"
				style="position:fixed; margin-top: 185px; margin-left: 0px; height: 20px; text-align: center; padding: 0px;">       
				</button>

				<button class="btn btn-primary btn-sm"  id="dir-right" onclick="spawnEnemigo('right')"
				style="position:fixed; margin-top: 185px; margin-left: 379px;height: 20px; text-align: center; padding: 0px;">       
				</button>

				<button class="btn btn-primary btn-sm"  id="dir-up" onclick="spawnEnemigo('up')"
				style="position:fixed; margin-top: 0px; margin-left: 185px; height: 20px; text-align: center; padding: 0px;">       
				</button>

				<button class="btn btn-primary btn-sm"  id="dir-down" onclick="spawnEnemigo('down')"
				style="position:fixed; margin-top: 380px; margin-left: 185px; height: 20px; text-align: center; padding: 0px;">       
				</button>
			</div>

			<div class="pieza animated" id="tablero" style="background: gray; width: 400px; height: 400px;border: 2px solid #f71414;">
			</div>	
		</div>
		<div class="col-sm-7">
			<div class="panel-b-txt" style="margin-top: 15px !important;">
				Formulario de personalizacion del juego Consequatur debitis quia id voluptates eligendi sunt quam aperiam suscipit enim similique minus eum sed, expedita nobis, laborum provident excepturi nihil quos.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi esse vero consectetur dolorem eos beatae impedit, quae, rerum maiores mollitia cupiditate aspernatur architecto, aut voluptatibus maxime sit placeat dignissimos eligendi.
			</div>
		</div>	
	</div>
</div>
<button type="button" onclick="start()" class="btn btn-default">button</button>

<script>
	//var base_url = '<?php echo base_url(); ?>';
</script>