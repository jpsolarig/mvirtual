<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
		
        <?php  if (isset($menus)): ?> 
            <?php foreach ($menus as $key => $menu): ?> 
            <li class="treeview">
                <a href="#<?php echo $menu->nommen; ?>">
                    <i class="<?php echo $menu->desico; ?>"></i>
                    <span><?php echo $menu->nommen; ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    <ul class="treeview-menu">
                    <?php foreach ($submenus as $key => $submenu): ?> 
                        <?php  if ($submenu->nommen == $menu->nommen): ?>   
                        <li><a href="<?php echo base_url($submenu->urlsubmen) ?>">
                                <i class="<?php echo $submenu->desico; ?>"></i> 
                                <?php echo $submenu->nomsubmen; ?>
                            </a>
                        </li>
                        <?php endif; ?>  
                    <?php endforeach; ?> 
                    </ul>   
                </a>    
            </li>
            <?php endforeach; ?>
        <?php endif; ?>     
        
        </ul>
    </section>
</aside>