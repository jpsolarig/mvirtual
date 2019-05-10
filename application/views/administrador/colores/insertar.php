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
            <label for="inputSuccess"><i class="fa fa-plus-circle"></i> Descripción del Color</label>
            <input name="descol" id="descol" type="text" maxlength="20" class="form-control" placeholder="Descripcion del Color" autofocus="">
          </div>
          <div class="errores">	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-ins">Insertar</button>
        <button type="button" class="btn btn-danger bg-gray" data-dismiss="modal" >Cancelar</button>
      </div>     
    </div>
  </div>
</div>