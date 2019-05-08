    <script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('librerias/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/adminlte/adminlte.min.js'); ?>"></script>
    <script src="<?php echo base_url('librerias/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('librerias/datatables_bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('librerias/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('librerias/fastclick/lib/fastclick.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo.js'); ?>"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablas').DataTable( {
          "language": {
            "url": baseJS+"/librerias/datatables/js/datatables.spanish.json"
          },
          "scrollX": true
        } );
      } );
    </script>
    <?php  foreach($jss as $js):?>
      <script type='text/javascript' src = '<?php echo  base_url($js);?>'></script>
    <?php endforeach;?>
  </body>
</html>

