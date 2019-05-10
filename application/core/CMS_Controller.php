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
   
  
   /*****##### SELECIONAR #####*****/
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
  
  /*****##### CERAR PDF #####*****/
  public function crearPdf($titulo,$direccion,$url,$data)
  {
    $this->load->library('html2pdf');
    $this->createFolder();                      
        
    $this->html2pdf->folder('./pdf/');          
    $this->html2pdf->filename($titulo.'.pdf');     
    $this->html2pdf->paper('a4', $direccion);   
    $this->html2pdf->html(utf8_decode($this->load->view($url.'/pdf', $data, true)));
    if($this->html2pdf->create('save')) 
    {
      $this->show($titulo);
                //$this->download($titulo);
    }
  }

  public function createFolder()
  {
    if(!is_dir("./pdf"))
    {
      mkdir("./pdf", 0777);
    }
  }
    
    
    public function show($titulo)
    {
        redirect(base_url("/pdf/".$titulo.".pdf"));
        //$route = base_url("/pdf/".$titulo.".pdf"); 
        // header('Content-type: application/pdf'); 
        // readfile($route);
    }        
    
     public function correo_valido($correo)
    {
        $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if(preg_match($Sintaxis,$correo))
            return true;
        else
            return false;
    }
    
    public function download($titulo)
    {
        $name = strtolower($titulo.".pdf");
        $route = base_url("/pdf/".$name); 
        header('Cache-Control: public'); 
        header('Content-Description: File Transfer'); 
        header('Content-disposition: attachment; filename='.basename($route)); 
        header('Content-Type: application/pdf'); 
        header('Content-Transfer-Encoding: binary'); 
        header('Content-Length: '. filesize($route)); 
        readfile($route);
    }       
    
    /*
    
    
    
    
    
    /*
    public function show($titulo)
    {
        if(is_dir("./pdf"))
        {
            $name = $titulo.".pdf";
            $route = base_url("pdf/"); 
            $data = file_get_contents($route.$name); 
            force_download($name,$data); 
            
            //$route = base_url("pdf/".$titulo.".pdf"); 
        //    if(file_exists("./pdf/".$titulo.".pdf"))
        //    {
               // header('Content-type: application/pdf'); 
                //readfile($route);
        //    }
        }
    }
     * 
     * 
     */
   
   
     
}

