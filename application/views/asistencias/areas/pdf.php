<?php $this->load->view('comun/head_pdf'); ?>
<body>
    <table align="center" width="58%">
        <thead>
            <tr> 
                <th colspan="1" id="imge"><img src="./imagenes/logo.jpg"></th> 
                <th colspan="2" id="titulo"><h2><?php echo "Lista de ".$titulo; ?></h2></th>
            </tr>
            <tr>
                <th id="titulo_i" width="6%">ID</th>
                <th class="titulo_m" width="17%">SISTEMAS</th>
                <th id="titulo_f" width="35%">DESCRIPCIÓN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($lis as $l): ?>
            <tr>
                <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
                <td class="celda_m" width="17%"><?php echo $l->nomsis; ?></td>
                <td id="celda_f" width="35%"><?php echo $l->dessis ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>

