<div class="modal fade" id="actualizar" style="margin-top: 100px" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">EDITAR <?php echo strtoupper($titulo); ?></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <input name="dato_1" id="dato_1" type="hidden" >
                    <input name="dato_2" id="dato_2" type="hidden" >
                    
                    <div class="form-group">
                        <label for="">Nombre del ambiente</label>
                        <input name="dato_3" id="dato_3" type="text" autofocus="" maxlength="20" class="form-control" placeholder="NOmbre del ambiente">
                    </div>
                                        
                    <div class="form-group">
                        <label for="">Descripción de Ambiente</label>
                        <input name="dato_4" id="dato_4" type="text" autofocus="" maxlength="20" class="form-control" placeholder="Descripción de Ambiente">
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