<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CMS_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->data['titulo'] = config_item('nombre_login');
    $this->data['nombre_empresa'] = config_item('nombre_empresa');
    $this->data['errores'] = ' ';
    $this->load->model('login_m');
  }
   
  public function index()
  {
    if ($this->session->userdata('esta_conectado'))
      {redirect('escritorio');}
    else
      {$this->load->view('login', $this->data);}
  }	
   
  public function login()
  {
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
      
    $validaciones = $this->login_m->validaciones;
  	$this->form_validation->set_rules($validaciones);
      
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('login', $this->data);
    }
    else
    {
      $corusu = $this->input->post('corusu',TRUE);
      $pasusu = $this->input->post('pasusu',TRUE);
     
      $resultado = $this->login_m->validar_usuario($corusu,$pasusu);
      if ($resultado === TRUE) 
      {
        $sesion = array(
          'corusu' => $this->input->post('corusu'),
          'esta_conectado' => 1);
            
          $this->session->set_userdata($sesion);
          redirect('escritorio');	
      } 
      else
      {
        $this->data['errores'] = 'Correo y/o password Incorrecto';
        $this->load->view('login', $this->data);
      }
    }
  }   
   
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');	
  }   
}
