<div class="container evx-main-container" style="
background: radial-gradient(circle, rgba(40,40,40,0.8) 0%, rgba(28,28,28,0.8) 100%)">
	<div class="titulo">
		<i class="fas fa-tags" style="font-size: 28px;"></i> Catálogo de juegos
	</div>
	
	<!-- PANELES DE JUEGOS -->
	<div class="row" style="margin-top: 30px;">
		<?php $i = 0; foreach ($juegos as $juego) { $i++; ?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
				<div class="evx-panel-juego">
					<div class="row" style="height: 10%;">
						<div class="col-sm-12">
							<h4><?php echo $juego->nombre; ?></h4>
						</div>
					</div>
					<div class="row" style="height: 80%;">
						<div class="col-sm-12">
							<h4><?php echo ($juego->precio); ?> <i class="fas fa-coins" style="font-size: 18px;"></i></h4>
						</div>
					</div>
					<div class="row" style="height: 10%;">
						<div class="col-sm-12">
							<button class="btn btn-comprar" data-juego-id="<?php echo $juego->id; ?>" style="width: 100%;">COMPRAR</button>
						</div>
					</div>
				</div>
			</div>
		<?php if ($i == 3) { echo '</div>'; echo '<div class="row" style="margin-top: 30px;">'; $i = 0; } } ?>
	</div>
</div>

<div class="modal fade evx-modal" id="evx-comprar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width: 100%; text-align: center;">Confirmar compra</h5>
        <button type="button" class="btn text-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-sm-12" style="text-align: center;">
              <p>¿Estas seguro de que quieres comprar <span id="modal-juego-nombre"></span>?</p>
              <p>Los miembros del EvexnodClub obtienen un 20% de descuento</p>
              <p>Precio (<?php echo (isset($id) && $premium == 1) ? '-20%' : 'normal'; ?>): <span id="modal-juego-precio"></span></p>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6">
          <input type="hidden" id="juego-id">
          <input type="hidden" id="juego-precio">
          <button type="button" class="btn evx-modal-btn" id="btn-confirmar-compra-juego"></button>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn evx-modal-btn" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>