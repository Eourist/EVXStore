<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/juego_syle.css"> -->
<style> body{ overflow: hidden; } </style>
<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%); image-rendering: pixelated;">
	<div class="titulo"> Tomb Quest </div>
	<div class="row" id="canvas-juego" style="padding: 30px;">
		<div class="col-sm-5">
			<div style="position: fixed; color: white; margin: 5px;">
				Puntaje: <span id="puntos">0</span><br>
				Zona: <span id="zonas">0</span><br>
				Pociones: <span id="pociones">0</span>
			</div>
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

			<div id="heroe1" class="animated" style="position:fixed; margin-top: 140px; margin-left: 175px; height: 50px; text-align: center; padding: 0px; width: 50px; background-size: 100%;">
				<div class="he_vida" style="color: white; margin-top: -25px;"></div>
			</div>
			<div id="heroe2" class="animated" style="position:fixed; margin-top: 190px; margin-left: 150px; height: 50px; text-align: center; padding: 0px; width: 50px; background-size: 100%;">
				<div class="he_vida" style="color: white; margin-top: 50px;"></div>
			</div>
			<div id="heroe3" class="animated" style="position:fixed; margin-top: 190px; margin-left: 200px; height: 50px; text-align: center; padding: 0px; width: 50px; background-size: 100%;">
				<div class="he_vida" style="color: white; margin-top: 50px;"></div>
			</div>
			<div class="pieza animated" id="tablero" style="background: gray; width: 400px; height: 400px;border: 2px solid #f71414; background-repeat: no-repeat; background-size: 100%;">
			</div>	

		</div>
		<div class="col-sm-7 align-self-center" id="container-form">
			<div class="panel-b-txt" style="margin-top: 15px !important;">
				<div class="formulario-configuracion">
					<h3 style="text-align: center; border-bottom: 3px solid #f71414">OPCIONES DE LA PARTIDA</h3>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="centrarse-select">Distribucion de ataques</label>
								<div class="input-group">
									<select name="centrarse-select" id="centrarse-select" class="form-control">
										<option value="1">Centrado</option>
										<option value="0">Disperso</option>
									</select>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary form-control" style=""><i class="fas fa-question-circle"></i></button>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<label for="defenderse-select">Estrategia de combate</label>
								<div class="input-group">
									<select name="defenderse-select" id="defenderse-select" class="form-control">
										<option value="1">Defensivo</option>
										<option value="0">Agresivo</option>
									</select>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary form-control" style=""><i class="fas fa-question-circle"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label for="heroe1-select">Heroe 1</label>
								<select name="heroe1-select" id="heroe1-select" class="form-control">
									<option value="tanque">Tanque</option>
									<!-- <option value="1">SuperGuerrero</option> -->
									<option value="guerrero">Guerrero</option>
									<!-- <option value="3">SuperTanque</option> -->
								</select>
							</div>
							<div class="col-sm-4">
								<label for="heroe2-select">Heroe 2</label>
								<select name="heroe2-select" id="heroe2-select" class="form-control">
									<option value="guerrero">Guerrero</option>
									<!-- <option value="1">SuperGuerrero</option> -->
									<option value="tanque">Tanque</option>
									<!-- <option value="3">SuperTanque</option> -->
								</select>
							</div>
							<div class="col-sm-4">
								<label for="heroe3-select">Heroe 3</label>
								<select name="heroe3-select" id="heroe3-select" class="form-control">
									<option value="guerrero">Guerrero</option>
									<!-- <option value="1">SuperGuerrero</option> -->
									<option value="tanque">Tanque</option>
									<!-- <option value="3">SuperTanque</option> -->
								</select>
							</div>
							<!-- <div class="col-sm-3">
								<label>Heroe 4 <i class="fas fa-lock"></i></label>
								<select name="" id="c4" class="form-control" disabled="">
									<option value=""></option>
									<option value="0">Guerrero</option>
									<option value="1">SuperGuerrero</option>
									<option value="2">Tanque</option>
									<option value="3">SuperTanque</option>
								</select>
							</div> -->
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-8">
								<label for="input-pociones">Pociónes</label>
								<div class="input-group">
									<input type="text" class="form-control" id="input-pociones" value="<?php echo (isset($pociones)) ? $pociones : 5; ?>" disabled>
									<div class="input-group-append">
										<button class="btn btn-primary" onclick="comprar_pocion()" type="button">Comprar poción (10 <i class="fas fa-coins"></i>)</button>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<label> </label>
								<div class="input-group">
									<button type="button" class="btn btn-primary" onclick="inicializar();" style="width: 100%">Comenzar partida</button>
								</div>
							</div>
							<!-- <div class="col-sm-6">
								<h5 style="text-align: center;">POCIONES</h5>
								<div class="row" style="height: 80%;">
									<div class="col-sm-4" style="height: 100%; background-color: red">
									</div>
									<div class="col-sm-8">
										<input id="input-pociones" type="text" class="form-control">
										<br>
										<input type="text" class="form-control" disabled>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h5 style="text-align: center;">EXPLOSIVOS</h5>
								<div class="row" style="height: 80%;">
									<div class="col-sm-8">
										<input type="text" class="form-control" disabled>
										<br>
										<button type="button" class="btn btn-primary" onclick="inicializar();">Confirmar</button>
									</div>
									<div class="col-sm-4" style="height: 100%; background-color: red">
									</div>
								</div>
							</div> -->
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