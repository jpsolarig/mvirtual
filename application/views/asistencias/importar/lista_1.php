<section class="content-header nav-listas ">
  <?php $this->load->view('asistencias/nav_lista');?>
</section>





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>asistencias/importar/cargar_datos",
   method:"POST",
   success:function(data)
   {
    $('#imported_csv_data').html(data);
   }
  })
 }

 $('#import_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>csv_import/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   beforeSend:function(){
    $('#import_csv_btn').html('Importing...');
   },
   success:function(data)
   {
    $('#import_csv')[0].reset();
    $('#import_csv_btn').attr('disabled', false);
    $('#import_csv_btn').html('OK');
    $('#import_csv_btn').removeClass("btn-primary").addClass("btn-success");

    load_data();
   }
  })
 });
 
});
</script>