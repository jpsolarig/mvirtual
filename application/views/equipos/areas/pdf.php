<?php $this->load->view('comun/head_pdf'); ?>
<body>
  <table align="center" width="46%">
    <thead>
      <tr> 
        <th colspan="1" id="imge"><img src="./imagenes/logo.jpg"></th> 
        <th colspan="1" id="titulo"><h2><?php echo "Lista de ".$titulo; ?></h2></th>
      </tr>
      <tr>
        <th id="titulo_i" width="6%">ID</th>
        <th id="titulo_f" width="40%">AREAS</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($lis as $l): ?>
      <tr>
        <td id="celda_i" width="6%"><?php echo $i; ?></td>
        <td id="celda_f" width="40%"><?php echo $l->desare ?></td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</body>
</html>
