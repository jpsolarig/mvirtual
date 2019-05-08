<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Usuarios';
    $this->nomsis = 'Administrador';
    $this->nommen = 'Personas';
    $this->nomsubmen = 'Usuarios';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/usuarios_m');
    $this->load->model('administrador/roles_m');
    $this->url = "administrador/usuarios/";
  }
    
  public function index() {
    $this->lista('T');
  }
    
  public function lista($valor) {
    $sistema = $this->permisos_nombre_del_sistema($this->nomsis,$this->estsis,$this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis,$this->estmen,$this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis,$this->estsubmen,$this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    $ide = $this->input->post('ide',TRUE);
    $rol = $this->roles_m->listar();
    $selrol = $this->selected($rol);
        
    foreach ($selrol as $value) 
    {
      if ($value->iderol === $valor)
      $value->sel = 'selected';
    }
    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
    else {
      if ($valor == "T")
        $lista = $this->usuarios_m->listar();
      else
        $lista = $this->usuarios_m->listar_ide($valor);

      $this->data = array(
        'url' => $this->url,
        'titulo' => $this->titulo,
        'menus' => $menus,
        'submenus' => $submenus,
        'lis' => $lista,
        'selrol' => $selrol,
        'lista' => $this->url . 'lista',
        'insertar' => $this->url . 'insertar',
        'exportar' => $this->url . 'exportar',
        'actualizar' => $this->url . 'actualizar',
        'perimp' => $controlador['perimp'],
        'perins' => $controlador['perins'],
        'perexp' => $controlador['perexp'],
        'peract' => $controlador['peract'],
        'pereli' => $controlador['pereli'],
        'jss' => array(
          'js/'.$this->url.'lista.js',
          'js/'.$this->url.'insertar.js',
          'js/'.$this->url.'exportar.js',
          'js/'.$this->url.'actualizar.js',
          'js/'.$this->url.'eliminar.js',
            'js/'.$this->url.'clave.js'),
          
        'csss' => array(
          'css/'.$this->url.'lista.css'),  
        );
    }
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
      $iderol  = $this->input->post('iderol',TRUE);
      $nomusu  = $this->input->post('nomusu',TRUE);
      $corusu = strtolower($this->input->post('corusu',TRUE));
      $pasusu = $this->input->post('pasusu',TRUE);
      $estusu = 0;
        
      $correo = $this->correo_valido($corusu);
            
      if (empty($iderol))
        exit(json_encode(array('result'=>FALSE, 'iderol'=>$iderol, 'mensaje'=>'Por favor, seleccione un rol')));
      if (empty($nomusu))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un nombre')));
      if (empty($corusu))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un correo')));
      if ($correo == FALSE)
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un correo valido')));
      if (empty($pasusu))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un password')));
            
      if($this->usuarios_m->insertar_buscar_usuario_por_rol($iderol,$corusu))
      {
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ya existe el usuario')));
      }
      else
      {
        $resultado = $this->usuarios_m->insertar($iderol,$nomusu,$corusu,$pasusu,$estusu);
        if ($resultado) 
          exit(json_encode(array('result'=>TRUE, 'iderol'=>$iderol, 'mensaje'=>'Se registro correctamente !!!')));	
        else
          exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Error al insertar')));	
      }    
    }
    else
      redirect($this->url);
  }          
    
  public function validar_pdf() 
  {
    $iderol = $this->input->post('iderol', TRUE);

    if ($iderol)
      exit(json_encode(array('result' => TRUE, 'id' => $iderol, 'mensaje' => 'Se registro correctamente')));
    else
      exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione un rol')));
  }

  public function pdf($iderol) 
  {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $roles = $this->roles_m->listar();
      $i = 0;
      for ($n = 1; $n <= count($roles); $n++) {
        switch ($iderol) {
          case $n:
            $data = array(
              'titulo' => 'LISTA DE ' . strtoupper($this->titulo) . ' ' . $roles[$i]->nomrol,
              'lis' => $this->usuarios_m->listar_ide($iderol));
          break;
          case 99:
            $data = array(
              'titulo' => 'LISTA DE ' . strtoupper($this->titulo),
              'lis' => $this->usuarios_m->listar());
          break;
        }
        $i++;
      }
      $this->crearPdf($this->titulo, 'landscape', $this->url, $data);
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
      $usuarios = $this->usuarios_m->actualizar($id);
             
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$usuarios->ideusu,
          'dato_2'=>$usuarios->iderol,
          'dato_3'=>$usuarios->nomusu,
          'dato_4'=>$usuarios->corusu,
          'dato_5'=>$usuarios->pasusu,
          'dato_6'=>$usuarios->estusu,
          'mensaje'=>'Se registro correctamente')));
    }
    else
      redirect($this->url);
  } 
   
  public function actualizar() 
  {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
    if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
    {
      $ideusu = $this->input->post('dato_1', TRUE);
      $iderol = $this->input->post('dato_2', TRUE);
      $nomusu = $this->input->post('dato_3', TRUE);
      $corusu = $this->input->post('dato_4', TRUE);
      $pasusu = $this->input->post('dato_5', TRUE);
      $estusu = $this->input->post('dato_6', TRUE);

      if (empty($nomusu))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un nombre')));
      if (empty($corusu))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un correo')));
      
      $usuario = $this->usuarios_m->grabar_actualizar($ideusu, $iderol, $nomusu, $corusu, $pasusu, $estusu);

      if ($usuario)
        exit(json_encode(array(
          'result' => TRUE,
          'ideusu' => $ideusu,
          'mensaje' => 'Se grabo correctamente')));
      else
        exit(json_encode(array(
          'mensaje' => 'Error al grabar')));
    }
    else
      redirect($this->url);
  }
  
  public function validar_clave()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
    {
      $id = $this->input->post('id',TRUE);
      $usuarios = $this->usuarios_m->actualizar($id);
             
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$usuarios->ideusu,
          'dato_2'=>$usuarios->pasusu,
          'mensaje'=>'Se registro correctamente')));
    }
    else
      redirect($this->url);
  } 
  
   public function grabar_clave() 
  {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
    if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
    {
      $ideusu = $this->input->post('dato_1', TRUE);
      $pasusu = $this->input->post('dato_2', TRUE);
      
      if (empty($pasusu))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese una contraseña')));
      
      $usuario = $this->usuarios_m->grabar_clave($ideusu, $pasusu);

      if ($usuario)
        exit(json_encode(array(
          'result' => TRUE,
          'ideusu' => $ideusu,
          'mensaje' => 'Se grabo correctamente')));
      else
        exit(json_encode(array(
          'mensaje' => 'Error al grabar')));
    }
    else
      redirect($this->url);
  } 
  
  public function eliminar() {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) {
      $id = $this->input->post('eliide', TRUE);
      //if ($this->usuarios_m->eliminar_buscar_relacion($id))
      //  exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede eliminar tiene una relación.')));
      //else {
        $delete = $this->usuarios_m->eliminar($id);
        exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se elimino correctamente')));
      //}
    }
    else
      redirect($this->url);
  }
  
  
  
}

/* Fin Usuarios */
/* Ubicacion: ./application/controllers/admin/Usuarios.php */
