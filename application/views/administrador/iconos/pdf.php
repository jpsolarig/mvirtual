<?php $this->load->view('comun/head_pdf'); ?>
<table align="center" width="92%">
    <thead>
        <tr> 
            <th colspan="1" id="imge"><img src="./imagenes/logo.jpg"> </th> 
            <th colspan="3" class="tit"><h2><?php echo $titulo; ?></h2></th>
        </tr>
        <tr>
            <th id="titulo_i" width="5%">ID</th>
            <th class="titulo_m" width="23%">AREAS</th>
            <th id="titulo_f" width="20%">AMBIENTES</th>
            <th id="titulo_f" width="40%">DESCRIPCION</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($ambientes as $ambiente) { ?>
        <tr>
            <td id="celda_i" width="5%"><?php echo $i; ?></td>
            <td class="celda_m" width="23%"><?php echo $ambiente->nomare ?></td>
            <td class="celda_m" width="20%"><?php echo $ambiente->nomamb ?></td>
            <td id="celda_f" width="44%"><?php echo $ambiente->desamb ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>

