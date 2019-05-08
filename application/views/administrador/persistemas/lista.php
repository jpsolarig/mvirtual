<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content persistemas">
  <div class="row">
    <div class="col-xs-12">
      <div class="box" style="width:90%; margin:0 auto;">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="titp">ID</span></th>
                <th><span class="titp">ROLES</span></th>
                <th><span class="titp">SISTEMAS</span></th>
                <th><span class="titp glyphicon glyphicon-eye-open"></span></th>
                <?php  if ($pereli == TRUE): ?> 
                <th class="tdact"><span class="glyphicon glyphicon-remove-sign"></span></th>
                <?php endif; ?> 
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $lis[$x]->nomrol;?></td>
                <td><?php echo $lis[$x]->nomsis;?></td>
                <?php  if ($lis[$x]->estsis == TRUE): ?>
                <td>
                  <a class="permiso" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsis="<?php echo $lis[$x]->estsis;?>">
                    <span class="glyphicon glyphicon-eye-open"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->estsis == FALSE): ?>
                <td>
                  <a  class="permiso" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsis="<?php echo $lis[$x]->estsis;?>">
                    <span class="glyphicon glyphicon-eye-close"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php if ($pereli == 1): ?>
                <td class="tdact">
                  <a  class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->iderol;?>" data-eli2="<?php echo $lis[$x]->idesis;?>">
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