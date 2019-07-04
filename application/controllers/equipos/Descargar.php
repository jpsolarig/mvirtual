<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Descargar extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->nomsis = 'Equipos';
    $this->nommen = 'Backups';
    $this->nomsubmen = 'Descargar';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
  }
    
  public function index()
  {
     $sistema = $this->permisos_nombre_del_sistema($this->nomsis,$this->estsis,$this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis,$this->estmen,$this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis,$this->estsubmen,$this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    
    if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE) 
    {
      $db = $this->load->database('equipos', TRUE);
    $this->load->dbutil($db);                        
    $tablas = array('t_areas','t_ambientes','t_equipos');  
    $pre = array(                                       
      'tables'      => $tablas,   
      'format'        => 'zip',  
      'filename'    => 'equipos_backup.sql',    
      'newline'     => "\n",    
    );
    $backup = $this->dbutil->backup($pre);
    $db_name = 'jpsystemas_equipos_backup_'. date("Y-m-d-H-i-s") .'.zip';
    $this->load->helper('download');
    force_download($db_name, $backup);
    }  
    else
      redirect('escritorio');
  }
  
  
    
}