<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos_marcas extends CMS_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'Marcas';
    $this->nomsis = 'Equipos';
    $this->nommen = 'Fabricantes';
    $this->nomsubmen = 'Marcas';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('equipos/equipos_marcas_m');
    $this->url = "equipos/equipos_marcas/";
  }
   
  public function index()
  {
    $this->lista('T');
  }
   
  public function lista($valor)
  {
    $sistema = $this->permisos_nombre_del_sistema($this->nomsis,$this->estsis,$this->iderol);
    $menus = $this->permisos_menus_del_sistemas($this->nomsis,$this->estmen,$this->iderol);
    $submenus = $this->permisos_submenus_del_sistema($this->nomsis,$this->estsubmen,$this->iderol);
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
      
    $ide = $this->input->post('ide', TRUE);
    $equ = $this->equipos_marcas_m->listar_equipos();
    $selequ = $this->selected($equ);

    foreach ($selequ as $value) {
      if ($value->ideequ === $valor)
        $value->sel = 'selected';
    }

    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
    else {
      if ($valor == "T")
      $lista = $this->equipos_marcas_m->listar();
    else
      $lista = $this->equipos_marcas_m->listar_ide($valor);
            
    $this->data = array(
      'url' => $this->url,
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $lista,
      'selequ' => $selequ,
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
        'js/'.$this->url.'eliminar.js')
      );
                
      if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE)
        $this->load->view('plantilla', $this->data);
      else
        redirect('escritorio');
    }
  }
   
  public function validar_pdf() 
  {
    $ideequ = $this->input->post('ideequ', TRUE);

    if ($ideequ)
      exit(json_encode(array('result' => TRUE, 'id' => $ideequ, 'mensaje' => 'Se registro correctamente')));
    else
      exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione una equipo')));
  }

  public function pdf($ideequ) 
  {
    $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      $equipos = $this->equipos_marcas_m->listar_equipos();
      $i = 0;
      for ($n = 1; $n <= count($equipos); $n++) {
      switch ($ideequ) {
                  case $n:
                     $data = array(
                        'titulo' => 'LISTA DE ' . strtoupper($this->titulo) . ' ' . $equipos[$i]->nomequ,
                        'ambientes' => $this->equipos_marcas_m->listar_ide($ideequ));
                  break;
                  case 99:
                     $data = array(
                        'titulo' => 'LISTA DE ' . strtoupper($this->titulo),
                        'ambientes' => $this->equipos_marcas_m->listar());
                  break;
               }
               $i++;
            }
         $this->crearPdf($this->titulo, 'porlandscape', $this->url, $data);
      }
      else
         redirect($this->url);
   }
   
   public function insertar() 
   {
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

      if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) {
         $ideequ = $this->input->post('ideequ', TRUE);
         $nommar = $this->input->post('nommar', TRUE);
         
         if (empty($ideequ))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione un equipo')));
         if (empty($nommar))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese una marca')));
         if ($this->equipos_marcas_m->insertar_buscar_nombre($nommar,$ideequ))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe la marca')));
         else {
            $resultado = $this->equipos_marcas_m->insertar($ideequ,$nommar);
            if ($resultado)
               exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se registro correctamente !!!')));
            else
               exit(json_encode(array('result' => FALSE, 'mensaje' => 'Error al insertar')));
         }
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
         $marcas = $this->equipos_marcas_m->actualizar($id);
         if ($id) 
            exit(json_encode(array(
               'result'=>TRUE,
               'dato_1'=>$marcas->idemar,
               'dato_2'=>$marcas->nommar,
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
         $idemar = $this->input->post('dato_1',TRUE);
         $nommar = $this->input->post('dato_2',TRUE);
             
         if (empty($nommar))
            exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una marca')));
            
         $marcas = $this->equipos_marcas_m->grabar_actualizar($idemar, $nommar);
              
         if ($marcas) 
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
         $idemar = $this->input->post('eliide',TRUE);
            
         if($this->equipos_marcas_m->eliminar_buscar_relacion($idemar))
            exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
         else
         {
            $this->equipos_marcas_m->eliminar($idemar);
            exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
         }
      }
      else
      redirect($this->url);
   }    
   
   
}    