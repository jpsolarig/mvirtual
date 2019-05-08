<div class="modal fade" id="actualizar" style="margin-top: 10px" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Actualizar Roles</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <input name="dato_1" id="dato_1" type="hidden" >
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Nombre del rol</label>
            <input name="dato_2" id="dato_2" type="text" autofocus="" maxlength="20" class="form-control" placeholder="Nombre del Sistema">
          </div>
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Descripción del rol</label>
            <input name="dato_3" id="dato_3" type="text" autofocus="" maxlength="30" class="form-control" placeholder="Descripción del Rol">
          </div>
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Orden</label>
            <input name="dato_4" id="dato_4" type="text" autofocus="" maxlength="2" class="form-control" placeholder="Orden">
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

