<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Areas';
    $this->nomsis = 'equipos';
    $this->nommen = 'Lugares';
    $this->nomsubmen = 'Areas';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('equipos/areas_m');
    $this->url = "equipos/areas/"; 
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
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $this->areas_m->listar(),
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
      $desare  = $this->input->post('desare',TRUE);
            
      if (empty($desare))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una descripcón de área')));}
      
      if($this->areas_m->insertar_buscar_nombre($desare))
          {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ya existe el área')));}
      else
      {
        $resultado = $this->areas_m->insertar($desare);
        if ($resultado){exit(json_encode(array('result'=>TRUE, 'mensaje'=>'Se registro correctamente')));}
        else { exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Error al insertar')));}
      }    
    }
    else
      redirect($this->url);
  }
  
 
  public function validar_pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      exit(json_encode(array('result'=>TRUE, 'titulo'=>strtolower($this->titulo))));
    }
    else { redirect($this->url); }
  }
    
  public function pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $data = array(
        'titulo'     =>   $this->titulo,
        'lis' => $this->areas_m->listar(),
      );
      $this->crearPdf(strtolower($this->titulo),'porlandscape',$this->url,$data);    
    }
    else { redirect($this->url); }
  }   
  /*
  * public function pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $data = array(
        'titulo' => $this->titulo,
        'lis' => $this->sistemas_m->listar(),
      );
      $this->crearPdf(strtolower($this->titulo),'landscape',$this->url,$data);    
    }
    else
      redirect($this->url);
  }   
  * 
  *   
  * 
  * 
  * 
  */
  /*
  public function validar_act()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
    {
      $id = $this->input->post('id',TRUE);
      $areas = $this->areas_m->actualizar($id);
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$areas->ideare,
          'dato_2'=>$areas->nomare,
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
      $ideare = $this->input->post('dato_1',TRUE);
      $nomare = $this->input->post('dato_2',TRUE);
           
      if (empty($nomare))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una área')));
           
      $areas = $this->areas_m->grabar_actualizar($ideare, $nomare);
              
      if ($areas) 
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
      $ideare = $this->input->post('eliide',TRUE);
            
      if($this->areas_m->eliminar_buscar_relacion($ideare))
        exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
      else
      {
        $this->areas_m->eliminar($ideare);
        exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
      }
    }
    else
      redirect($this->url);
  } 
*/
}
