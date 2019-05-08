<div class="modal fade" id="exportar" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title"><?php echo strtoupper($titulo); ?></h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <div class="form-group text-primary">
            <label><i class="fa fa-download"></i> Sistemas</label>
            <select name="idesis" class="form-control">
              <option value="99" >TODOS</option>
                <?php for ($x=0; $x < count($selsis) ; $x++) {
                echo '<option value="',$selsis[$x]->idesis,'" >',$selsis[$x]->nomsis,'</option>';
              }?>
            </select>
          </div>
          <div class="errores">	</div>
        </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left exportar-pdf"><i class="fa fa-download"></i> Pdf</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>       
    </div>
  </div>
</div>