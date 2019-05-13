<div class="modal fade" id="insertar" style="padding-top: 50px;" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Insertar</h4>
      </div>    
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <div class="form-group has-success input-group-sm">
            <label for="" ><i class="fa fa-plus-circle"></i> Áreas</label>
            <select name="ideare" class="form-control" autofocus>
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selare) ; $x++) {
                echo '<option value="',$selare[$x]->ideare,'" >',$selare[$x]->nomare,'</option>';
              }?>
            </select>
          </div>   
          <div class="form-group has-success input-group-sm">
            <label for="inputSuccess"><i class="fa fa-plus-circle"></i> Nombre de Ambiente</label>
            <input name="nomamb" id="nomamb" type="text" maxlength="20" class="form-control" placeholder="Nombre del ambiente" autofocus="">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Descripción de Ambiente</label>
            <input name="desamb" id="desamb" type="text" maxlength="25" class="form-control" placeholder="Descripción de ambiente">
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