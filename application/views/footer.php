<script src="<?php echo base_url();?>/Assets/js/jquery-3.4.1.js"></script>
<script src="<?php echo base_url();?>/Assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>/Assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/Assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/juego_script.js"></script>

<?php if (isset($error)) { echo '<script> mostrarAlerta("'.$error.'"); cerrarSesion(); </script>'; } ?>
</body>
</html>