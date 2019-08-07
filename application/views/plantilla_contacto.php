
<div class="container">
	<div class="row rowG">
		<div class="col-sm-1"></div>
		<div class="col-sm-2 centerA">
			<img src="<?php echo base_url(); ?>/upload/imagen_<?php echo $id.'.png' ?>" class="rounded" style="width: 60px; height: 60px" alt="#">
		</div>
		<div class="col-sm-3 centerA">
			<div class="div text-center campos">
				<?php echo $nombre ?>
			</div>
			<div class="div text-center campos">
				<?php echo $apellido ?>
			</div>
			<div class="div text-center campos">
				<?php echo $telefono ?>
			</div>
		</div>

		<div class="col-sm-5 text-center centerA">
			<button class="btn btn-sm btnA btn-outline-danger" data-toggle="collapse" data-target="#ver<?php echo $id?>">Ver mas</button>
			<button class="btn btn-sm btnA btn-outline-danger" data-toggle="collapse" data-target="#editar<?php echo $id?>">Editar</button>
			<a href="<?php echo base_URL().'inicio/borrar_contacto/'.$id ?>" class="btn btn-sm btnA btn-outline-danger">Eliminar</a>

			<a href="<?php echo base_URL().'inicio/mostrar_reclamos/'.$id ?>" class="btn btn-sm btnA btn-outline-danger">Ver reclamos</a>
			<button class="btn btn-sm btnA btn-outline-danger" data-toggle="collapse" data-target="#crear_reclamo<?php echo $id?>">Crear reclamo</button>
		</div>
		<div class="col-sm-1"></div>
	</div>

	<div class="collapse" id="crear_reclamo<?php echo $id?>">
		<div class="row" style="margin-top: 0px; background-color: rgba(0,0,0,0.1);margin:0px;">

			<form method="post" action=" <?php echo base_url().'inicio/crear_reclamo/'.$id ?>" name="f_reclamo" enctype="multipart/form-data">
		        <div class="form-row"style="padding:20px">
		            <div class="form-group col-md-4">
		            	<label for="inputTitle">Asunto</label>
		            	<input type="text" class="form-control" id="inputTitle" placeholder="" name="f_asunto">
		          	</div>
		         	<div class="form-group col-md-8">
		          	    <label for="inputDesc">Descripcion</label>
		          	    <input type="text" class="form-control" id="inputDesc" placeholder="" name="f_descripcion">
		        	</div>
		        	<select class="custom-select" name="f_tipo">
		        	    <option selected>Seleccionar tipo</option>
		        	    <option value="1">Garantía</option>
		        	    <option value="2">Reembolso</option>
		        	    <option value="3">Queja</option>
		        	    <option value="4">Otro</option>
		        	</select>
		        </div>
		        <div style="padding-right: 20px">
		        	<button type="submit" class="btn btnA btn-outline-success"style="float:right">Confirmar cambios</button>
		        </div>
	        </form>

		</div>
	</div>

	<div class="collapse" id="ver<?php echo $id?>">
		<div class="row rowG" style="margin-top: 0px">
			<div class="col-sm-1"></div>
			<div class="col-sm-3 centerA"></div>
			<div class="col-sm-4 centerA">
				<div class="div text-center campos">
					<?php echo "Edad: ".$edad ?>
				</div>
				<div class="div text-center campos">
					<?php echo $correo ?>
				</div>
			</div>
			<div class="col-sm-3 text-center centerA"></div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<div class="collapse" id="editar<?php echo $id?>">
		<div class="row" style="margin-top: 0px;background-color: rgba(0,0,0,0.1);margin:0px;">
		    <form method="post" action="<?php echo base_url().'inicio/confirmar_edicion/'.$id ?>" name="f_creacion" enctype="multipart/form-data">
		        <div class="form-row"style="padding:20px">
		            <div class="form-group col-md-2">
		            	<label for="inputName">Editar nombre</label>
		            	<input type="text" class="form-control" id="inputName" placeholder="<?php echo $nombre ?>" name="f_nombre">
		          	</div>
		         	<div class="form-group col-md-2">
		          	    <label for="inputLastName">Editar apellido</label>
		          	    <input type="text" class="form-control" id="inputLastName" placeholder="<?php echo $apellido ?>" name="f_apellido">
		        	</div>
		         	<div class="form-group col-md-2">
		        	    <label for="inputAge">Editar edad</label>
		        	    <input type="text" class="form-control" id="inputAge" placeholder="<?php echo $edad ?>" name="f_edad">
		        	</div>
		       	    <div class="form-group col-md-3">
		       	        <label for="inputTel">Editar teléfono</label>
		      	        <input type="text" class="form-control" id="inputTel" placeholder="<?php echo $telefono ?>" name="f_telefono">
		        	</div>
		            <div class="form-group col-md-3">
		         	    <label for="inputEmail">Editar correo electrónico</label>
		                <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $correo ?>" name="f_correo">
		            </div>
		        </div>
		        
		        <div style="padding-right: 20px">
		        	<input type="file" name="f_img" id="f_img">
		        	<button type="submit" class="btn btnA btn-outline-success"style="float:right">Confirmar cambios</button>
		       	    <!--<button type="button" class="btn btnA btn-outline-success"style="float:right">Agregar Foto</button>-->
		        </div>
	        </form>
	   </div>
	</div>
</div>


