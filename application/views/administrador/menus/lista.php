<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content menus">
  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="width:90%; margin:0 auto;">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="titp">N</span></th>
                <th><span class="titp">SISTEMAS</span></th>
                <th><span class="ltitulo">MENUS</span></th>
                <th><span class="ltitulo">DESCRIPCIÓN</span></th>
                <th><span class="ltitulo">ICONO</span></th>
                <th><span class="ltitulo">ORDEN</span></th>
                <?php $this->load->view('comun/nav_tabla'); ?>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
                <tr>
                  <td><span class="ldato"><?php echo $i;?></span></td>
                  <td><span class="ldato"><?php echo $lis[$x]->nomsis ?></span></td>
                  <td><span class="ldato"><?php echo $lis[$x]->nommen ?></span></td>
                  <td><span class="ldato"><?php echo $lis[$x]->desmen ?></span></td>
                  <td class=""><span class="<?php echo $lis[$x]->desico ?>"></span></td>
                  <td><span class="ldato"><?php echo $lis[$x]->ordmen ?></span></td>
                  <?php  if ($peract == 1): ?>
                    <td class="tdact">
                      <a  class="ideact" href="" data-valor="<?php echo $lis[$x]->idemen;?>">
                        <span class="fa fa-pencil actualizar" data-toggle="tooltip" data-placement="top" title="Actualizar"></span>
                      </a>
                    </td>
                  <?php endif; ?>
                  <?php if ($pereli == 1): ?>
                    <td class="tdact">
                      <a  class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->idemen;?>" data-sis="<?php echo $lis[$x]->idesis;?>">
                        <span class="fa fa-times-circle eliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
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