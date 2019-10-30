<script src="<?php echo base_url();?>/Assets/js/jquery-3.4.1.js"></script>
<script src="<?php echo base_url();?>/Assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>/Assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/Assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/juego_script.js"></script>

<!-- 'Error' es viejo, sacarlo una vez reemplazadas las alertas de sesión -->
<?php if (isset($error)) { echo '<script> mostrarAlerta("'.$error.'"); cerrarSesion(); </script>'; } ?>
<?php if (isset($alerta)) { echo '<script> mostrarAlerta("'.$alerta.'", "'.$alerta_color.'"); </script>'; } ?>
<?php $this->session->unset_userdata('alerta'); $this->session->unset_userdata('alerta_color'); ?>
</body>
</html>