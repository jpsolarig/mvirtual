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
            <label for=""><i class="fa fa-plus-circle"></i> Descripción del Icono</label>
            <input name="desico" id="desico" type="text" maxlength="15" class="form-control" placeholder="Descripción del icono">
          </div>
          
          <div class="form-group has-success input-group-sm ">
            <label for=""><i class="fa fa-plus-circle"></i> Nombre del Icono</label>
            <input name="nomico" id="nomico" type="text" maxlength="15" class="form-control" placeholder="Nombre del icono" autofocus="">
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