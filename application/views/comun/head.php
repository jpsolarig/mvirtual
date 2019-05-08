<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $titulo; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url('imagenes/favicon.png'); ?>" />
    <link rel="stylesheet"  href="<?php echo base_url('librerias/bootstrap/css/bootstrap.min.css'); ?>" >
    <link rel="stylesheet"  href="<?php echo base_url('librerias/font-awesome/css/font-awesome.min.css'); ?>" >
    <link rel="stylesheet" href="<?php echo base_url('librerias/ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('librerias/datatables_bs/css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet"  href="<?php echo base_url('css/AdminLTE.min.css'); ?>" >
    <link rel="stylesheet"  href="<?php echo base_url('css/skins/_all-skins.min.css'); ?>" >
    <?php  foreach($csss as $css):?>
      <link rel="stylesheet"  href="<?php echo base_url($css); ?>" >
    <?php endforeach;?>
    <script>var baseURL="<?php echo base_url().$url ?>"</script>
    <script>var baseJS="<?php echo base_url() ?>"</script>
  </head>    
  

  



    
    