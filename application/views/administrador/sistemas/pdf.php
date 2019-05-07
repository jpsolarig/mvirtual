<?php $this->load->view('comun/head_pdf'); ?>
<body>
  <table align="center" width="100%">
    <thead>
      <tr> 
        <th colspan="2" id="imge"><img src="./imagenes/logo.jpg"></th> 
        <th colspan="5" id="titulo"><h2><?php echo "Lista de ".$titulo; ?></h2></th>
      </tr>
      <tr>
        <th id="titulo_i" width="6%">ID</th>
        <th class="titulo_m" width="15%">SISTEMAS</th>
        <th class="titulo_m" width="20%">DESCRIPCIÓN</th>
        <th class="titulo_m" width="21%">URL</th>
        <th class="titulo_m" width="15%">ICONO</th>
        <th class="titulo_m" width="15%">COLOR</th>
        <th id="titulo_f" width="8%">ORDEN</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($lis as $l): ?>
      <tr>
        <td id="celda_i" width="6%" style="text-align: center"><?php echo $i; ?></td>
        <td class="celda_m" width="15%"><?php echo $l->nomsis; ?></td>
        <td class="celda_m" width="20%"><?php echo $l->dessis; ?></td>
        <td class="celda_m" width="21%"><?php echo $l->urlsis; ?></td>
        <td class="celda_m" width="15%"><?php echo $l->desico; ?></td>
        <td class="celda_m" width="15%"><?php echo $l->descol; ?></td>
        <td id="celda_f" width="8%"><?php echo $l->ordsis; ?></td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</body>
</html>

