<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%)">
	<div class="titulo">
		<i class="fas fa-gamepad" style="font-size: 30px;"></i> Área de juego
	</div>
	<div class="panel-b">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel-b-img">

				</div>
			</div>
			<div class="col-sm-7 align-self-center">
				<div class="panel-b-txt" style="text-align: left;">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias commodi, deleniti, temporibus totam laudantium et facilis atque voluptas reiciendis nesciunt modi odit!
				</div>
			</div>
		</div>
	</div>
	<?php if (!isset($id)) { ?>
		<div class="panel-b" style="height: auto;">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-b-txt" style="text-align: center; margin: 0px; padding: 6px">
						¡Parece que no iniciaste sesión! <br>
						Para jugar es necesario ingresar con una cuenta de Evexnod. <a href="#evx-login-modal" data-toggle="modal">Inicia sesion</a> o <a href="#evx-signup-modal" data-toggle="modal">registrate</a> ahora.
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<div class="row" style="margin-top: 30px;">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
			<div class="evx-panel-juego">
				<div class="row" style="height: 10%;">
					<div class="col-sm-12">
						<h4>NOMBRE DEL JUEGO</h4>
					</div>
				</div>

				<div class="row" style="height: 80%; padding-bottom: 15px;">
					<div class="col-sm-12" id="collapse-sb-1" style="height: 100%; background: rgba(10, 10, 10, 0.7); padding-bottom: 10px; display: none;">
						<table style="width: 100%; margin-top:15px; font-size: 14px; color: white">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Jugador</th>
									<th>Puntaje</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
								<tr>
									<td>23/4/2013</td>
									<td>Eourist</td>
									<td>9999</td>
									
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="row" style="height: 10%; <?php echo (isset($id)) ? '' : 'display: none'; ?>">
					<div class="col-sm-10" style="padding-right: 5px;">
						<a class="btn btn-comprar" style="width: 100%" href="<?php echo base_url() ?>inicio/juego">JUGAR</a>
					</div>
					<div class="col-sm-2" style="padding-left: 0px; text-align: center;">
						<button class="btn btn-comprar btn-sb" style="width: 100%;" id="sb-1"><i class="fas fa-info-circle"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
			<div class="evx-panel-juego">
				<div class="row" style="height: 10%;">
					<div class="col-sm-12">
						<h4>NOMBRE DEL JUEGO</h4>
					</div>
				</div>

				<div class="row" style="height: 80%; padding-bottom: 15px;">
					<div class="col-sm-12" id="collapse-sb-2" style="height: 100%; background: rgba(10, 10, 10, 0.7); padding-bottom: 10px; display: none">
						
					</div>
				</div>

				<div class="row" style="height: 10%; <?php echo (isset($id)) ? '' : 'display: none'; ?>">
					<div class="col-sm-10" style="padding-right: 5px;">
						<a class="btn btn-comprar" style="width: 100%" href="<?php echo base_url() ?>inicio/juego">JUGAR</a>
					</div>
					<div class="col-sm-2" style="padding-left: 0px; text-align: center;">
						<button class="btn btn-comprar btn-sb" style="width: 100%;" id="sb-2"><i class="fas fa-info-circle"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
			<div class="evx-panel-juego">
				<div class="row" style="height: 10%;">
					<div class="col-sm-12">
						<h4>NOMBRE DEL JUEGO</h4>
					</div>
				</div>

				<div class="row" style="height: 80%; padding-bottom: 15px;">
					<div class="col-sm-12" id="collapse-sb-3" style="height: 100%; background: rgba(10, 10, 10, 0.7); padding-bottom: 10px; display: none">
						
					</div>
				</div>

				<div class="row" style="height: 10%; <?php echo (isset($id)) ? '' : 'display: none'; ?>">
					<div class="col-sm-10" style="padding-right: 5px;">
						<a class="btn btn-comprar" style="width: 100%" href="<?php echo base_url() ?>inicio/juego">JUGAR</a>
					</div>
					<div class="col-sm-2" style="padding-left: 0px; text-align: center;">
						<button class="btn btn-comprar btn-sb" style="width: 100%;" id="sb-3"><i class="fas fa-info-circle"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>