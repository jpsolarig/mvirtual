<?php $this->load->view('comun/head_pdf'); ?>
<body>
    <table align="center" width="71%">
        <thead>
            <tr> 
                <th colspan="1" id="imge"><img src="./imagenes/logo.jpg"></th> 
                <th colspan="3" id="titulo"><h2><?php echo $titulo; ?></h2></th>
            </tr>
            <tr>
                <th id="titulo_i" width="6%">ID</th>
                <th class="titulo_m" width="15%">ROLES</th>
                <th class="titulo_m" width="25%">NOMBRE DE USUARIO</th>
                <th id="titulo_f" width="25%">CORREO DE USUARIO</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($lis as $l): ?>
            <tr>
                <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
                <td class="celda_m" width="15%"><?php echo $l->nomrol; ?></td>
                <td class="celda_m" width="25%"><?php echo $l->nomusu; ?></td>
                <td id="celda_f" width="25%"><?php echo $l->corusu ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>