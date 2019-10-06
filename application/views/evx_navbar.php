<!-- NAVBAR PRINCIPAL -->
<div style="position: fixed; z-index: 10; width: 100%;">
    <!-- NAVBAR INICIO DE SESION -->
    <nav class="navbar navbar-expand navbar-dark bg-evx-2 evx-usernav" style="height: 25px;
    <?php echo (isset($id)) ? 'display: none;' : ''; ?>">
        <div class="container">
            <ul class="navbar-nav mr-auto" style="margin-left: -8px">
                <li class="nav-item usernav-btn">
                    <a class="nav-link" id="evx-login-btn" data-toggle="modal" href='#evx-login-modal'>
                        <i class="fas fa-user" style="font-size: 14px;"></i>  Ingresar
                    </a>
                </li>
                <li class="nav-item usernav-btn">
                    <a class="nav-link" id="evx-signup-btn" data-toggle="modal" href='#evx-signup-modal'>
                        <i class="fas fa-user-plus"></i> Registrarse
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- NAVBAR USUARIO (SESION INICIADA) -->
    <nav class="navbar navbar-expand navbar-dark bg-evx-2 evx-usernav" style="height: 25px;
    <?php echo (isset($id)) ? '' : 'display: none;'; ?>">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item usernav-btn">
                    <a href="<?php echo base_url(); ?>inicio/perfil_usuario" class="nav-link" id="evx-user-btn"><i class="fas fa-user" style="font-size: 14px;"></i>  <?php echo $nombre ?></a>
                </li>
                <li class="nav-item usernav-btn">
                    <a class="nav-link" id="evx-logout-btn" data-toggle="modal" href='#evx-logout-modal'>
                        <i class="fas fa-sign-out-alt"></i>  Cerrar sesión
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav" style="float: left">
                <li class="nav-item usernav-btn">
                    <a href="#" class="nav-link" id="evx-user-btn"> <?php echo $creditos ?> <i class="fas fa-gem" style="font-size: 14px;"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand navbar-light bg-light" style="padding: 0px;"> <!-- navbar-expand-md -->
        <div class="container">
            <a class="navbar-brand evx-logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>/Assets/img/evx_logo_np.png" alt="" class="img-responsive"> Evexnod</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav ml-auto evx-nav-menu">
                    <li class="nav-item" id="b1">
                        <div class="nav-btn-bg bh" id="b1h">
                            <a href="<?php echo base_url(); ?>inicio/tienda" class="nav-link" style="color: white;"><i class="fas fa-tags" style="font-size: 15px;"></i>  <span class="d-none d-md-inline">Tienda</span></a>
                        </div>
                        <div class="" id="b1d">
                            <a href="<?php echo base_url(); ?>inicio/tienda" class="nav-link"><i class="fas fa-tags" style="font-size: 15px;"></i>  <span class="d-none d-md-inline">Tienda</span></a>
                        </div>
                    </li>
                    <li class="nav-item" id="b2">
                        <div class="nav-btn-bg bh" id="b2h">
                            <a href="<?php echo base_url(); ?>inicio/juegos" class="nav-link" style="color: white;"><i class="fas fa-gamepad" style="font-size: 19px;"></i>  <span class="d-none d-md-inline">Juegos</span></a>
                        </div>
                        <div class="" id="b2d">
                            <a href="<?php echo base_url(); ?>inicio/juegos" class="nav-link"><i class="fas fa-gamepad" style="font-size: 19px;"></i>  <span class="d-none d-md-inline">Juegos</span></a>
                        </div>
                    </li>
                    <li class="nav-item" id="b3">
                        <div class="nav-btn-bg bh" id="b3h">
                            <a href="#" class="nav-link" style="color: white;"><i class="fas fa-users"></i>  <span class="d-none d-md-inline">Comunidad</span></a>
                        </div>
                        <div class="" id="b3d">
                            <a href="#" class="nav-link"><i class="fas fa-users"></i>  <span class="d-none d-md-inline">Comunidad</span></a>
                        </div>
                    </li>
                    <li class="nav-item" id="b4">
                        <div class="nav-btn-bg bh" id="b4h">
                            <a href="#" class="nav-link" style="color: white;"><i class="fas fa-newspaper"></i>  <span class="d-none d-md-inline">Noticias</span></a>
                        </div>
                        <div class="" id="b4d">
                            <a href="#" class="nav-link"><i class="fas fa-newspaper"></i>  <span class="d-none d-md-inline">Noticias</span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- MODAL DE LOGIN -->
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

<!-- MODAL DE LOGOUT -->
<div class="modal fade evx-modal" id="evx-logout-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="col-sm-12 modal-title text-center">Cerrar sesión</h5>
      </div>
        <div class="modal-body text-center">
          <h6>¿Estas seguro de que quieres salir?</h6>
        </div>
        <div class="modal-footer">
          <div class="col-sm-6">
            <button class="btn evx-modal-btn">
              <a href="<?php echo base_url(); ?>inicio/cerrar_sesion" class="no-link">
                Si
              </a>
            </button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn evx-modal-btn" data-dismiss="modal">No</button>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- MODAL DE SIGNUP -->
<div class="modal fade evx-modal" id="evx-signup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Unete a Evexnod</h5>
        <button type="button" class="btn text-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <form action="<?php echo base_url().'inicio/sesion'; ?>" method="POST" name="f_registro">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="f_nombre">Nombre de usuario</label>
                <input type="text" class="form-control" name="f_nombre" autocomplete="off" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="f_clave">Contraseña</label>
                <input type="password" class="form-control" name="f_clave" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="f_correo">Correo electrónico</label>
                <input type="text" class="form-control" name="f_correo" autocomplete="off" required>
              </div>
            </div>
          </div>

          <!-- <div class="form-group">
            <div class="col-sm-6">
              <label for="f_nombre">Nombre de usuario</label>
              <input type="text" class="form-control" name="f_nombre" id="f_nombre">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="f_nombre">Contraseña</label>
              <input type="text" class="form-control" name="f_nombre" id="f_nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="f_correo">Correo electrónico</label>
            <input type="text" class="form-control" name="f_correo" id="f_correo">
          </div> -->
        </div>
        <div class="modal-footer">
          <div class="col-sm-6">
            <button type="submit" class="btn evx-modal-btn">Ingresar</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn evx-modal-btn" data-dismiss="modal">Cancelar</button>
          </div>
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </form>
    </div>
  </div>
</div>
