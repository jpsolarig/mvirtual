<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>
<section class="content usuarios">
  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="width:85%; margin:0 auto;">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="titp">N</span></th>
                <th><span class="titp">ROLES</span></th>
                <th><span class="titp">NOMBRE DE USUARIO</span></th>
                <th><span class="titp">CORREO</span></th>
                <th><span class="titp">ESTADO</span></th>
                <?php  if ($peract == 1): ?>
                <th class="tdact"><span class="fa fa-unlock"></span></th>
                <?php endif; ?>
                <?php $this->load->view('comun/nav_tabla'); ?>
                
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
              <tr>
                <td><?php echo $lis[$x]->ideusu;?></td>
                <td><?php echo $lis[$x]->nomrol;?></td>
                <td><?php echo $lis[$x]->nomusu;?></td>
                <td><?php echo $lis[$x]->corusu;?></td>
                <td><?php echo $lis[$x]->estusu;?></td>
                <?php  if ($peract == 1): ?>
                <td class="tdact">
                  <a  class="idecla" href="" data-valor="<?php echo $lis[$x]->ideusu;?>">
                    <span class="fa fa-unlock clave"></span>
                  </a>
                </td>
                <td class="tdact">
                  <a  class="ideact" href="" data-valor="<?php echo $lis[$x]->ideusu;?>">
                    <span class="fa fa-pencil actualizar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php if ($pereli == 1): ?>
                <td class="tdact">
                  <a  class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->ideusu;?>">
                    <span class="fa fa-times-circle eliminar"></span>
                  </a>    
                </td>
                <?php endif; ?>
              </tr>
              <?php $i++;} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="clave" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-black">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
        <h4 class="modal-title">CAMBIAR CONTRASEÑA</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form" autocomplete="off">
          <input name="dato_1" id="dato_1" type="hidden" >
          <div class="form-group text-primary input-group-sm">
            <label for="">Contraseña</label>
            <input name="dato_2" id="dato_2" type="text" maxlength="25" class="form-control" placeholder="Descripción del Menu" tabindex="2">
          </div>
          
          <div class="errores">	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning btn-gra">Grabar</button>
      </div>
    </div>
  </div>
</div> 
