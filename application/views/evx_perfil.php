<!-- Foreach juego que tenga el usuario llamar un nuevo panel-b con estadisticas del juego  -->

<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%); height: 900px;">
	<div class="titulo">
		Perfil de <?php echo $nombre; ?>
		<i class="fas fa-cog" style="padding: 8px;float: right;<?php if ($premium == 0) { echo 'display: none;'; } ?>"></i>
	</div>
	
	<?php if ($premium == 0) { ?>
	<div class="panel-b" style="height: auto;">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel-b-txt" style="text-align: center; margin: 0px; padding: 6px">
					¡Parece que no aún no te uniste al Evexnod Club! <br>
					Para personalizar tu perfil es necesario ser miembro del Evexnod Club. <a href="#evx-signup-modal" data-toggle="modal">Únete ahora</a>.
				</div>
			</div>
		</div>
	</div>
	<?php } else { $i = 0; foreach($juegos as $juego) { ?>
	<div class="panel-b">
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
								<th><?php echo $juego->nombre ?></th>
								<th>Estadisticas</th>
							</tr>
						</thead>
						<tr>
							<th>Puntaje máximo</th>
							<td><?php echo $juego->puntaje_maximo ?></td>
						</tr>
						<tr>
							<th>Fecha de compra</th>
							<td>19/08/2019</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; } } ?>
	<?php if ($i == 0) { ?>
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