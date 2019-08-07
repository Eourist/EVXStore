<style>
	.pendiente{
		background-color: yellow;
	}

	.resuelto{
		background-color: green;
	}

</style>


<div class="container">
	<div class="row rowG <?php echo $estado_reclamo ?>">
		<div class="col-sm-12 centerA">
			<div class="div text-center" style="margin-top: 15px;">
				<p><?php echo $descripcion_reclamo ?></p>
				<p><?php echo $estado_reclamo ?></p>
				<a class="btn btn-sm btnA btn-outline-danger" href="<?php echo base_URL().'inicio/estado_reclamo/'.$id_reclamo ."/".'resuelto'?>">Resuelto</a>

			</div>
			<form action="<?php echo base_URL().'inicio/estado_reclamo/'.$id_reclamo?>" method="POST">
			 	<select class="custom-select" name="estado_reclamo">
	        	    <option value="pendiente">Pendiente</option>
	        	    <option value="resuelto">Resuelto</option>

		     	</select>
		     	<button type="submit" class="btn btn-danger">sadaw</button>
		    </form>
		    
		</div>
	</div>
</div>