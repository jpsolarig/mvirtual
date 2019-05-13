<section class="content-header nav-listas">
  <?php $this->load->view('administrador/nav_lista');?>
</section>

<section class="content submenus">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <table id="tablas" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th><span class="titp">ID</span></th>
                <th><span class="titp">AREAS</span></th>
                <th><span class="titp">CATEGORIAS</span></th>
                <th><span class="titp">NUMERO</span></th>
                <th><span class="titp">PATERNO</span></th>
                <th><span class="titp">MATERNO</span></th>
                <th><span class="titp">NOMBRES</span></th>
                <th><span class="titp">TIPO DOCUMENTO</span></th>
                <th><span class="titp">N° DOCUMENTO</span></th>
                
               <?php
               /*
#Metemos el código en una variable, para trabajar más facilmente con ella
$dia = array(
"Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"
);
#Asigna al primer dato 0, al segundo 1, al tercero 2, etc.
$fecha = "Hoy es ".date("d")." ".$dia[date("w")];
echo $fecha;
?>
                
                
                <?php

                
                function dame_el_dia ($fecha)
{
$array_dias['Sunday'] = "Domingo";
$array_dias['Monday'] = "Lunes";
$array_dias['Tuesday'] = "Martes";
$array_dias['Wednesday'] = "Miercoles";
$array_dias['Thursday'] = "Jueves";
$array_dias['Friday'] = "Viernes";
$array_dias['Saturday'] = "Sabado";
return $array_dias[date('l', strtotime($fecha))];
}

$fecha = "2019-05-10";
echo dame_el_dia ($fecha);  
*/
?>
                
                
             <?php
//$old_date = date('y-m-d-h-i-s');            // works

//$middle = strtotime($old_date);             // returns bool(false)

//$new_date = date('Y-m-d H:i:s', $middle);   // returns 1970-01-01 00:00:00

//echo $new_date;


//1/04/2019
//echo '/n';


$originalDate = "2010-03-21";
$newDate = date("d-m-Y", strtotime($originalDate));

echo $newDate;


$originalDate2 = ("1/04/2019");
$newDate2 = date("Y-m-d", strtotime($originalDate2));
echo $newDate2;        


?>   
                
                
                <?php $this->load->view('comun/nav_tabla'); ?>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; for ($x=0; $x < count($lis) ; $x++) { ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $lis[$x]->desare;?></td>
                <td><?php echo $lis[$x]->descat;?></td>
                <td><?php echo $lis[$x]->ideper;?></td>
                <td><?php echo $lis[$x]->apepat;?></td>
                <td><?php echo $lis[$x]->apemat;?></td>
                <td><?php echo $lis[$x]->nomper;?></td>
                <td><?php echo $lis[$x]->destipdoc;?></td>
                <td><?php echo $lis[$x]->numdoc;?></td>
                
                <?php  if ($peract == 1): ?>
                <td class="tdact">
                  <a  class="ideact" href="" data-valor="<?php echo $lis[$x]->idesubmen;?>">
                    <span class="fa fa-pencil actualizar"></span>
                  </a>
                </td>
                <?php endif; ?>
                <?php if ($pereli == 1): ?>
                <td class="tdact">
                  <a  class="ideeli" href="" data-toggle="modal" data-eli="<?php echo $lis[$x]->idesubmen;?>">
                    <span class="fa fa-times-circle eliminar"></span>
                  </a>    
                </td>
                <?php endif; ?>
              </tr>
              <?php $i++;} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


