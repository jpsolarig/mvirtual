<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model
{
  protected $_tabla = 'usuarios';
  protected $_order_by = 'name';
  public $validaciones = array(
	  'corusu' => array(
    'field' => 'corusu', 
		'label' => 'Correo Electronico', 
		'rules' => 'trim|required|valid_email',
      'errors' => array(
        'required' => 'Por favor, ingrese un correos.',
        'valid_email' => 'Por favor, ingrese un correo valido.',
      ),
		), 
  	'pasusu' => array(
			'field' => 'pasusu', 
			'label' => 'Password', 
			'rules' => 'trim|required',
        'errors' => array(
          'required' => 'Por favor, ingrese un password.'              
        ), 
		)
	);

  function __construct ()
  {
    parent::__construct();
  }
   
  public function validar_usuario($corusu,$pasusu)	
  {	
    $this->db->where('corusu', $corusu);
    $this->db->where('pasusu', md5($pasusu));
    $this->db->where('estusu', 1);
    $this->db->join('roles', 'roles.iderol = usuarios.iderol');
    $query = $this->db->get($this->_tabla)->row_array();
        
    if (isset($query))
    {
      $this->session->set_userdata('iderol', $query['iderol']);
      $this->session->set_userdata('nomrol', $query['nomrol']); 
      $this->session->set_userdata('nomusu', $query['nomusu']); 
          
      return TRUE;
    }
    else
    {
      return FALSE;
    }
          
         
       //echo '<pre>'; print_r($query); exit;
         
    } 
}