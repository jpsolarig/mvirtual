<div class="modal fade" id="actualizar" style="margin-top: 100px" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  <h4 class="modal-title">ACTUALIZAR MENUS</h4>
    </div>
    <div class="modal-body">
      <form action="" method="POST" role="form">
        <input name="dato_1" id="dato_1" type="hidden" >
        <input name="dato_2" id="dato_2" type="hidden" >
        <input name="dato_3" id="dato_3" type="hidden" >                   
        <div class="form-group text-primary input-group-sm">
          <label for=""><i class="fa fa-pencil"></i> Nombre del SubMenu</label>
          <input name="dato_4" id="dato_4" type="text" maxlength="20" class="form-control" placeholder="Nombre del Menu" autofocus="" tabindex="1">
        </div>
        <div class="form-group text-primary input-group-sm">
          <label for=""><i class="fa fa-pencil"></i> Descripción del SubMenu</label>
          <input name="dato_5" id="dato_5" type="text" maxlength="25" class="form-control" placeholder="Descripción del Menu" tabindex="2">
        </div>
        <div class="form-group text-primary input-group-sm">
          <label for=""><i class="fa fa-pencil"></i> Url</label>
          <input name="dato_6" id="dato_6" type="text" maxlength="25" class="form-control" placeholder="Url del Menu" tabindex="2">
        </div>
        <div class="form-group text-primary input-group-sm">
          <label for="" ><i class="fa fa-pencil"></i> Iconos</label>
          <select name="dato7" id="dato_7" class="form-control" style="font-weight: bold">
            <option value="0" >SELECCIONAR</option>
              <?php for ($x=0; $x < count($selico) ; $x++) {
              echo '<option class="',$selico[$x]->nomico,'" value="',$selico[$x]->ideico,'" >',$selico[$x]->nomico,'</option>';
            }?>                                     
          </select>
        </div>   
        <div class="form-group text-primary input-group-sm">
          <label for=""><i class="fa fa-pencil"></i> Orden</label>
          <input name="dato_8" id="dato_8" type="text" maxlength="3" class="form-control" placeholder="Orden" tabindex="4">
        </div>
        <div class="errores">	</div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-warning btn-gra">Grabar</button>
    </div>
  </div>
    </div>
</div>






<!--
<div class="modal fade" id="editar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Editar área</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="">Descripción de área</label>
                        <input name="desare" id="desare" type="text" autofocus="" maxlength="15" class="form-control" placeholder="Descripción de área">
                    </div>
		    <div class="errores">	</div>
		</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning btn-ins">Registrar</button>
            </div>
        </div>
    </div>
</div>
-->