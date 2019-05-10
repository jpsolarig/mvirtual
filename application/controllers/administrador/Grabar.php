<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Grabar extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->nomsis = 'Administrador';
    $this->nommen = 'Backup';
    $this->nomsubmen = 'Grabar';
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
      $db = $this->load->database('default', TRUE);
      $this->load->dbutil($db);   
      $tablas = array('roles','usuarios','iconos','colores','sistemas','permisos_sistemas','menus','submenus','permisos_menus','permisos_submenus'); 
      date_default_timezone_set("America/Lima");     
      $pre = array(                                 //* PREFERENCIAS DEL BACKUP
        'tables'      => $tablas,                   //* LISTA DE TABLAS PARA HACER BACKUP
        'ignore'      => array(''),                 //* LISTA DE TABLAS PARA OMITIR EN BACKUP
        'format'      => 'txt',                     //* FORMATO DE DESCARGA (zip, gzip, txt)
        'filename'    => 'soporte_backup.sql',      //* NOMBRE DEL ARCHIVO
        'newline'     => "\n",                      //* CARACTER DE NUEVA LINEA
        'add_drop'    => FALSE,                   //* QUITAR LA SENTENICA DROP TABLE
        'add_insert'  => FALSE,                   //* QUITAR LOS DATOS INSERT
      );

      $backup = $this->dbutil->backup($pre); 
      $db_name = 'jpsystemas_administrador_backup_'. date("Y-m-d-H-i-s") .'.sql';
      $url = '../backup/';
      $this->crearCarpetaBackup(); 
      $save = $url.$db_name;
      $this->load->helper('file');
      write_file($save, $backup); 
      redirect("administrador/sistemas");
    }  
    else
      redirect('escritorio');
  }
  
  public function crearCarpetaBackup()
  {
    if(!is_dir("../backup"))
    {
      mkdir("../backup", 0777);
    }
  }
    
}