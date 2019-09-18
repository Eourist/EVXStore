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
            <ul class="navbar-nav mr-auto">
                <li class="nav-item usernav-btn">
                    <a href="#" class="nav-link" id="evx-user-btn"><i class="fas fa-user" style="font-size: 14px;"></i>  <?php echo $nombre ?></a>
                </li>
                <li class="nav-item usernav-btn">
                    <a class="nav-link" id="evx-logout-btn" data-toggle="modal" href='#evx-logout-modal'>
                        <i class="fas fa-sign-out-alt"></i>  Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand navbar-light bg-light" style="padding: 0px;"> <!-- navbar-expand-md -->
        <div class="container">
            <a class="navbar-brand evx-logo" href="#"><img src="<?php echo base_url();?>/Assets/img/evx-logo.png" alt="" class="img-responsive"> Evexnod</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav ml-auto evx-nav-menu">
                    <!-- <li class="nav-item" id="b1">
                        <div class="nav-btn-bg bh" id="b1h">
                            <a href="#" class="nav-link" style="color: white;"><i class="fas fa-home"></i>  Principal</a>
                        </div>
                        <div class="" id="b1d">
                            <a href="#" class="nav-link"><i class="fas fa-home"></i>  Principal</a>
                        </div>
                    </li> -->
                    <li class="nav-item" id="b2">
                        <div class="nav-btn-bg bh" id="b2h">
                            <a href="#" class="nav-link" style="color: white;"><i class="fas fa-tags" style="font-size: 15px;"></i>  <span class="d-none d-md-inline">Tienda</span></a>
                        </div>
                        <div class="" id="b2d">
                            <a href="#" class="nav-link"><i class="fas fa-tags" style="font-size: 15px;"></i>  <span class="d-none d-md-inline">Tienda</span></a>
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

<!-- 
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Expand at md</a>
      

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
    </nav> -->