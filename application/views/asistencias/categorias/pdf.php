<?php $this->load->view('comun/head_pdf'); ?>
<body>
  <table align="center" width="81%">
    <thead>
      <tr> 
        <th colspan="2" id="imge"><img src="./imagenes/logo.jpg"></th> 
        <th colspan="2" id="titulo"><h2><?php echo $titulo; ?></h2></th>
      </tr>
      <tr>
        <th id="titulo_i" width="6%">ID</th>
        <th class="titulo_m" width="25%">AREAS</th>
        <th class="titulo_m" width="25%">AMBIENTES</th>
        <th id="titulo_f" width="25%">DESCRIPCION</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($lis as $l): ?>
      <tr>
        <td id="celda_i" width="6%"><?php echo $i; ?></td>
        <td class="celda_m" width="25%"><?php echo $l->nomare; ?></td>
        <td class="celda_m" width="25%"><?php echo $l->nomamb; ?></td>
        <td id="celda_f" width="25%"><?php echo $l->desamb; ?></td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</body>
</html>

