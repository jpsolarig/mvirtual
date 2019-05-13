<div class="modal fade" id="insertar" style="margin-top: 20px;" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Insertar <?php echo $titulo; ?></h4>
      </div>    
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <div class="form-group has-success">
            <label for="inputSuccess"><i class="fa fa-check"></i> Nombre del Sistema</label>
            <input name="nomsis" id="nomsis" type="text" maxlength="20" class="form-control input-sm" placeholder="Nombre del Sistema" autofocus="">
          </div>
          <div class="form-group">
            <label for="">Descripción  del sistema</label>
            <input name="dessis" id="desare" type="text" maxlength="25" class="form-control input-sm" placeholder="Descripción del Sistema">
          </div>
          <div class="form-group">
            <label for="">Url del sistema</label>
            <input name="urlsis" id="desare" type="text" maxlength="30" class="form-control input-sm" placeholder="Url del Sistema">
          </div>
          <div class="form-group">
            <label for="">Orden</label>
            <input name="ordsis" id="desare" type="text" maxlength="2" class="form-control input-sm" placeholder="Orden">
          </div>
          <div class="form-group">
            <label for="">Color</label>
            <input name="csssis" id="desare" type="text" maxlength="15" class="form-control input-sm" placeholder="Color">
          </div>
          <div class="form-group">
            <label for="">Icono</label>
            <input name="icosis" id="desare" type="text" maxlength="25" class="form-control input-sm" placeholder="Icono">
          </div>
		      <div class="errores">	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-ins">Insertar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>     
    </div>
  </div>
</div>