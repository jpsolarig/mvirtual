<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Importar extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Importar';
    $this->nomsis = 'Asistencias';
    $this->nommen = 'Marcaciones';
    $this->nomsubmen = 'Importar';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('asistencias/importar_m');
    $this->url = "asistencias/importar/";
  }
    
  public function index()
  {
    $this->lista();
  }
    
  public function lista()
  {
    $sistema = $this->permisos_nombre_del_sistema($this->nomsis,$this->estsis,$this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis,$this->estmen,$this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis,$this->estsubmen,$this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
              
    $carimp = '';
    
    $this->data = array(
      'url' => $this->url,
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'carimp' => $carimp,  
      
      'lista' => $this->url.'lista',
      
      'perimp' => $controlador['perimp'],
      'perins' => $controlador['perins'],
      'perexp' => $controlador['perexp'],
      'peract' => $controlador['peract'],
      'pereli' => $controlador['pereli'],
      'jss' => array(
        'js/'.$this->url.'importar.js',
        'js/'.$this->url.'exportar.js',
        'js/'.$this->url.'insertar.js',
        'js/'.$this->url.'actualizar.js',
        'js/'.$this->url.'eliminar.js'),
        
      'csss' => array(
        'css/'.$this->url.'lista.css'),  
    );
            
    if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE) 
      $this->load->view('plantilla', $this->data);
    else
      redirect('escritorio');
     
    
  }
  
  public function importar()
  {
    $tipo = $_FILES['archivo']['type'];             // CARGAMOS EL TIPO DE ARCHIVO           
     echo $tipo."</br>";
     
      exit(json_encode(array('result' => TRUE, 'tipo' => $tipo)));
  }
  
  
  
  
  function cargar_datos()
  {
    $result = $this->importar_m->select();
    $output = '';
    if($result->num_rows() > 0)
    {
      $output .= '<p><b> Número de Registros:</b><spam> <span>'.$result->num_rows.'</span></p>';
    }
    echo $output;
  }
  
 
 
}
