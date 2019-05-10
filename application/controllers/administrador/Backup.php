<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function grabar()
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
      //'add_drop'    => FALSE,                   //* QUITAR LA SENTENICA DROP TABLE
      //'add_insert'  => FALSE,                   //* QUITAR LOS DATOS INSERT
    );

    $backup = $this->dbutil->backup($pre); 
    $db_name = 'jpsystemas_administrador_backup_'. date("Y-m-d-H-i-s") .'.sql';
    $url = '../backup/';
    $this->createFolder(); 
    $save = $url.$db_name;
    $this->load->helper('file');
    write_file($save, $backup); 
    redirect("administrador/sistemas");
  }
    
  public function createFolder()
  {
    if(!is_dir("../backup"))
    {
      mkdir("../backup", 0777);
    }
  }
    
  public function descargar()
  {
    $db = $this->load->database('default', TRUE);
    $this->load->dbutil($db);                        
    $tablas = array('roles','usuarios','iconos','colores','sistemas','permisos_sistemas','menus','submenus','permisos_menus','permisos_submenus');  
    $pre = array(                                       
      'tables'      => $tablas,   
      'format'        => 'zip',  
      'filename'    => 'jpsystemas_administrador_backup.sql',    
      'newline'     => "\n",    
    );
    $backup = $this->dbutil->backup($pre);
    $db_name = 'jpsystemas_administrador_backup_'. date("Y-m-d-H-i-s") .'.zip';
    $this->load->helper('download');
    force_download($db_name, $backup);
  }
}
