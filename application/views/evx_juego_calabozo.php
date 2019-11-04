<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/juego_syle.css"> -->
<style> body{ overflow: hidden; } </style>
<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%); image-rendering: pixelated;">
	<div class="titulo"> Nombre del juego </div>
	<div class="row" style="padding: 30px;">
		<div class="col-sm-5">
			<div class="direcciones" style="position: fixed; width: 400px; height: 400px;">
				<button class="btn btn-default btn-sm" id="dir-left" onclick="movimiento('left')"
				style="position:fixed; margin-top: 185px; margin-left: 0px; height: 20px; text-align: center; padding: 0px;">       
				</button>

				<button class="btn btn-default btn-sm" id="dir-right" onclick="movimiento('right')"
				style="position:fixed; margin-top: 185px; margin-left: 379px;height: 20px; text-align: center; padding: 0px;">       
				</button>

				<button class="btn btn-default btn-sm"  id="dir-up" onclick="movimiento('up')"
				style="position:fixed; margin-top: 0px; margin-left: 185px; height: 20px; text-align: center; padding: 0px;">       
				</button>

				<button class="btn btn-default btn-sm"  id="dir-down" onclick="movimiento('down')"
				style="position:fixed; margin-top: 380px; margin-left: 185px; height: 20px; text-align: center; padding: 0px;">       
				</button>
			</div>

			<div id="heroe1" style="position:fixed; margin-top: 140px; margin-left: 175px; height: 50px; text-align: center; padding: 0px; width: 50px; background-size: 100%;"></div>
			<div id="heroe2" style="position:fixed; margin-top: 190px; margin-left: 150px; height: 50px; text-align: center; padding: 0px; width: 50px; background-size: 100%;"></div>
			<div id="heroe3" style="position:fixed; margin-top: 190px; margin-left: 200px; height: 50px; text-align: center; padding: 0px; width: 50px; background-size: 100%;"></div>
			<div class="pieza animated" id="tablero" style="background: gray; width: 400px; height: 400px;border: 2px solid #f71414; background-repeat: no-repeat; background-size: 100%;">
			</div>	

		</div>
		<div class="col-sm-7 align-self-center">
			<div class="panel-b-txt" style="margin-top: 15px !important;">
				<div class="formulario-configuracion">
					<h3 style="text-align: center; border-bottom: 3px solid #f71414">OPCIONES DE LA PARTIDA</h3>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="distribucion_atq">Distribucion de ataques</label>
								<div class="input-group">
									<select name="distribucion_atq" id="distribucion_atq" class="form-control">
										<option value="0">Centrado</option>
										<option value="0">Disperso</option>
									</select>
									<div class="input-group-btn">
										<button type="button" class="btn btn-primary form-control" style=""><i class="fas fa-question-circle"></i></button>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<label for="estilo_def">Estrategia de combate</label>
								<div class="input-group">
									<select name="estilo_def" id="estilo_def" class="form-control">
										<option value="0">Defensivo</option>
										<option value="0">Agresivo</option>
									</select>
									<div class="input-group-btn">
										<button type="button" class="btn btn-primary form-control" style=""><i class="fas fa-question-circle"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label>Heroe 1</label>
								<select name="" id="c1" class="form-control">
									<option value="0">Guerrero</option>
									<option value="1">SuperGuerrero</option>
									<option value="2">Tanque</option>
									<option value="3">SuperTanque</option>
								</select>
							</div>
							<div class="col-sm-3">
								<label>Heroe 2</label>
								<select name="" id="c2" class="form-control">
									<option value="0">Guerrero</option>
									<option value="1">SuperGuerrero</option>
									<option value="2">Tanque</option>
									<option value="3">SuperTanque</option>
								</select>
							</div>
							<div class="col-sm-3">
								<label>Heroe 3</label>
								<select name="" id="c3" class="form-control">
									<option value="0">Guerrero</option>
									<option value="1">SuperGuerrero</option>
									<option value="2">Tanque</option>
									<option value="3">SuperTanque</option>
								</select>
							</div>
							<div class="col-sm-3">
								<label>Heroe 4 <i class="fas fa-lock"></i></label>
								<select name="" id="c4" class="form-control" disabled="">
									<option value=""></option>
									<option value="0">Guerrero</option>
									<option value="1">SuperGuerrero</option>
									<option value="2">Tanque</option>
									<option value="3">SuperTanque</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<h5 style="text-align: center;">POCIONES</h5>
								<div class="row" style="height: 80%;">
									<div class="col-sm-4" style="height: 100%; background-color: red">
									</div>
									<div class="col-sm-8">
										<input type="text" class="form-control">
										<br>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h5 style="text-align: center;">EXPLOSIVOS</h5>
								<div class="row" style="height: 80%;">
									<div class="col-sm-8">
										<input type="text" class="form-control">
										<br>
										<input type="text" class="form-control">
									</div>
									<div class="col-sm-4" style="height: 100%; background-color: red">
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>	
	</div>
</div>
<script>
	//var base_url = '<?php echo base_url(); ?>';
</script>