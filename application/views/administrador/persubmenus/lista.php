<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content persubmenus">
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
                <th><span class="titp">MENUS</span></th>
                <th><span class="titp">SUBMENUS</span></th>
                <th><span class="titp glyphicon glyphicon-eye-open icon-titulo"></span></th>
                <th><span class="titp glyphicon glyphicon-print icon-titulo"></span></th>
                <th><span class="titp glyphicon glyphicon-plus-sign icon-titulo"></span></th>
                <th><span class="titp fa fa-download"></span></th>
                <th><span class="titp glyphicon glyphicon-pencil icon-titulo"></span></th>
                <th><span class="titp glyphicon glyphicon-remove-sign icon-titulo"></span></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $lis[$x]->nomrol;?></td>
                <td><?php echo $lis[$x]->nomsis;?></td>
                <td><?php echo $lis[$x]->nommen;?></td>
                <td><?php echo $lis[$x]->nomsubmen;?></td>
                <?php  if ($lis[$x]->estsubmen == TRUE): ?>
                <td>
                  <a  class="permiso" permiso="ver" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Ver"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->estsubmen == FALSE): ?>
                <td>
                  <a  class="permiso"  permiso="ver" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="No Ver"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->perimp == TRUE): ?>
                <td>
                  <a  class="permiso"  permiso="imp" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon glyphicon-print impresora" data-toggle="tooltip" data-placement="top" title="Imprimir"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->perimp == FALSE): ?>
                <td>
                  <a  class="permiso"  permiso="imp" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="No Imprimir"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->perins == TRUE): ?>
                <td>
                  <a  class="permiso" permiso="ins" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-plus-sign insertar" data-toggle="tooltip" data-placement="top" title="Insertar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->perins == FALSE): ?>
                <td>
                  <a  class="permiso" permiso="ins" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="No Insertar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->perexp == TRUE): ?>
                <td>
                  <a  class="permiso" permiso="exp" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="fa fa-download descarga" data-toggle="tooltip" data-placement="top" title="PDF"></span>
                  </a>  
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->perexp == FALSE): ?>
                <td>
                  <a  class="permiso" permiso="exp" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="No PDF"></span>
                  </a>
                </td>
                <?php endif; ?>
                
                <?php  if ($lis[$x]->peract == TRUE): ?>
                <td>
                  <a  class="permiso" permiso="act" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-pencil actualizar" data-toggle="tooltip" data-placement="top" title="Actualizar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->peract == FALSE): ?>
                <td>
                  <a  class="permiso" permiso="act" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="No Actualizar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->pereli == TRUE): ?>
                <td>
                  <a  class="permiso" permiso="eli" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove-sign eliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php  if ($lis[$x]->pereli == FALSE): ?>
                <td>
                  <a  class="permiso" permiso="eli" href="" iderol="<?php echo $lis[$x]->iderol;?>" idesubmen="<?php echo $lis[$x]->idesubmen;?>" idemen="<?php echo $lis[$x]->idemen;?>" idesis="<?php echo $lis[$x]->idesis;?>" estsubmen="<?php echo $lis[$x]->estsubmen;?>"  perimp="<?php echo $lis[$x]->perimp;?>" perins="<?php echo $lis[$x]->perins;?>" perexp="<?php echo $lis[$x]->perexp;?>" peract="<?php echo $lis[$x]->peract;?>" pereli="<?php echo $lis[$x]->pereli;?>">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="No Eliminar"></span>
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


