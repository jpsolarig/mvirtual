<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Escritorio extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->data['titulo'] = config_item('nombre_sitio');
    $this->data['jss'] = array(); 
    $this->data['csss'] = array(); 
  }
    
  public function index()
  {
    $url = 'escritorio/';
    $estsis = 1;
    $iderol = $this->session->userdata('iderol');
    $this->data['url'] = $url;
    $this->data['sistemas'] = $this->lista_sistemas_rol_estado($estsis,$iderol);
    if ($this->session->userdata('esta_conectado')) 
    {
      $this->load->view('escritorio', $this->data);
    }
    else
    {
      redirect('login/logout');
    }
  }	
}
