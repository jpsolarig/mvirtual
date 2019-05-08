<?php $this->load->view('comun/head_pdf'); ?>
<body>
  <table align="center" width="86%">
    <thead>
      <tr> 
        <th colspan="2" id="imge"><img src="./imagenes/logo.jpg"></th> 
        <th colspan="4" id="titulo"><h2><?php echo $titulo; ?></h2></th>
      </tr>
      <tr>
        <th id="titulo_i" width="6%">ID</th>
        <th class="titulo_m" width="15%">SISTEMAS</th>
        <th class="titulo_m" width="15%">MENUS</th>
        <th class="titulo_m" width="25%">DESCRIPCION DEL MENU</th>
        <th class="titulo_m" width="15%">ICONO</th>
        <th id="titulo_f" width="10%">ORDEN</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($lis as $l): ?>
      <tr>
        <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
        <td class="celda_m" width="15%"><?php echo $l->nomsis; ?></td>
        <td class="celda_m" width="15%"><?php echo $l->nommen; ?></td>
        <td class="celda_m" width="25%"><?php echo $l->desmen; ?></td>
        <td class="celda_m" width="15%"><?php echo $l->desico; ?></td>
        <td id="celda_f" width="10%"><?php echo $l->ordmen; ?></td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</body>
</html>