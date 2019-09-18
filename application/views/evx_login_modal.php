<div class="modal fade evx-modal" id="evx-login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Inicia sesión en Evexnod</h5>
        <button type="button" class="btn text-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'inicio/sesion'; ?>" method="POST" name="f_registro">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="f_nombre">Nombre de usuario</label>
                <input type="text" class="form-control" name="f_nombre" autocomplete="off" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="f_clave">Contraseña</label>
                <input type="password" class="form-control" name="f_clave" autocomplete="off" required>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6">
          <button type="submit" class="btn evx-modal-btn">Ingresar</button>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn evx-modal-btn" data-dismiss="modal">Cancelar</button>
        </div>
        </form>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>