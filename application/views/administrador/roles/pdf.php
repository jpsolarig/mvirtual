<?php $this->load->view('comun/head_pdf'); ?>
<table align="center" width="88%">
    <thead>
        <tr> 
         <th colspan="2" id="imge"><img src="./imagenes/logo.jpg"></th> 
         <th colspan="2" class="tit"><h2><?php echo "Lista de ".$titulo; ?></h2></th>
        </tr>
        <tr>
            <th id="titulo_i" width="6%">ID</th>
            <th class="titulo_m" width="35%">ROLES</th>
            <th class="titulo_m" width="35%">DESCRIPCION</th>
            <th id="titulo_f" width="12%">ORDEN</th>
            
        </tr>
        
    </thead>
     <tbody>
        <?php $i=1; foreach($lis as $l): ?>
        <tr>
            <td id="celda_i" width="6%"><?php echo $i; ?></td>
            <td class="celda_m" width="35%"><?php echo $l->nomrol; ?></td>
            <td class="celda_m" width="35%"><?php echo $l->desrol?></td>
            <td id="celda_f" width="12%"><?php echo $l->ordrol?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
