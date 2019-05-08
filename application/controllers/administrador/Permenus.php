<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Permenus extends CMS_Controller {
  public function __construct() 
  {
    parent::__construct();
    $this->titulo = 'Menus';
    $this->nomsis = 'Administrador';
    $this->nommen = 'Permisos';
    $this->nomsubmen = 'Menus';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/permenus_m');
    $this->load->model('administrador/persistemas_m');
    $this->load->model('administrador/sistemas_m');
    $this->load->model('administrador/roles_m');
    $this->load->model('administrador/menus_m');
    $this->url = "administrador/permenus/";
  }
    
  public function index() 
  {
    $this->lista('T');
  }

  public function lista($valor) 
  {
    $sistema = $this->permisos_nombre_del_sistema($this->nomsis, $this->estsis, $this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis, $this->estmen, $this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis, $this->estsubmen, $this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

    $ide = $this->input->post('ide', TRUE);
      
    $rol = $this->roles_m->listar();
    $selrol = $this->selected($rol);

    foreach ($selrol as $value) {
      if ($value->iderol === $valor)
        $value->sel = 'selected';
    }
      
    $sis = $this->sistemas_m->listar();
    $selsis2 = $this->selected($sis);
     
    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
    else {
      if ($valor == "T")
        $lista = $this->permenus_m->listar();
      else
        $lista = $this->permenus_m->listar_ide($valor);
            
    $this->data = array(
      'url' => $this->url,
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $lista,
      'selrol' => $selrol,
      'selsis2' => $selsis2,
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
        'js/'.$this->url.'lista1.js',
        'js/'.$this->url.'lista3.js', 
        'js/'.$this->url.'llenar_menus.js',
        'js/'.$this->url.'insertar.js',
        'js/'.$this->url.'exportar2.js',
        'js/'.$this->url.'permisos_menus.js',
        'js/'.$this->url.'eliminar.js'),
        'csss' => array(
          'css/'.$this->url.'lista.css'), 
        );  
       
                
    if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE)
      $this->load->view('plantilla', $this->data);
    else
      redirect('escritorio');
    }
  }
    
  public function index2() 
  {
    $this->lista2('','');
  }
   
  public function lista2($valor,$valor2) 
  {
    $sistema = $this->permisos_nombre_del_sistema($this->nomsis, $this->estsis, $this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis, $this->estmen, $this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis, $this->estsubmen, $this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

    $ide = $this->input->post('ide', TRUE);
    $ide2 = $this->input->post('ide2', TRUE);
      
    $rol = $this->roles_m->listar();
    $selrol = $this->selected($rol);

    foreach ($selrol as $value) {
      if ($value->iderol === $valor)
        $value->sel = 'selected';
    }
      
    $sis = $this->sistemas_m->listar();
    $selsis2 = $this->selected($sis);
      
    foreach ($selsis2 as $value) {
      if ($value->idesis === $valor2)
        $value->sel = 'selected';
    }
      
    if($valor != 'T' && $valor2 != 'T')
    {    
      if ($ide)
        exit(json_encode(array('result' => TRUE, 'ide' => $ide, 'ide2' => $ide2)));
      else  
      {
        $lista = $this->permenus_m->listar_ide2($valor,$valor2);
        $this->data = array(
          'url' => $this->url,
          'titulo' => $this->titulo,
          'menus' => $menus,
          'submenus' => $submenus,
          'lis' => $lista,
          'selrol' => $selrol,
          'selsis2' => $selsis2,
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
            'js/'.$this->url.'lista1.js',
            'js/'.$this->url.'lista3.js',  
            'js/'.$this->url.'llenar_menus.js',                
            'js/'.$this->url.'insertar.js',
            'js/'.$this->url.'exportar2.js',
            'js/'.$this->url.'permisos_menus.js',      
            'js/'.$this->url.'eliminar.js'),
            'csss' => array(
              'css/'.$this->url.'lista.css'), 
            );
        if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE)
        {$this->load->view('plantilla', $this->data);}
        else
        {redirect('escritorio');}
      }
    }
    else {
      redirect($this->url);
    }
  }
  
  
  public function llenar_menus()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
    {
      $id = $this->input->post('id',TRUE);
      $modelos = $this->menus_m->listar_ide($id);
      $nommod[] = "<option value='0'>SELECCIONAR</option>";
      foreach($modelos as $m)
      {
        $nommod[] = "<option value=".$m -> idemen.">".$m -> nommen."</option>";
      }
                           
      if (empty($id)){exit(json_encode(array('result'=>FALSE, 'mensaje'=>'')));}
        else{exit(json_encode(array('result'=>TRUE, 'select'=>$nommod)));}
      }else{redirect($this->url);}
  } 
   
  public function insertar() 
  {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
    
    if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) {
            
      $iderol = $this->input->post('iderol', TRUE);
      $idesis = $this->input->post('idesis', TRUE);
      $idemen = $this->input->post('idemen', TRUE);
      $estmen = FALSE;

      if (empty($iderol))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un Rol')));
      if (empty($idesis))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un sistema')));
      if (empty($idemen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un menu')));

      if ($this->permenus_m->insertar_buscar_menu($iderol, $idesis, $idemen)) {
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el permiso')));
      } 
      else {
      
        if ($idesis == 1) {
          exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede asignar este permiso')));
        }  
        else {
          $resultado = $this->permenus_m->insertar($iderol,$idesis,$idemen,$estmen);
          if ($resultado)
            exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se registro correctamente !!!')));
          else
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Error al insertar')));
        }
      }
    }
    else {
      redirect($this->url);
    }
  } 
   
  public function validar_pdf() 
  {
    $iderol = $this->input->post('iderol', TRUE);

    if ($iderol)
      exit(json_encode(array('result' => TRUE, 'id' => $iderol, 'mensaje' => 'Se registro correctamente')));
    else
      exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione una marca')));
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
              'titulo' => 'PERMISOS '. strtoupper($this->titulo) . ' ' . $roles[$i]->nomrol,
              'lis' => $this->permenus_m->listar_ide($iderol));
          break;
          case 99:
            $data = array(
              'titulo' => 'PERMISOS ' . strtoupper($this->titulo),
              'lis' => $this->permenus_m->listar());
          break;
        }$i++;
      }
      $this->crearPdf($this->titulo, 'porlandscape', $this->url, $data);
    }
    else
      redirect($this->url);
  }
   
  public function permisos() {
    $iderol = $this->input->post('iderol', TRUE);
    $idesis = $this->input->post('idesis', TRUE);
    $idemen = $this->input->post('idemen', TRUE);
    $estmen = $this->input->post('estmen', TRUE);
    $permisos = $this->permenus_m->permisos($iderol,$idesis,$idemen,$estmen);

    if ($permisos)
      exit(json_encode(array(
        'result' => TRUE,
          'iderol' => $iderol,
          'idesis' => $idesis,
          'idemen' => $idemen,
          'estmen' => $estmen,)));
  }
   
  public function eliminar() {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) {
      $iderol = $this->input->post('eliide', TRUE);
      $idesis = $this->input->post('eliide2', TRUE);
      $idemen = $this->input->post('eliide3', TRUE);
            
      if ($iderol == 1 and $idesis == 1)
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede eliminar')));
      else {
        $delete = $this->permenus_m->eliminar($iderol, $idesis, $idemen);
        exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se elimino correctamente')));
      }
    }
    else
      redirect($this->url);
  }
    
    
}

/*


}



/* Fin Usuarios */
/* Ubicacion: ./application/controllers/admin/Usuarios.php */
