<?php $this->load->view('comun/head_pdf'); ?>
<body>
    <table align="center" width="94%">
        <thead>
            <tr> 
                <th colspan="1" id="imge"><img src="./imagenes/logo.jpg"></th> 
                <th colspan="5" id="titulo"><h2><?php echo $titulo; ?></h2></th>
            </tr>
            <tr>
                <th id="titulo_i" width="6%">ID</th>
                <th class="titulo_m" width="15%">SISTEMAS</th>
                <th class="titulo_m" width="15%">MENUS</th>
                <th class="titulo_m" width="15%">SUB MENUS</th>
                <th class="titulo_m" width="18%">DESCRIPCION</th>
                <th id="titulo_f" width="25%">URL</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($lis as $l): ?>
            <tr>
                <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
                <td class="celda_m" width="15%"><?php echo $l->nomsis; ?></td>
                <td class="celda_m" width="15%"><?php echo $l->nommen; ?></td>
                <td class="celda_m" width="15%"><?php echo $l->nomsubmen; ?></td>
                <td class="celda_m" width="18%"><?php echo $l->dessubmen; ?></td>
                <td id="celda_f" width="25%"><?php echo $l->urlsubmen; ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>