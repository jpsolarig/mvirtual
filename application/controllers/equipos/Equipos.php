<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Equipos';
    $this->nomsis = 'Equipos';
    $this->nommen = 'Fabricantes';
    $this->nomsubmen = 'Equipos';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('equipos/equipos_m');
    $this->url = "equipos/equipos/";
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
        
    $this->data = array(
      'url' => $this->url,
      'titulo' =>   $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $this->equipos_m->listar(),
            
      'lista' => $this->url.'lista',
      'insertar' => $this->url.'insertar',
      'exportar' => $this->url.'exportar',
      'actualizar' => $this->url.'actualizar',
            
      'perimp' => $controlador['perimp'],
      'perins' => $controlador['perins'],
      'perexp' => $controlador['perexp'],
      'peract' => $controlador['peract'],
      'pereli' => $controlador['pereli'],
            
      'jss' => array(
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
   
  public function insertar()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
    {
      $nomequ  = $this->input->post('nomequ',TRUE);
            
      if (empty($nomequ))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un nombre')));
           
      if($this->equipos_m->insertar_buscar_nombre($nomequ))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ya existe el equipo')));
      else
      {
        $resultado = $this->equipos_m->insertar($nomequ);
        if ($resultado) 
          exit(json_encode(array('result'=>TRUE, 'mensaje'=>'Se registro correctamente !!!')));	
        else
          exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Error al insertar')));	
      }    
    }
    else
      redirect($this->url);
  }
 
  public function validar_pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
      exit(json_encode(array('result'=>TRUE, 'titulo'=>$this->titulo)));
    else
      redirect($this->url);
  }
   
  public function pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $data = array(
        'titulo'     =>   $this->titulo,
        'lis' => $this->equipos_m->listar());
        $this->crearPdf($this->titulo,'porlandscape',$this->url,$data);    
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
      $soporte = $this->equipos_m->actualizar($id);
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$soporte->ideequ,
          'dato_2'=>$soporte->nomequ,
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
      $ideequ = $this->input->post('dato_1',TRUE);
      $nomequ = $this->input->post('dato_2',TRUE);
             
      if (empty($nomequ))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un nombre')));
            
        $soporte = $this->equipos_m->grabar_actualizar($ideequ, $nomequ);
              
              
      if ($soporte) 
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
      $ideequ = $this->input->post('eliide',TRUE);
           
      if($this->equipos_m->eliminar_buscar_relacion($ideequ))
        exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
      else
      {
        $this->equipos_m->eliminar($ideequ);
        exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
      }
    }
    else
      redirect($this->url);
  }    
   
}
