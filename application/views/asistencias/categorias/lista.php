<section class="content-header nav-listas">
  <?php $this->load->view('asistencias/nav_lista');?>
</section>

<section class="content lista">
  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="width:90%; margin:0 auto;">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="titp">N</span></th>
                <th><span class="titp">AREAS</span></th>
                <th><span class="titp">CATEGORIAS</span></th>
                <?php $this->load->view('comun/nav_tabla'); ?>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $lis[$x]->desare;?></td>
                  <td><?php echo $lis[$x]->descat;?></td>
                  <?php  if ($peract == 1): ?>
                    <td class="tdact">
                      <a  class="ideact" href="" data-valor="<?php echo $lis[$x]->idecat;?>">
                        <span class="fa fa-pencil actualizar"></span>
                      </a>
                    </td>
                  <?php endif; ?>
                  <?php if ($pereli == 1): ?>
                    <td class="tdact">
                      <a  class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->idecat;?>">
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

