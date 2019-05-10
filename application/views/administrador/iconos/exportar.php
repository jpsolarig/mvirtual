<div class="modal fade" id="exportar" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Exportar Ambientes</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="ideare" >Areas</label>
                        <select name="ideare" class="form-control">
                            <option value="0" >SELECCIONAR</option>
                            <option value="99" >TODOS</option>
                            <?php for ($x=0; $x < count($selare) ; $x++) {
                                echo '<option value="',$selare[$x]->ideare,'" >',$selare[$x]->nomare,'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="errores">	</div>
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-pdf pull-left exportar-pdf"><span class="glyphicon glyphicon-floppy-disk"></span> Pdf</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>       
        </div>
    </div>
</div>