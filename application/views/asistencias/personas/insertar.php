<div class="modal fade" id="insertar" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Nuevo <?php echo $titulo; ?></h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
            <div class="form-group has-success input-group-sm" >
            <label for="idesis" ><i class="fa fa-plus-circle"></i> Sistemas</label>
            <select name="idesis" class="form-control sel_sis">
              <option value="0">SELECCIONAR</option>
              <?php for ($x=1; $x < count($selsis) ; $x++) {
                echo '<option value="',$selsis[$x]->idesis,'" >',$selsis[$x]->nomsis,'</option>';
              }?>
            </select>
          </div>
          <div class="form-group has-success input-group-sm">
            <label for="idemen" ><i class="fa fa-plus-circle"></i> Menus</label>
            <select name="idemen" class="form-control sel_menu" >
              <option value="0">SELECCIONAR MENU</option>
            </select>
          </div>
          <div class="form-group has-success input-group-sm">          
            <label for=""><i class="fa fa-plus-circle"></i> Sub Menus</label>
            <input name="nomsubmen" type="text" autofocus="" maxlength="15" class="form-control" placeholder="Nombre del  PC">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Descripcion</label>
            <input name="dessubmen" type="text" autofocus="" maxlength="15" class="form-control" placeholder="Nombre de PC">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Url</label>
            <input name="urlsubmen" type="text" autofocus="" maxlength="25" class="form-control" placeholder="Nombre de PC">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for="" ><i class="fa fa-plus-circle"></i> Iconos</label>
            <select name="ideico" class="form-control">
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selico) ; $x++) {
                echo '<option class="',$selico[$x]->nomico,'" value="',$selico[$x]->ideico,'" >',$selico[$x]->nomico,'</option>';
              }?>                                     
            </select>
          </div>       
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Orden</label>
            <input name="ordsubmen" type="text" autofocus="" maxlength="15" class="form-control" placeholder="Nombre de PC">
          </div>
          <div id="er" class="errores">	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning btn-ins">Registrar</button>
      </div>
    </div>
  </div>
</div>

