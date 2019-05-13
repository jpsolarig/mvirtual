<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Documentos';
    $this->nomsis = 'Asistencias';
    $this->nommen = 'Personal';
    $this->nomsubmen = 'Documentos';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('asistencias/documentos_m');
    $this->url = "asistencias/documentos/";
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
      'lis' => $this->documentos_m->listar(),
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
 
 
}
