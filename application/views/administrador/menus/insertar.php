<div class="modal fade" id="insertar" style="margin-top: 50px;" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Nuevo <?php echo $titulo; ?></h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <div class="form-group has-success input-group-sm">
            <label for="idesis" ><i class="fa fa-plus-circle"></i> Sistemas</label>
            <select name="idesis" class="form-control">
              <option value="0" >SELECCIONAR</option>
                <?php for ($x=0; $x < count($selsis) ; $x++) {
                  echo '<option value="',$selsis[$x]->idesis,'" >',$selsis[$x]->nomsis,'</option>';
                }?>
            </select>
          </div>
          <div class="form-group has-success input-group-sm ">
            <label for=""><i class="fa fa-plus-circle"></i> Nombre del Menu</label>
            <input name="nommen" id="nommen" type="text" maxlength="15" class="form-control" placeholder="Nombre del menu" autofocus="">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Descripción del Menu</label>
            <input name="desmen" id="desmen" type="text" maxlength="15" class="form-control" placeholder="Descripción del menu">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for="" ><i class="fa fa-plus-circle"></i> Iconos</label>
            <select name="ideico" class="form-control">
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selico) ; $x++) {
                echo '<option class="',$selico[$x]->desico,'" value="',$selico[$x]->ideico,'" >',$selico[$x]->desico,'</option>';
              }?>                                     
            </select>
          </div>     
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Orden</label>
            <input name="ordmen" id="ordmen" type="text" maxlength="2" class="form-control" placeholder="Orden">
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