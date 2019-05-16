<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Importar extends CMS_Controller  {
       
   public function __construct()
  {
    parent::__construct();
      $this->load->model('pepe_m');
  }      
  
  
  public function index()
  {
    $tipo = $_FILES['archivo']['type'];             // CARGAMOS EL TIPO DE ARCHIVO            echo $tipo."</br>";
    $tamanio = $_FILES['archivo']['size'];          // CARGAMOS EL TAMAÑO DEL ARCHIVO         echo $tamanio ."</br>";
    $archivotmp = $_FILES['archivo']['tmp_name'];   // CARGAMOS EL ARCHIVO EN FORMA TEMPORAL  echo $archivotmp;
    $lineas = file($archivotmp);                    // CARGAMOS EL ARCHIVO                    echo 
    $i=0; 
    
    
    // Inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
    $data = array();
    $suma_duplicados = 0;
    $suma_ingresador = 0;
    
    foreach ($lineas as $linea_num => $linea)       // Recorremos el bucle para leer línea por línea echo $linea;
    { 
       
      
       if($i != 0)                                   // si es diferente a 0 significa que no se encuentra en la primera línea 
       {
          
         
          $datos = explode(",",$linea);
         
          $ideper = utf8_encode($datos[0]);
          $fecmar = utf8_encode($datos[1]);
          $hormar = utf8_encode($datos[2]);
      
         
          
   
             if ($this->pepe_m->insertar_buscar_duplicados($ideper,$fecmar,$hormar))
             {  
               
              
                 $suma_duplicados = $suma_duplicados + 1;
               
               
             }
            else {
                $resultado = $this->pepe_m->insertar($ideper,$fecmar,$hormar);
                if ($resultado)
                  $suma_ingresador = $suma_ingresador + 1;
                else
                  echo 'Error al insertar'."</br>";;
              
            }
            
            

            //exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el ambiente')));
            
            //$this->pepe_m->insert_ignore($data);
            
          
            //$resultado = $this->pepe_m->insertar($ideper,$fecmar,$hormar);
        //if ($resultado)
          //echo 'Se registro correctamente';
        //else
          //echo 'Error al insertar';
          
          //$data = array('......');  // some rows of data to insert
          //$this->db->insert_batch('my_table', $data);
          
       }
       $i++;
       
       
       
       
       
    }
      if($suma_duplicados)
        echo $suma_duplicados." Duplicado no ingresados"."</br></br>";
      if($suma_ingresador)
      echo $suma_ingresador." Se registro correctamente"."</br></br>";
     
    
  } 
    
} 
   /*   
       
      
      //if($i != 0)                                   // si es diferente a 0 significa que no se encuentra en la primera línea 
      //{
        //$datos = explode(",",$linea);
        
       
        
        
        //echo utf8_encode($datos[0])."\t"; // porción2
        //echo utf8_encode($datos[1])."\t";
        //echo utf8_encode($datos[2])."<br>"; // porción2
        
        //$idemar = null;
        $ideper = utf8_encode($datos[0]);
        $fecmar = utf8_encode($datos[1]);
        $hormar = utf8_encode($datos[2]);
        
        //$_data = array(
				//'idemar'	=>	$idemar,
        //    'idemar'	=>	utf8_encode($datos[0]),
        //'fecmar'	=>	utf8_encode($datos[1]),
        //'hormar'	=>  utf8_encode($datos[2]),
       // );
        
        
        $data[] = array(
          'ideper'	=>	$ideper,
        	'fecmar'	=>	$fecmar,
        	'hormar'	=>	$hormar
        		
			);
        
         $count = count($data);
        
        echo $count;
        
        
        /*
        $count = count($data['count']);
for($i = 0; $i<$count; $i++){
$entries[] = array(
'date'=>$data['jdate'][$i],
'type'=>$data['jtype'][$i],
'passenger'=>$data['jpassanger'][$i],
'from_'=>$data['jfrom'][$i],
'to_'=>$data['jto'][$i],
'ticket'=>$data['jticket_no'][$i],
'amount'=>$data['jamount'][$i],
);
}
$this->db->insert_batch('journey', $entries); 
        */
        
        // $_data = array(
        //    'field1' => 'value1',
        //    'field2' => 'vallue2',
        //    'field3' => 'value3'
        //);
        
       
       
        
        //$this->pepe_m->insert_ignore($data);
        
        
        
        
        /*
        $resultado = $this->pepe_m->insertar($ideper,$fecmar,$hormar);
        if ($resultado)
          echo 'Se registro correctamente';
        else
          echo 'Error al insertar';
        */
    
      
      
  
  
  
  
  
  
  
  
  
  
    
   
  //     
 
       //guardamos en base de datos la línea leida
  //     mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
 
       //cerramos condición
  // }
     /*

 


              
             
             





 

   
   (con los títulos de las columnas) y por lo tanto puede leerla*/
  /*
           
           if($i != 0) 
   { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ; */
       //$datos = explode(";",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
       //usamos la función utf8_encode para leer correctamente los caracteres especiales
       //$nombre = utf8_encode($datos[0]);
       //$edad = $datos[1];
       //$profesion = utf8_encode($datos[2]);
       /*
       $this->data = array(
				'idemar'	=>	$datos[0],
        'fecmar'		=>	$datos[1],
        'hormar'			=>$datos[2]
        		
			);
       
       
       //foreach($file_data as $row)
		//{
			//$data[] = array(
				//'idemar'	=>	$row["idemar"],
        	//	'fecmar'		=>	$row["fecha"],
        		//'hormar'			=>	$row["hora"]
        		
			//);
		}
        $this->pepe_m->insert($this->data);
 
       //guardamos en base de datos la línea leida
      // mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
 
       //cerramos condición
   }
 
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   //$i++;
   
   //cerramos bucle

      
        
