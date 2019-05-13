<div class="modal fade" id="actualizar" style="margin-top: 100px" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Actualizar Sistema</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <input name="dato_1" id="dato_1" type="hidden" >
                    <div class="form-group">
                        <label for="">Nombre del sistema</label>
                        <input name="dato_2" id="dato_2" type="text" maxlength="20" class="form-control" placeholder="Nombre del Sistema" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Descripción del sistema</label>
                        <input name="dato_3" id="dato_3" type="text" maxlength="25" class="form-control" placeholder="Descripción del Sistema" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="">Url del sistema</label>
                        <input name="dato_4" id="dato_4" type="text"  maxlength="30" class="form-control" placeholder="Url del Sistema">
                    </div>
                    <div class="form-group">
                        <label for="">Orden</label>
                        <input name="dato_5" id="dato_5" type="text" maxlength="3" class="form-control" placeholder="Orden">
                    </div>
                    <div class="form-group">
                        <label for="">Color</label>
                        <input name="dato_6" id="dato_6" type="text" maxlength="15" class="form-control" placeholder="Color">
                    </div>
                    <div class="form-group">
                        <label for="">Icono</label>
                        <input name="dato_7" id="dato_7" type="text" maxlength="25" class="form-control" placeholder="Icono">
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

