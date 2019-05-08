<?php $this->load->view('comun/head_pdf'); ?>
<body>
    <table align="center" width="83%">
        <thead>
            <tr> 
                <th colspan="1" id="imge"><img src="./imagenes/logo.jpg"></th> 
                <th colspan="4" id="titulo"><h2><?php echo $titulo; ?></h2></th>
            </tr>
            <tr>
                <th id="titulo_i" width="6%">ID</th>
                <th class="titulo_m" width="25%">ROLES</th>
                <th class="titulo_m" width="17%">SISTEMAS</th>
                <th class="titulo_m" width="17%">MENUS</th>
                <th id="titulo_f" width="18%">PERMISO</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($lis as $l): ?>
            <tr>
                <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
                <td class="celda_m" width="25%"><?php echo $l->nomrol; ?></td>
                <td class="celda_m" width="17%"><?php echo $l->nomsis; ?></td>
                <td class="celda_m" width="17%"><?php echo $l->nommen; ?></td>
                <td id="celda_f" width="18%">
                  <?php 
                    if($l->estmen==1)
                      echo "SI";
                    else
                      echo "NO"
                  ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>