<div class="modal fade" id="eliminar" style="padding-top: 100px">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff; ">&times;</button>
        <h4 class="modal-title">Esta seguro eliminar el dato</h4>
      </div>
           
      <div class="modal-body">
      <form action="" method="POST" role="form">
        <div class="form-group">
          <input id="eliide" type="hidden" name="datos" class="form-control" >
          <input id="eliide2" type="hidden" name="datos" class="form-control" >
          <input id="eliide3" type="hidden" name="datos" class="form-control" >
          <input id="eliide4" type="hidden" name="datos" class="form-control" >
          <br>
          <div class="row">
            <div class="col-xs-1"> </div>     
            <div class="col-xs-5">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-xs-5">
              <button type="button" class="btn btn-warning btn-eli">Eliminar</button>
            </div> 
            <div class="col-xs-1"> </div>          
          </div>
          <br>
          <div class="errores">	</div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

