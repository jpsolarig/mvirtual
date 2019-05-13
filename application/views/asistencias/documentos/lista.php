<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content iconos">
  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="width:90%; margin:0 auto;">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="ltitulo">N</span></th>
                <th><span class="ltitulo">TIPOS DE DOCUMENTOS</span></th>
                <?php $this->load->view('comun/nav_tabla'); ?>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
                    <tr>
                        <td><span class="ldato"><?php echo $i;?></span></td>
                        <td><span class="ldato"><?php echo $lis[$x]-> destipdoc?></span></td>
                        
                        
                       
                        <?php  if ($peract == 1): ?>
                        <td class="tdact">
                            <a class="ideact" href="" data-valor="<?php echo $lis[$x]->ideico;?>">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <?php endif; ?>
                        <?php if ($pereli == 1): ?>
                        <td class="tdact">
                            <a class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->ideico;?>">
                                <span class="glyphicon glyphicon-remove-sign"></span>
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
