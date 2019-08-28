<style>
  .btnA{
    border-radius: 2px;
    margin: 3px;
  }

  .formulario{
    border-radius: 2px;
  }

  .rowG
  {
    background-color: rgba(0,0,0,0.1);
    height: 70px; 
    width: 100%; 
    margin-top: 10px;
    margin-left: 0px;
    margin-right: 0px;
  }

  .centerA
  {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .campos
  {
    height: 50px; 
    width: 130px;
    margin:10px;
    padding: 15px;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-sm-12"style="padding: 0px;">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
        <a class="navbar-brand" href="<?php echo base_url().'inicio' ?>">Agenda</a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="btn btnA btn-danger" data-toggle="collapse" data-target="#form">Agregar cliente</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'inicio/mostrar_todos_reclamos' ?>"  class="btn btnA btn-danger">Ver reclamos</a>
          </li>
       </ul>
       <ul class="navbar-nav ml-auto">
        <form class="form-inline" action="<?php echo base_url().'inicio/buscar_en_modelo'?>" method="POST">
          <input class="formulario form-control " type="text" placeholder="Buscar contacto..." name="f_busqueda">
          <button class="btn btnA btn-danger" type="submit">Buscar</button>
        </form>
        </ul>
      </nav>
    </div>
  </div>

  <div class="row collapse" id="form" style="background-color: rgba(0,0,0,0.1);margin:0px;padding-bottom: 5px">
    <form method="post" action="<?php echo base_url().'inicio/registrar_contacto' ?>" name="f_creacion">
        <div class="form-row"style="padding:20px">
          <div class="form-group col-md-2">
            <label for="inputName">Nombre</label>
            <input type="text" class="form-control" id="inputName" placeholder="" name="f_nombre" required>
          </div>
          <div class="form-group col-md-2">
            <label for="inputLastName">Apellido</label>
            <input type="text" class="form-control" id="inputLastName" placeholder="" name="f_apellido" required>
          </div>
          <div class="form-group col-md-2">
            <label for="inputAge">Edad</label>
            <input type="text" class="form-control" id="inputAge" placeholder="" name="f_edad" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputTel">Teléfono</label>
            <input type="text" class="form-control" id="inputTel" placeholder="" name="f_telefono" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail">Correo Electrónico</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="" name="f_correo" required>
          </div>
        </div>
        <div style="padding-right: 20px">
          <button type="submit" class="btn btnA btn-outline-success"style="float:right">Crear contacto</button>
          <button type="button" class="btn btnA btn-outline-success"style="float:right">Agregar Foto</button>
        </div>
     </form>
    </div>
</div>
