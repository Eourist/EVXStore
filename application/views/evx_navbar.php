<!-- NAVBAR PRINCIPAL -->
<div style="position: fixed; z-index: 10; width: 100%;">
  <!-- ALERTA -->
  <div id="error-alerta" style="display: none">
    <div class="d-flex justify-content-center">
      <div class="alert text-center evx-alerta" role="alert" style="user-select: none">
        <!-- TEXTO DE ALERTA -->
      </div>
    </div>
  </div>
  <!-- NAVBAR INICIO DE SESION -->
  <nav class="navbar navbar-expand navbar-dark bg-evx-2 evx-usernav" style="height: 25px;<?php echo (isset($id)) ? 'display: none;' : ''; ?>">
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
  <nav class="navbar navbar-expand navbar-dark bg-evx-2 evx-usernav" style="height: 25px; <?php echo (isset($id)) ? '' : 'display: none;'; ?>">
    <div class="container">
      <ul class="navbar-nav">
        <li class="nav-item usernav-btn">
          <a href="<?php echo base_url(); ?>inicio/perfil_usuario" class="nav-link" id="evx-user-btn">
            <?php if ($premium == 1) { ?>
            <i class="fas fa-user-astronaut" style="font-size: 14px;"></i>  <?php echo $nombre ?>
            <?php } else { ?>
            <i class="fas fa-user" style="font-size: 14px;"></i>  <?php echo $nombre ?>
            <?php } ?>
          </a>
       </li>
       <li class="nav-item usernav-btn">
        <a class="nav-link" id="evx-logout-btn" data-toggle="modal" href='#evx-logout-modal'>
          <i class="fas fa-sign-out-alt"></i>  Cerrar sesión
        </a>
      </li>
    </ul>
    <ul class="navbar-nav" style="float: left">
      <?php if ($premium == 0) { ?>
      <li class="nav-item usernav-btn">
        <a href="#evx-premium-modal" data-toggle="modal" class="nav-link" id="evx-user-btn">
          <span > Evexnod Club </span>
        </a>
      </li>
      <?php } ?>
      <li class="nav-item usernav-btn">
        <a href="#evx-coins-modal" data-toggle="modal" class="nav-link" id="evx-user-btn"><span id="mostrar-creditos"> <?php echo $creditos ?> </span><i class="fas fa-coins" style="font-size: 15px;"></i></a>
      </li>
    </ul>
    </div>
  </nav>
  <!-- NAVBAR INFERIOR PRINCIPAL -->
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
          <li class="nav-item" id="b4">
            <div class="nav-btn-bg bh" id="b4h">
              <a href="<?php echo base_url(); ?>inicio/noticias" class="nav-link" style="color: white;"><i class="fas fa-newspaper"></i>  <span class="d-none d-md-inline">Noticias</span></a>
            </div>
            <div class="" id="b4d">
              <a href="<?php echo base_url(); ?>inicio/noticias" class="nav-link"><i class="fas fa-newspaper"></i>  <span class="d-none d-md-inline">Noticias</span></a>
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
          <input type="hidden" name="f_url" value="<?php echo $this->uri->segment(2) ?>">
          <button type="submit" class="btn evx-modal-btn">Ingresar</button>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn evx-modal-btn" data-dismiss="modal">Cancelar</button>
        </div>
        </form>
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
          <form action="<?php echo base_url().'inicio/cerrar_sesion'; ?>" method="POST" name="f_registro">
          <h6>¿Estas seguro de que quieres salir?</h6>
        </div>
        <div class="modal-footer">
            <div class="col-sm-6">
              <input type="hidden" name="f_url" value="<?php echo $this->uri->segment(2) ?>">
              <button type="submit" class="btn evx-modal-btn">Si</button>
            </div>
          <div class="col-sm-6">
            <button type="button" class="btn evx-modal-btn" data-dismiss="modal">No</button>
          </div>
          </form>
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
                <input type="email" class="form-control" name="f_correo" autocomplete="off" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-sm-6">
            <input type="hidden" name="f_url" value="<?php echo $this->uri->segment(2) ?>">
            <button type="submit" class="btn evx-modal-btn">Ingresar</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn evx-modal-btn" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL DE MONEDAS -->
<div class="modal fade evx-modal" id="evx-coins-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Comprar EvexGold</h5>
        <button type="button" class="btn text-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p id="monedas-info" class="animated">Selecciona la cantidad de monedas que quieras comprar</p>
        <div id="formulario-cantidad">
          <div class="row-monedas row animated faster" id="mon1-row">
            <div class="col-sm-2 fondo-radio">
              <input type="radio" class="radio-cantidad" name="f_cantidad" value="100" class="form-control" id="" >
            </div>
            <div class="col-sm-8 fondo-descripcion">
              100 Monedas
            </div>
            <div class="col-sm-2 fondo-precio">
              $14,99
            </div>
          </div>
          <div class="row-monedas row animated faster">
            <div class="col-sm-2 fondo-radio">
              <input type="radio" class="radio-cantidad" name="f_cantidad" value="500" class="form-control">
            </div>
            <div class="col-sm-8 fondo-descripcion">
              500 Monedas
            </div>
            <div class="col-sm-2 fondo-precio">
              $59,99
            </div>
          </div>
          <div class="row-monedas row animated faster">
            <div class="col-sm-2 fondo-radio">
              <input type="radio" class="radio-cantidad" name="f_cantidad" value="900" class="form-control">
            </div>
            <div class="col-sm-8 fondo-descripcion">
              900 Monedas
            </div>
            <div class="col-sm-2 fondo-precio">
              $89,99
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6">
          <input type="hidden" name="f_url" value="<?php echo $this->uri->segment(2) ?>">
          <button type="button" class="btn evx-modal-btn" id="btn-comprar-monedas">Confirmar</button>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn evx-modal-btn" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE PREMIUM -->
<div class="modal fade evx-modal" id="evx-premium-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Unete a Evexnod Club</h5>
        <button type="button" class="btn text-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p> ¡Únete a Evexnod Club para disfrutar de los mejores beneficios premium!</p>
      </div>
      <div class="modal-footer">
        <div class="col-sm-6">
          <form action="<?php echo base_url(); ?>inicio/mejora_premium" method="POST" name="f_mejora_premium">
            <input type="hidden" name="f_url" value="<?php echo $this->uri->segment(2) ?>">
            <button type="submit" class="btn evx-modal-btn" id="btn-mejora-premium">¡Unirme ahora! (1200 <i class="fas fa-coins"></i>)</button>
          </form>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn evx-modal-btn" data-dismiss="modal">No, gracias</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script> 
  let base_url = '<?php echo base_url(); ?>'; 
</script>
