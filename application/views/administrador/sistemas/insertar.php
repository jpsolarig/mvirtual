<div class="modal fade" id="insertar" style="padding-top: 50px;" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Insertar <?php echo $titulo; ?></h4>
      </div>    
      <div class="modal-body">
          <form action="" method="POST" role="form" autocomplete="off">
          <div class="form-group has-success input-group-sm">
            <label for="inputSuccess"><i class="fa fa-plus-circle"></i> Nombre del Sistema</label>
            <input name="nomsis" id="nomsis" type="text" maxlength="20" class="form-control" placeholder="Nombre del Sistema" autofocus="">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Descripción  del sistema</label>
            <input name="dessis" id="desare" type="text" maxlength="25" class="form-control" placeholder="Descripción del Sistema">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Url del sistema</label>
            <input name="urlsis" id="desare" type="text" maxlength="30" class="form-control" placeholder="Url del Sistema">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Orden</label>
            <input name="ordsis" id="desare" type="text" maxlength="2" class="form-control" placeholder="Orden">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for="" ><i class="fa fa-plus-circle"></i> Colores</label>
            <select name="idecol" class="form-control">
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selcol) ; $x++) {
                echo '<option class="',$selcol[$x]->descol,'" value="',$selcol[$x]->idecol,'" >',$selcol[$x]->descol,'</option>';
              }?>                                     
            </select>
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