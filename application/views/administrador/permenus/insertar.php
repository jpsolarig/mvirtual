<div class="modal fade" id="insertar" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;"><span>&times;</span></button>
        <h4 class="modal-title">Nuevo Permiso</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <div class="form-group has-success input-group-sm">
            <label for="iderol" ><i class="fa fa-plus-circle"></i> Roles</label>
            <select name="iderol" class="form-control">
              <option value="0" >SELECCIONAR</option>
                <?php for ($x=1; $x < count($selrol) ; $x++) {
                  echo '<option value="',$selrol[$x]->iderol,'" >',$selrol[$x]->nomrol,'</option>';
                }?>
            </select>
          </div>
          <div class="form-group has-success input-group-sm">          
            <label for="idesis" ><i class="fa fa-plus-circle"></i> Sistemas</label>
            <select name="idesis" class="form-control sel_sis">
              <option value="0" class="">SELECCIONAR</option>
                <?php for ($x=1; $x < count($selsis2) ; $x++) {
                  echo '<option value="',$selsis2[$x]->idesis,'">',$selsis2[$x]->nomsis,'</option>';
                }?>
            </select>
          </div>
          <div class="form-group has-success input-group-sm">
            <label for="idemen" ><i class="fa fa-plus-circle"></i> Menus</label>
            <select name="idemen" class="form-control sel_menu" >
              <option value="0">SELECCIONAR MENU</option>
            </select>
          </div>
                   
                    
                    
                    
		    <div class="errores">	</div>
		</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning btn-ins">Insertar</button>
            </div>
        </div>
    </div>
</div>

