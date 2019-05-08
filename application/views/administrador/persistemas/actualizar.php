<div class="modal fade" id="actualizar" style="margin-top: 100px" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">ACTUALIZAR SUB MENUS</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
             
                    <div class="form-group">
                        <label for="">Nombre del Sub Menu</label>
                        <input name="idesis" id="ediidesis" type="hidden" >
                        <input name="idemen" id="ediidemen" type="hidden" >
                        <input name="idemen" id="ediidesubmen" type="hidden" >
                        <input name="nomsubmen" id="edinomsubmen" type="text" autofocus="" maxlength="20" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Descripción del sub Menu</label>
                        <input name="dessubmen" id="edidessubmen" type="text" autofocus="" maxlength="30" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Url del sub Menu</label>
                        <input name="urlsubmen" id="ediurlsubmen" type="text" autofocus="" maxlength="30" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Orden</label>
                        <input name="ordsubmen" id="ediordsubmen" type="text" autofocus="" maxlength="2" class="form-control">
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