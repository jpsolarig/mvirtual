<div class="modal fade " id="actualizar" style="margin-top: 10px" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
        <h4 class="modal-title">Actualizar Iconos</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <input name="dato_1" id="dato_1" type="hidden" >
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Descripción del icono</label>
            <input name="dato_2" id="dato_2" type="text" maxlength="20" class="form-control" style="font-weight: bold" placeholder="Descripcion del Icono">
          </div>
          <div class="form-group text-primary input-group-sm">
            <label for=""><i class="fa fa-pencil"></i> Nombre del icono</label>
            <input name="dato_3" id="dato_3" type="text" maxlength="20" class="form-control" style="font-weight: bold" placeholder="Nombre del Icono">
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
