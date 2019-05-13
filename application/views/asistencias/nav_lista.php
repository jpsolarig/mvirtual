<div class="row nav-lista">
    
  <div class="col-md-2"> 
    <h3><?php echo $titulo; ?></h3>
  </div>
    
  <div class="col-md-7">
    
    <form class="form-inline" action="" method="POST" role="form">
    
      <?php  if (isset($selare)): ?>
        <div class="form-group">
          <label for="iderol" >Areas</label>
          <select id="sel_are" name="ideare" class="form-control listara" >
            <option value="T">TODOS</option>
              <?php for ($x=0; $x < count($selare) ; $x++) {
                echo '<option value="',$selare[$x]->ideare,'" ',$selare[$x]->sel,'>',$selare[$x]->desare,'</option>';
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



