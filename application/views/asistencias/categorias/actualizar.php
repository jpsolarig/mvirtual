<div class="modal fade " id="actualizar" style="padding-top: 30px" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Actualizar</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <input name="dato_1" id="dato_1" type="hidden" >
          <input name="dato_2" id="dato_2" type="hidden" >
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Nombre del ambiente</label>
            <input name="dato_3" id="dato_3" type="text" maxlength="20" class="form-control" style="font-weight: bold" placeholder="Nombre del Sistema">
          </div>
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Descripción del ambiente</label>
            <input name="dato_4" id="dato_4" type="text" maxlength="25" class="form-control" style="font-weight: bold" placeholder="Descripción del Sistema" autofocus="">
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

