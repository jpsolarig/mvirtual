<?php $this->load->view('comun/head'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  
  <?php $this->load->view('comun/header'); ?>
  
  <?php $this->load->view('comun/siderbar'); ?>
  
  <div class="content-wrapper">
  	<?php $this->load->view($lista); ?>	
  </div>

  <?php $this->load->view('comun/pie'); ?>

</div>  

<?php $this->load->view('comun/footer'); ?>

<?php if($perins==TRUE): ?>
    <?php $this->load->view($insertar); ?>
    <?php $this->load->view('mensajes/insertar_ok'); ?>
<?php endif; ?>

<?php if($perexp==TRUE): ?>
    <?php $this->load->view($exportar); ?>
<?php endif; ?>

<?php if($peract==TRUE): ?>
    <?php $this->load->view($actualizar); ?>
    <?php $this->load->view('mensajes/grabar_ok'); ?>
<?php endif; ?>

<?php if($pereli==TRUE): ?>
      <?php $this->load->view('mensajes/eliminar'); ?>
      <?php $this->load->view('mensajes/eliminar_ok'); ?>
<?php endif; ?>

<?php $this->load->view('mensajes/permiso'); ?>
<?php $this->load->view('mensajes/permiso_no'); ?>

<?php if(isset($visualizar)): ?>
  <?php $this->load->view($visualizar); ?>  
<?php endif; ?>    
