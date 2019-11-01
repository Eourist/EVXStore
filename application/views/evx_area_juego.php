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
				<div class="panel-b-txt" style="text-align: left; text-align: justify;">
					El área de juego de Evexnod es el mejor lugar para disfrutar de juegos totalmente gratuitos desde el navegador. <br>
					Los juegos estan disponibles sin costo alguno para todos los miembros de la comunidad que hayan iniciado sesión.
					<?php echo $puntajes[0]->nombre_usuario ?>
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
						<h4>TOMB QUEST</h4>
					</div>
				</div>

				<div class="row" style="height: 80%; padding-bottom: 15px;">
					<div class="col-sm-12" id="collapse-sb-1" style="height: 100%; background: rgba(10, 10, 10, 0.7); padding-bottom: 50px; display: none;">
						<h3 style="margin-top: 15px; color: white; font-size: 20px;">TOP 5 MEJORES JUGADORES</h3>
						<table style="width: 100%; margin-top:20px; font-size: 17px; color: white" class="tabla-puntajes">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Jugador</th>
									<th>Puntaje</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i = 0; $i < 5; $i++) { ?>
									<tr>
										<td><?php echo $puntajes[$i]->fecha ?></td>
										<td><?php echo $puntajes[$i]->nombre_usuario ?></td>
										<td><?php echo $puntajes[$i]->puntaje ?></td>
									</tr>
								<?php } ?>
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
						<h4>NEVERENDING CRUSADE</h4>
					</div>
				</div>

				<div class="row" style="height: 80%; padding-bottom: 15px;">
					<div class="col-sm-12 align-self-center text-center " id="collapse-sb-2" style="height: 100%; background: rgba(10, 10, 10, 0.7); padding-bottom: 10px; display: none; color: white; font-size: 18px; padding-top: 90px;">
						<h4>¡Error!</h4>
						<p>Este juego no está disponible en estos momentos. Intenta más tarde.</p>
					</div>
				</div>

				<div class="row" style="height: 10%; <?php echo (isset($id)) ? '' : 'display: none'; ?>">
					<div class="col-sm-10" style="padding-right: 5px;">
						<button class="btn btn-comprar" style="width: 100%" disabled>JUGAR</button>
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
						<h4>MON FIGHT</h4>
					</div>
				</div>

				<div class="row" style="height: 80%; padding-bottom: 15px;">
					<div class="col-sm-12 align-self-center text-center " id="collapse-sb-3" style="height: 100%; background: rgba(10, 10, 10, 0.7); padding-bottom: 10px; display: none; color: white; font-size: 18px; padding-top: 90px;">
						<h4>¡Error!</h4>
						<p>Este juego no está disponible en estos momentos. Intenta más tarde.</p>
					</div>
				</div>

				<div class="row" style="height: 10%; <?php echo (isset($id)) ? '' : 'display: none'; ?>">
					<div class="col-sm-10" style="padding-right: 5px;">
						<button class="btn btn-comprar" style="width: 100%" disabled>JUGAR</button>
					</div>
					<div class="col-sm-2" style="padding-left: 0px; text-align: center;">
						<button class="btn btn-comprar btn-sb" style="width: 100%;" id="sb-3"><i class="fas fa-info-circle"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>