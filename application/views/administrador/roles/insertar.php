<div class="modal fade" id="insertar" style="margin-top: 100px" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">Nuevo Rol</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <div class="form-group has-success input-group-sm">
            <label for="inputSuccess"><i class="fa fa-plus-circle"></i> Nombre del Rol</label>
            <input name="nomrol" type="text" autofocus="" maxlength="20" class="form-control" placeholder="Nombre del Rol">
          </div>
          <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Descripción del sistema</label>
            <input name="desrol" type="text" autofocus="" maxlength="25" class="form-control" placeholder="Descripción del Rol">
          </div>
            <div class="form-group has-success input-group-sm">
            <label for=""><i class="fa fa-plus-circle"></i> Orden</label>
            <input name="ordrol" type="text" autofocus="" maxlength="2" class="form-control" placeholder="Orden">
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

