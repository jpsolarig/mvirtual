<?php
class CMS_Controller extends CI_Controller
{
  public $data = array();
	   
  function __construct() 
  {
    parent::__construct();
    $this->data['errors'] = array();
    $this->data['nombre_sitio'] = config_item('nombre_sitio');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
  }
   
  /*****##### PERMISOS #####*****/
  public function lista_sistemas_rol_estado($estsis,$iderol)
  {
    $this->load->model('administrador/permisos_m');
    return $this->permisos_m->lista_sistemas_rol_estado($estsis,$iderol);
  }        
   
  public function permisos_nombre_del_sistema($nomsis,$estsis,$iderol)
  {
    $this->load->model('administrador/permisos_m');
    return $this->permisos_m->permisos_nombre_del_sistema($nomsis,$estsis,$iderol);
  }    
     
  public function permisos_menus_del_sistemas($nomsis,$estmen,$iderol)
  {
    $this->load->model('administrador/permisos_m'); 
    return $this->permisos_m->permisos_menus_del_sistemas($nomsis,$estmen,$iderol);
  }
    
  public function permisos_submenus_del_sistema($nomsis,$estsubmen,$iderol)
  {
    $this->load->model('administrador/permisos_m'); 
    return $this->permisos_m->permisos_submenus($nomsis,$estsubmen,$iderol);
  }
        
  public function permisos_controlador($nomsis,$nommen,$nomsubmen,$estsubmen,$iderol)
  {
    $this->load->model('administrador/permisos_m'); 
    return $this->permisos_m->permisos_controlador($nomsis,$nommen,$nomsubmen,$estsubmen,$iderol);
  }
  /*****##### FIN PERMISOS #####*****/
     
  public function selected($objeto)
  {
    $objeto = json_decode(json_encode($objeto), true);
    for ($i = 0; $i <= count($objeto)-1; $i++) 
    {
      $objeto[$i]['sel'] = '';
    } 
       
    $objeto = json_decode(json_encode($objeto));
      return $objeto;
  }          
     
     
}

