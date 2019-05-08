<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content menus">
  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="width:90%; margin:0 auto;">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                
                
                
               
                
               
                
                
                <th><span class=""></span></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
              <tr>
               
                
               
                
                
                
                
                
                
              </tr>
              <?php $i++;} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


