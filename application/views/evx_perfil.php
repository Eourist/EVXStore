<!-- Foreach juego que tenga el usuario llamar un nuevo panel-b con estadisticas del juego  -->

<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%);">
	<div class="titulo">
		Perfil de <?php echo $nombre; ?>
		<i class="fas fa-cog" style="padding: 5px; padding-right: 10px;float: right;" id="btn-editar-perfil" data-premium="<?php echo $premium; ?>"></i>
	</div>

	<form action="<?php echo base_url(); ?>inicio/editar_usuario" method="post" id="form-editar-usuario" style="display: none">
		<div class="panel-b" style="height: auto;">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-b-txt" style="padding: 15px; padding-bottom: 20px;">
						<div class="from-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="">Nombre</label>
									<input type="text" class="form-control" name="f_nuevo_nombre" value="<?php echo $nombre; ?>" required>
								</div>
								<div class="col-sm-6">
									<label for="">Correo</label>
									<input type="email" class="form-control" name="f_nuevo_correo" value="<?php echo $correo; ?>" required>
								</div>
								<div class="col-sm-2">
									<label for="" style="width: 100%"> </label>
									<button type="submit" class="btn btn-primary btn-form form-control" id="btn-editar-usuario" style="width: 100%">Editar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div class="panel-b" style="height: auto; display: none;" id="error-editar-usuario">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel-b-txt" style="text-align: center; margin: 0px; padding: 6px">
					Para cambiar los datos tu perfil es necesario ser miembro del Evexnod Club, <a href="#evx-premium-modal" data-toggle="modal">únete ahora</a>.
				</div>
			</div>
		</div>
	</div>
	<?php $i = 0; foreach($juegos as $juego) { ?>

	<!-- <div class="panel-b">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel-b-img noticia-img">

				</div>
			</div>
			<div class="col-sm-7 align-self-center">
				<div class="panel-b-txt" style="text-align: left;">
					<table style="width:100%">
						<thead>
							<tr>
								<th style="font-size: 20px;"><?php echo $juego->nombre ?></th>
								<th style="font-size: 20px;">Estadisticas</th>
							</tr>
						</thead>
							<th>Fecha de compra</th>
							<td>19/08/2019</td>
						</tr>
						<tr>
							<th>Puntaje máximo</th>
							<td><?php echo $juego->puntaje_maximo ?></td>
						</tr>
						<tr>
					</table>
				</div>
			</div>
		</div>
	</div> -->
	<div class="panel-juego">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel-juego-img">
					
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel-juego-content">
					<div class="panel-juego-nombre">
						<div class="row">
							<div class="col-sm-12 align-self-center">
								<?php echo $juego->nombre ?>
							</div>
						</div>
					</div>
					<div class="panel-juego-datos">
						<div class="row">
							<div class="col-sm-5 col-xs-6 align-self-center">
								Fecha<span> de compra</span>: <?php echo $juego->fecha_compra; ?>
							</div>
							<div class="col-sm-5 col-xs-6 align-self-center">
								Puntaje máximo: <?php echo $juego->puntaje_maximo; ?>
							</div>
							<div class="col-sm-2 align-self-center">
								<button type="submit" class="btn btn-primary btn-form" style="width: 100%"><span>Descargar</span><i class="fas fa-download"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $i++; } if ($i == 0) { ?>
	<div class="panel-b" style="height: auto;">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel-b-txt" style="text-align: center; margin: 0px; padding: 6px">
					¡Parece que aún no compraste ningún juego! <br>
					Explora la <a href="<?php echo base_url(); ?>inicio/tienda">Evexnod Store</a> para comprar los mejores juegos al mejor precio.
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>