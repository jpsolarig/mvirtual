<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Roles extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Roles';
    $this->nomsis = 'Administrador';
    $this->nommen = 'Personas';
    $this->nomsubmen = 'Roles';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/roles_m');
    $this->url = "administrador/roles/";
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
            
      'lis' => $this->roles_m->listar(),
           
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
        'js/'.$this->url.'exportar1.js',
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
    
  public function insertar()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
    {
      $nomrol  = ucfirst(strtolower($this->input->post('nomrol',TRUE)));
      $desrol = ucfirst(strtolower($this->input->post('desrol',TRUE)));
      $ordrol = ucfirst(strtolower($this->input->post('ordrol',TRUE)));
            
      if (empty($nomrol))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un nombre de rol')));
      if (empty($desrol))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una descripción de rol')));
      if (empty($ordrol))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese una orden')));
           
      if($this->roles_m->insertar_buscar_nombre($nomrol))
      {
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ya existe el rol')));
      }
      else
      {
        $resultado = $this->roles_m->insertar($nomrol,$desrol,$ordrol);
      if ($resultado) 
        exit(json_encode(array('result'=>TRUE, 'mensaje'=>'Se registro correctamente !!!')));	
      else
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Error al insertar')));	
    }    
  }
  else
    redirect($this->url);
  }

  public function validar_pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      exit(json_encode(array('result'=>TRUE, 'titulo'=>$this->titulo)));
    }
    else
            redirect($this->url);
    }
    
  public function pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $data = array(
        'titulo' => $this->titulo,
        'lis' => $this->roles_m->listar(),);
        $this->crearPdf($this->titulo,'porlandscape',$this->url,$data);    
      }
    else
      redirect($this->url);
  }   
    
  public function validar_act()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
    {
      $id = $this->input->post('id',TRUE);
      $roles = $this->roles_m->actualizar($id);
              
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
            'dato_1'=>$roles->iderol,
            'dato_2'=>$roles->nomrol,
            'dato_3'=>$roles->desrol,
            'dato_4'=>$roles->ordrol,
            'mensaje'=>'Se registro correctamente')));
    }
    else
      redirect($this->url);
  } 
    
    public function actualizar()
    {
        $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
        {
            $iderol = $this->input->post('dato_1',TRUE);
            $nomrol = $this->input->post('dato_2',TRUE);
            $desrol = $this->input->post('dato_3',TRUE);
            $ordrol = $this->input->post('dato_4',TRUE);
            
            if (empty($nomrol))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un rol')));
            if (empty($desrol))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una descripción')));
            if (empty($ordrol))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un orden')));
            
            $roles = $this->roles_m->grabar_actualizar($iderol,$nomrol,$desrol, $ordrol);
              
            if ($roles) 
            exit(json_encode(array(
                'result'=>TRUE,
                'mensaje'=>'Se grabo correctamente')));
            else
                exit(json_encode(array(
                    'mensaje'=>'Error al grabar')));
        }
        else
        redirect($this->url);
    }
    
    public function eliminar()
    {
        $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) 
        {
            $id = $this->input->post('eliide',TRUE);
            
            if($this->roles_m->eliminar_buscar_relacion($id))
                exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
            else
            {
                $delete = $this->roles_m->eliminar($id);
                exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
            }
        }
        else
        redirect($this->url);
    }    
    
  
        
}
