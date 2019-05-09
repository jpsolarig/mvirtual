<div class="modal fade" id="actualizar" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">ACTUALIZAR MENUS</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <input name="dato_1" id="dato_1" type="hidden" >
          <input name="dato_2" id="dato_2" type="hidden" >
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Nombre del Menu</label>
            <input name="dato_3" id="dato_3" type="text" maxlength="20" class="form-control" placeholder="Nombre del Menu" autofocus="" tabindex="1">
          </div>
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Descripción del Menu</label>
            <input name="dato_4" id="dato_4" type="text" maxlength="25" class="form-control" placeholder="Descripción del Menu" tabindex="2">
          </div>
          
          <div class="form-group text-primary input-group-sm">
            <label for="" ><i class="fa fa-pencil"></i> Iconos</label>
            <select name="dato5" id="dato_5" class="form-control" style="font-weight: bold">
              <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selico) ; $x++) {
                echo '<option class="',$selico[$x]->nomico,'" value="',$selico[$x]->ideico,'" >',$selico[$x]->nomico,'</option>';
              }?>                                     
            </select>
          </div>   
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Orden</label>
            <input name="dato_6" id="dato_6" type="text" maxlength="3" class="form-control" placeholder="Orden" tabindex="4">
          </div>
          <div class="errores">	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning btn-gra">Grabar</button>
      </div>
    </div>
  </div>
</div>
