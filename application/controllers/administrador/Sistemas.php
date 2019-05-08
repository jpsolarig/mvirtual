<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sistemas extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Sistemas';
    $this->nomsis = 'Administrador';
    $this->nommen = 'Admin';
    $this->nomsubmen = 'Sistemas';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/sistemas_m');
    $this->url = "administrador/sistemas/";
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
    $col = $this->sistemas_m->listar_colores();
    $selcol = $this->selected($col);
    $ico = $this->sistemas_m->listar_iconos();
    $selico = $this->selected($ico);
    $this->data = array(
      'url' => $this->url,
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $this->sistemas_m->listar(),
      'selcol' => $selcol,
      'selico' => $selico,
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
      $nomsis  = $this->input->post('nomsis',TRUE);
      $dessis = $this->input->post('dessis',TRUE);
      $this->urlsis = $this->input->post('urlsis',TRUE);
      $ordsis = $this->input->post('ordsis',TRUE);
      $idecol = $this->input->post('idecol',TRUE);
      $ideico = $this->input->post('ideico',TRUE);
            
      if (empty($nomsis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un sistema')));
      if (empty($dessis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una descripción')));
      if (empty($this->urlsis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una url')));
      if (empty($ordsis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una orden')));
      if (empty($idecol))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una color')));
      if (empty($ideico))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un icono')));
           
      if($this->sistemas_m->insertar_buscar_nombre($nomsis))
      {
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ya existe el sistema')));
      }
      else
      {
        $resultado = $this->sistemas_m->insertar($nomsis,$dessis,$this->urlsis,$ordsis,$idecol,$ideico);
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
    {
      exit(json_encode(array('result'=>TRUE, 'titulo'=>strtolower($this->titulo))));
    }
    else
      redirect($this->url);
  }
    
  public function pdf()
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
  
  public function validar_act()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
    {
      $id = $this->input->post('id',TRUE);
      $sistemas = $this->sistemas_m->actualizar($id);
              
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$sistemas->idesis,
          'dato_2'=>$sistemas->nomsis,
          'dato_3'=>$sistemas->dessis,
          'dato_4'=>$sistemas->urlsis,
          'dato_5'=>$sistemas->ordsis,
          'dato_6'=>$sistemas->idecol,
          'dato_7'=>$sistemas->ideico,
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
      $idesis = $this->input->post('dato_1',TRUE);
      $nomsis = $this->input->post('dato_2',TRUE);
      $dessis = $this->input->post('dato_3',TRUE);
      $urlsis = $this->input->post('dato_4',TRUE);
      $ordsis = $this->input->post('dato_5',TRUE);
      $idecol = $this->input->post('dato_6',TRUE);
      $ideico = $this->input->post('dato_7',TRUE);
            
      if (empty($dessis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una descripción')));
      if (empty($urlsis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una url')));
      if (empty($ordsis))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un orden')));
       if (empty($idecol))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una color')));
      if (empty($ideico))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un icono')));
            
      $sistemas = $this->sistemas_m->grabar_actualizar($idesis,$nomsis,$dessis, $urlsis, $ordsis, $idecol, $ideico);
              
      if ($sistemas) 
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
    /*
  public function eliminar()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) 
    {
      $id = $this->input->post('eliide',TRUE);
            
      if($this->sistemas_m->eliminar_buscar_relacion($id))
        exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
      else
      {
        $this->sistemas_m->eliminar($id);
        exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
      }
    }
    else
      redirect($this->url);
  }    
   * */
   
}
