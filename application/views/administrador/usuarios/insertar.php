<div class="modal fade" id="insertar" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <div class="form-group has-success input-group-sm">
            <label><i class="fa fa-plus-circle"></i> Roles</label>
            <select name="iderol" class="form-control">
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selrol) ; $x++) {
                if($selrol[$x]->iderol!=1)
                  echo '<option value="',$selrol[$x]->iderol,'" >',$selrol[$x]->nomrol,'</option>';
              }?>
            </select>
          </div>
          <div class="form-group has-success input-group-sm">
            <label><i class="fa fa-plus-circle"></i> Nombre de usuario</label>
            <input name="nomusu" type="text" maxlength="30" class="form-control" placeholder="Correo electronico" autofocus="">
          </div>
          
          <div class="form-group has-success input-group-sm">
            <label><i class="fa fa-plus-circle"></i> Correo</label>
            <input name="corusu" type="text" maxlength="30" class="form-control" placeholder="Correo electronico">
          </div>
          
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Contraseña</label>
            <input name="pasusu" type="text" maxlength="15" class="form-control" placeholder="Contraseña">
          </div>
         
          <div class="errores">	</div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-ins">Insertar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>