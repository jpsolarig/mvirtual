<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content submenus">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="titp">ID</span></th>
                <th><span class="titp">SISTEMAS</span></th>
                <th><span class="titp">MENUS</span></th>
                <th><span class="titp">SUBMENUS</span></th>
                <th><span class="titp">DESCRIPCION</span></th>
                <th><span class="titp">URL</span></th>
                <th><span class="titp">ICON</span></th>
                <th><span class="titp">ORDEN</span></th>
                <?php $this->load->view('comun/nav_tabla'); ?>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $lis[$x]->nomsis;?></td>
                <td><?php echo $lis[$x]->nommen;?></td>
                <td><?php echo $lis[$x]->nomsubmen;?></td>
                <td><?php echo $lis[$x]->dessubmen;?></td>
                <td><?php echo $lis[$x]->urlsubmen;?></td>
                <td class=""><span class="<?php echo $lis[$x]->desico ?>"></span></td>
                <td><?php echo $lis[$x]->ordsubmen;?></td>
                <?php  if ($peract == 1): ?>
                <td class="tdact">
                  <a  class="ideact" href="" data-valor="<?php echo $lis[$x]->idesubmen;?>">
                    <span class="fa fa-pencil actualizar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php if ($pereli == 1): ?>
                <td class="tdact">
                  <a  class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->idesubmen;?>">
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


