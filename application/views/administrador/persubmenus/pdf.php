<?php $this->load->view('comun/head_pdf'); ?>
<body>
    <table align="center" width="100%">
        <thead>
            <tr> 
                <th colspan="2" id="imge"><img src="./imagenes/logo.jpg"></th> 
                <th colspan="4" id="titulo"><h2><?php echo $titulo; ?></h2></th>
            </tr>
            <tr>
                <th id="titulo_i" width="6%">ID</th>
                <th class="titulo_m" width="16%">ROLES</th>
                <th class="titulo_m" width="16%">SISTEMAS</th>
                <th class="titulo_m" width="16%">MENUS</th>
                <th class="titulo_m" width="16%">SUBMENUS</th>
                <th class="titulo_m" width="5%">VER</th>
                <th class="titulo_m" width="5%">IMP</th>
                <th class="titulo_m" width="5%">INS</th>
                <th class="titulo_m" width="5%">EXP</th>
                <th class="titulo_m" width="5%">ACT</th>
                <th id="titulo_f" width="5%">ELI</th>
            
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($lis as $l): ?>
            <tr>
                <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
                <td class="celda_m" width="16%"><?php echo $l->nomrol; ?></td>
                <td class="celda_m" width="16%"><?php echo $l->nomsis; ?></td>
                <td class="celda_m" width="16%"><?php echo $l->nommen; ?></td>
                <td class="celda_m" width="16%"><?php echo $l->nomsubmen; ?></td>
                <td class="celda_m" width="5%"><?php echo $l->estsubmen; ?></td>
                <td class="celda_m" width="5%"><?php echo $l->perimp; ?></td>
                <td class="celda_m" width="5%"><?php echo $l->perins; ?></td>
                <td class="celda_m" width="5%"><?php echo $l->perexp; ?></td>
                <td class="celda_m" width="5%"><?php echo $l->peract; ?></td>
                <td id="celda_f" width="5%"><?php echo $l->pereli; ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>