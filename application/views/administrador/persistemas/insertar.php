<div class="modal fade" id="insertar" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Nuevo Permiso <?php echo $titulo; ?></h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <div class="form-group has-success input-group-sm">
            <label for="iderol"><i class="fa fa-plus-circle"></i> Roles</label>
            <select name="iderol" class="form-control">
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=1; $x < count($selrol) ; $x++) {
                echo '<option value="',$selrol[$x]->iderol,'" >',$selrol[$x]->nomrol,'</option>';
              }?>
            </select>
          </div>
          <div class="form-group has-success input-group-sm">
            <label for="idesis"><i class="fa fa-plus-circle"></i> Sistemas</label>
            <select name="idesis" class="form-control">
              <option value="0" class="">SELECCIONAR</option>
              <?php for ($x=1; $x < count($insselsis) ; $x++) {
              echo '<option value="',$insselsis[$x]->idesis,'">',$insselsis[$x]->nomsis,'</option>';
              }?>
            </select>
          </div>
        	<div class="errores">	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning btn-ins">Registrar</button>
      </div>
    </div>
  </div>
</div>