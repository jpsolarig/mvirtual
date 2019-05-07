<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title><?php echo $titulo; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('imagenes/favicon.png'); ?>" />
    <link rel="stylesheet"  href="<?php echo base_url('librerias/bootstrap/css/bootstrap.min.css'); ?>" >
    <link rel="stylesheet"  href="<?php echo base_url('librerias/font-awesome/css/font-awesome.min.css'); ?>" >
    <link rel="stylesheet"  href="<?php echo base_url('css/login.css'); ?>" >
  </head>    
<body>
  <div class="container">
    <div class="logo-container">
      <img id="profile-img" class="logo-imagen" src="<?php echo base_url('imagenes/logo.png'); ?>" />
      <?php echo form_open('login/login','class="form-login"'); ?>
      
      <label id="label-correo">Correo Electrónico</label>
      <input id="input-correo" type="email"  class="form-control" placeholder="Correo Electrónico"  name="corusu" value="<?php echo set_value('corusu'); ?>" autofocus>
      <label id="label-password" >Password</label>
      <input id="input-password" type="password"  class="form-control" placeholder="Password" name="pasusu" type="password" value="" >
      <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">Login</button>
      <?php echo validation_errors('<div class="error">', '</div>'); ?>
      <span class="form-espacio"></span>
      <?php echo form_close(); ?>
    </div>
  </div>
  <script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('librerias/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
