<div class="row nav-lista">
    
  <div class="col-md-2"> 
    <h3><?php echo $titulo; ?></h3>
  </div>
    
  <div class="col-md-7">
    
    <form class="form-inline" action="" method="POST" role="form">
    
      <?php  if (isset($selrol)): ?> 
      <div class="form-group">
        <label for="iderol" >Roles</label>
        <select id="sel_rol" name="iderol" class="form-control listara" >
          <option value="T">TODOS</option>
          <?php for ($x=0; $x < count($selrol) ; $x++) {
          echo '<option value="',$selrol[$x]->iderol,'" ',$selrol[$x]->sel,'>',$selrol[$x]->nomrol,'</option>';
          }?>
        </select>
      </div>
      <?php endif; ?>                
               
      <?php  if (isset($selsis)): ?> 
      <div class="form-group">
        <label for="idesis" >Sistemas</label>
        <select id="sel_sistema" name="idesis" class="form-control listara sel_sistema" >
          <option value="T">TODOS</option>
          <?php for ($x=0; $x < count($selsis) ; $x++) {
            echo '<option value="',$selsis[$x]->idesis,'" ',$selsis[$x]->sel,'>',$selsis[$x]->nomsis,'</option>';
          }?>
        </select>
      </div>
      <?php endif; ?> 
            
      <?php  if (isset($selsis2)): ?> 
      <div class="form-group">
        <label for="idesis" >Sistemas</label>
        <select id="sel_sis" name="idesis" class="form-control listara3" >
          <option value="T">TODOS</option>
          <?php for ($x=0; $x < count($selsis2) ; $x++) {
            echo '<option value="',$selsis2[$x]->idesis,'" ',$selsis2[$x]->sel,'>',$selsis2[$x]->nomsis,'</option>';
          }?>
        </select>
      </div>
      <?php endif; ?> 
        
      <?php  if (isset($selmen)): ?> 
      <div class="form-group">
        <label for="idemen" >Menus</label>
        <select id="sel_menu" name="menus" class="form-control listara2 listara4" > 
          <option value="T">TODOS</option>
          <?php for ($x=0; $x < count($selmen) ; $x++) {
            echo '<option value="',$selmen[$x]->idemen,'" ',$selmen[$x]->sel,'>',$selmen[$x]->nommen,'</option>';
          }?>
        </select>
      </div>
      <?php endif; ?>
      
      <?php  if (isset($selcat)): ?>
      <div class="form-group">
        <label for="iderol" >Categorias</label>
        <select id="rol" name="idecat" class="form-control listara" >
          <option value="T">TODOS</option>
          <?php for ($x=0; $x < count($selcat) ; $x++) {
            echo '<option value="',$selcat[$x]->idecatico,'" ',$selcat[$x]->sel,'>',$selcat[$x]->descatico,'</option>';
          }?>
        </select>
      </div>
      <?php endif; ?>     
      
    </form>
  </div>
    
  <?php  if ($perexp == TRUE): ?>
  <div class="col-md-1 pull-right" style="margin-left: 10px;">
    <a class="btn btn-primary btn-sm" data-toggle="modal" style="margin-right: 10px;" href='#exportar' > 
      <i class="fa fa-download" aria-hidden="true"></i> PDF
    </a>
  </div>   
  <?php endif; ?>
        
  <?php  if ($perimp == TRUE): ?>
  <div class="col-md-1 pull-right">
    <a class="btn btn-primary btn-sm" data-toggle="modal" style="margin-right: 5px;" href='#'>
      <i class="fa fa-print"></i> Imprimir
    </a>
  </div>
  <?php endif; ?>     
        
  <?php  if ($perins == TRUE): ?> 
  <div class="col-md-1 pull-right">
    <a class="btn btn-success btn-sm" data-toggle="modal" style="margin-right: 5px;" href='#insertar'> 
      <i class="fa fa-plus-circle"></i> INSERTAR
    </a>
  </div>
  <?php  endif; ?>   

</div>



