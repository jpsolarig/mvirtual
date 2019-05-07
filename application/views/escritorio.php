<?php $this->load->view('comun/head'); ?>

<body class="">
<div class="escritorio">
  <section class="invoice bg-teal" >
    <div class="row" >
      <?php foreach ($sistemas as $key => $sistema): ?> 
      <div class="col-lg-3 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon <?php echo $sistema->descol?>">
            <i class="<?php echo $sistema->desico?>"></i>
          </span>
          <div class="info-box-content ">
            <span class="info-box-text"><br> </span>
            <span class="info-box-number">
              <a href="<?php echo base_url($sistema->urlsis)?>" class="small-box-footer">
                  <?php echo $sistema->dessis; ?>
                </a>
            </span>
          </div>
        </div>   
      </div>
      <?php endforeach; ?>    
      <div class="col-lg-3 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon btn-danger">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text"><br> </span>
            <span class="info-box-number">
              <a href="<?php echo base_url("login/logout")?>" class="small-box-footer">
                Salir
              </a>
            </span>
          </div>
        </div>    
      </div>
    </div>        
  </section>
</div>    
<?php $this->load->view('comun/footer'); ?>





    

   
    


  



