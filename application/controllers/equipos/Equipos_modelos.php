<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos_modelos extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Modelos';
    $this->nommen = 'Equipos';
    $this->nomsis = 'equipos';
    $this->nomsubmen = 'Modelos';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('equipos/equipos_marcas_m');
    $this->load->model('equipos/equipos_modelos_m');
    $this->load->model('equipos/equipos_m');
    $this->url = "equipos/equipos_modelos/";
  }
    
  public function index()
  {
    $this->lista('T');
  }
        
   public function lista($valor) 
   {
      $sistema = $this->permisos_nombre_del_sistema($this->nomsis, $this->estsis, $this->iderol);
      $menus = $this->permisos_menus_del_sistemas($this->nomsis, $this->estmen, $this->iderol);
      $submenus = $this->permisos_submenus_del_sistema($this->nomsis, $this->estsubmen, $this->iderol);
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
        
      $ide = $this->input->post('ide',TRUE);
      
      $equ = $this->equipos_marcas_m->listar_equipos();
      
      $mar = $this->equipos_marcas_m->listar();
      $selmar = $this->selected($mar);
        
      foreach ($selmar as $value) 
      {
         if ($value->idemar === $valor)
         $value->sel = 'selected';
      }
      
      $equ = $this->equipos_m->listar();
      $insselequ = $this->selected($equ);
      
      
      if ($ide)
         exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
      else {
         if ($valor == "T")
            $lista = $this->equipos_modelos_m->listar();
         else
            $lista = $this->equipos_modelos_m->listar_ide($valor);
        
         $this->data = array(
            'url' => $this->url,
            'titulo' => $this->titulo,
            'menus' => $menus,
            'submenus' => $submenus,
            'lis' => $lista,
            'selmar' => $selmar,
            'insselequ' => $insselequ,
            'lista' => $this->url . 'lista',
            'insertar' => $this->url . 'insertar',
            'exportar' => $this->url . 'exportar',
            'actualizar' => $this->url . 'actualizar',
            'perimp' => $controlador['perimp'],
            'perins' => $controlador['perins'],
            'perexp' => $controlador['perexp'],
            'peract' => $controlador['peract'],
            'pereli' => $controlador['pereli'],
            'jss' => array(
        'js/'.$this->url.'lista.js',
        'js/'.$this->url.'insertar.js',
        'js/'.$this->url.'exportar.js',
        'js/'.$this->url.'actualizar.js',
        'js/'.$this->url.'eliminar.js')
        );
      }    
      if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE) 
         $this->load->view('plantilla', $this->data);
      else
         redirect('escritorio');
   }   
   
   
  
   
    public function validar_pdf() 
   {
      $idemar = $this->input->post('idemar', TRUE);

      if ($idemar)
         exit(json_encode(array('result' => TRUE, 'id' => $idemar, 'mensaje' => 'Se registro correctamente')));
      else
         exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione una marca')));
   }
   
   public function pdf($idemar) 
   {
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

      if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
      {
         $marcas = $this->equipos_marcas_m->listar();
         $i = 0;
         for ($n = 1; $n <= count($marcas); $n++) {
            switch ($idemar) {
               case $n:
                  $data = array(
                  'titulo' => 'LISTA DE ' . strtoupper($this->titulo) . ' ' . $marcas[$i]->nommar,
                  'modelos' => $this->equipos_modelos_m->listar_ide($idemar));
               break;
               case 99:
                  $data = array(
                  'titulo' => 'LISTA DE ' . strtoupper($this->titulo),
                  'modelos' => $this->equipos_modelos_m->listar());
               break;
            }$i++;
         }
         $this->crearPdf($this->titulo, 'porlandscape', $this->url, $data);
      }
      else
         redirect($this->url);
   }
   
   public function llenar_marcas()
   {
      $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
      if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
      {
         $id = $this->input->post('id',TRUE);
         $this->load->model('soporte/equipos_marcas_m');
         $marcas = $this->equipos_marcas_m->insertar_llenar_marcas($id);
         $nomamb[] = "<option value='0'>SELECCIONAR</option>";
         foreach($marcas as $m)
         {
            $nomamb[] = "<option value=".$m -> idemar.">".$m -> nommar."</option>";
         }
                           
         if (empty($id))
            exit(json_encode(array('result'=>FALSE, 'mensaje'=>'')));
         else
            exit(json_encode(array('result'=>TRUE, 'select'=>$nomamb)));
      }
      else
         redirect($this->url);
   }
   
   public function insertar() 
   {
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

      if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) {
         $ideequ = $this->input->post('ideequ', TRUE);
         $idemar = $this->input->post('idemar', TRUE);
         $nommod = $this->input->post('nommod', TRUE);
            

         if (empty($ideequ))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione un equipo')));
         if (empty($idemar))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione una marca')));
         if (empty($nommod))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un modelo')));
         if ($this->equipos_modelos_m->insertar_buscar_nombre($nommod))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el modelo')));
         else {
            $resultado = $this->equipos_modelos_m->insertar($ideequ, $idemar, $nommod);
            if ($resultado)
               exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se registro correctamente !!!')));
            else
               exit(json_encode(array('result' => FALSE, 'mensaje' => 'Error al insertar')));
         }
      }
      else
         redirect($this->url);
   }
       
   public function validar_act()
   {
      $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
      
      if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
      {
         $id = $this->input->post('id',TRUE);
         $modelos = $this->equipos_modelos_m->actualizar($id);
         if ($id) 
            exit(json_encode(array(
               'result'=>TRUE,
               'dato_1'=>$modelos->idemod,
               'dato_2'=>$modelos->idemar,
               'dato_3'=>$modelos->nommod,
               'mensaje'=>'Se registro correctamente')));
      }
      else
         redirect($this->url);
   } 
   
   public function actualizar()
   {
      $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
      if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
      {
         $idemod = $this->input->post('dato_1',TRUE);
         $idemar = $this->input->post('dato_2',TRUE);
         $nommod = $this->input->post('dato_3',TRUE);
             
         if (empty($nommod))
            exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un modelo')));
            
         $modelos = $this->equipos_modelos_m->actualizar_grabar($idemod,$idemar,$nommod);
              
         if ($modelos) 
            exit(json_encode(array(
               'result'=>TRUE,
               'mensaje'=>'Se grabo correctamente')));
         else
            exit(json_encode(array(
               'mensaje'=>'Error al grabar')));
      }
      else
         redirect($this->url);
   }
   
   public function eliminar()
   {
      $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
      if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) 
      {
         $idemod = $this->input->post('eliide',TRUE);
            
         if($this->equipos_modelos_m->eliminar_buscar_relacion($idemod))
            exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
         else
         {
            $this->equipos_modelos_m->eliminar($idemod);
            exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
         }
      }
      else
      redirect($this->url);
   }    
   
}

