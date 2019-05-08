<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CMS_Controller 
{
  public function __construct() 
  {
    parent::__construct();
    $this->titulo = 'Menus';
    $this->nomsis = 'Administrador';
    $this->nommen = 'Admin';
    $this->nomsubmen = 'Menus';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/menus_m');
    $this->url = "administrador/menus/";
  }
  
  public function index() {
    $this->lista('T');
  }

  public function lista($valor) 
  {
    $sistema = $this->permisos_nombre_del_sistema($this->nomsis, $this->estsis, $this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis, $this->estmen, $this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis, $this->estsubmen, $this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

    $ide = $this->input->post('ide', TRUE);
    $sis = $this->menus_m->listar_sistemas();
    $selsis = $this->selected($sis);
    
    $ico = $this->menus_m->listar_iconos(2);
    $selico = $this->selected($ico);

    foreach ($selsis as $value) {
      if ($value->idesis === $valor){$value->sel = 'selected';}
    }

    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
    else 
    {
      if ($valor == "T")
        $lista = $this->menus_m->listar();
      else
        $lista = $this->menus_m->listar_ide($valor);

      $this->data = array(
        'url' => $this->url,
        'titulo' => $this->titulo,
        'menus' => $menus,
        'submenus' => $submenus,
        'lis' => $lista,
        'selsis' => $selsis,
        'selico' => $selico,
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
          'js/'.$this->url.'insertar.js',
          'js/'.$this->url.'exportar2.js',
          'js/'.$this->url.'actualizar1.js',
          'js/'.$this->url.'eliminar.js'),
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
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

    if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
    {
      $idesis = $this->input->post('idesis', TRUE);
      $nommen = ucwords(strtolower($this->input->post('nommen', TRUE)));
      $desmen = $this->input->post('desmen', TRUE);
      $ideico = $this->input->post('ideico',TRUE);
      $ordmen = $this->input->post('ordmen', TRUE);
           
      if (empty($idesis))
        exit(json_encode(array('result' => FALSE, 'idesis' => $idesis, 'mensaje' => 'Por favor, seleccione un sistema')));
      if (empty($nommen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, ingrese un nombre del menu')));
      if (empty($desmen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, ingrese una descripción')));
      if (empty($ideico))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Por favor, ingrese un icono')));
      if (empty($ordmen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, ingrese un orden')));
           
      if ($this->menus_m->insertar_buscar_nombre($idesis, $nommen)) 
      {
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el menu')));
      } 
      else 
      {
        $resultado = $this->menus_m->insertar($idesis, $nommen, $desmen, $ordmen, $ideico);
        if ($resultado)
          exit(json_encode(array('result' => TRUE, 'idesis' => $idesis, 'mensaje' => 'Se registro correctamente !!!')));
        else
          exit(json_encode(array('result' => FALSE, 'mensaje' => 'Error al insertar')));
      }
    }
    else {
      redirect($this->url);
    }
  }

  public function validar_pdf() 
  {
    $idesis = $this->input->post('idesis', TRUE);

    if ($idesis)
      exit(json_encode(array('result' => TRUE, 'id' => $idesis, 'mensaje' => 'Se registro correctamente')));
    else
      exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione un Sistema')));
  }

  public function pdf($idesis) 
  {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $sistemas = $this->menus_m->listar_sistemas();
      $i = 0;
      for ($n = 1; $n <= count($sistemas); $n++) {
      switch ($idesis) {
        case $n:
          $data = array(
            'titulo' => 'LISTA DE ' . strtoupper($this->titulo) . ' ' . $sistemas[$i]->nomsis,
            'lis' => $this->menus_m->listar_ide($idesis));
        break;
        case 99:
          $data = array(
            'titulo' => 'LISTA DE ' . strtoupper($this->titulo),
            'lis' => $this->menus_m->listar());
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
      $menus = $this->menus_m->actualizar($id);
             
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$menus->idesis,
          'dato_2'=>$menus->idemen,
          'dato_3'=>$menus->nommen,
          'dato_4'=>$menus->desmen,
          'dato_5'=>$menus->ideico,
          'dato_6'=>$menus->ordmen,
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
      $idesis = $this->input->post('dato_1', TRUE);
      $idemen = $this->input->post('dato_2', TRUE);
      $nommen = $this->input->post('dato_3', TRUE);
      $desmen = $this->input->post('dato_4', TRUE);
      $ideico = $this->input->post('dato_5', TRUE);
      $ordmen = $this->input->post('dato_6', TRUE);

      if (empty($nommen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un menu')));
      if (empty($desmen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese una descripción')));
      if (empty($ideico))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un icono')));
      if (empty($ordmen))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un orden')));

      $menus = $this->menus_m->grabar_actualizar($idesis, $idemen, $nommen, $desmen, $ideico, $ordmen);

      if ($menus)
        exit(json_encode(array(
          'result' => TRUE,
          'idesis' => $idesis,
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
      if ($this->menus_m->eliminar_buscar_relacion($id))
        exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede eliminar tiene una relación.')));
      else {
        $delete = $this->menus_m->eliminar($id);
        exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se elimino correctamente')));
      }
    }
    else
      redirect($this->url);
  }
}
