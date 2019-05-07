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
   
   
     
}

