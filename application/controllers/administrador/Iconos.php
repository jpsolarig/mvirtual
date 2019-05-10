<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iconos extends CMS_Controller 
{
  public function __construct() 
  {
    parent::__construct();
    $this->titulo = 'Iconos';
      
    $this->nomsis = 'Administrador';
    $this->nommen = 'Diseños';
    $this->nomsubmen = 'Iconos';
      
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
      
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/iconos_m');
    $this->url = "administrador/iconos/";
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
      //$are = $this->areas_m->listar();
      //$are = $this->iconos_m->listar_categorias();
      //$selcat = $this->selected($are);

      //foreach ($selcat as $value) {
      //   if ($value->idecatico === $valor)
      //      $value->sel = 'selected';
      //}

      if ($ide)
         exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
      else {
         if ($valor == "T")
            $lista = $this->iconos_m->listar();
         else
            $lista = $this->iconos_m->listar_ide($valor);
            
         $this->data = array(
            'url' => $this->url,
            'titulo' => $this->titulo,
            'menus' => $menus,
            'submenus' => $submenus,
            'lis' => $lista,
            //'selcat' => $selcat,
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
        'js/'.$this->url.'exportar.js',
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
   }

   public function validar_pdf() 
   {
      $ideare = $this->input->post('ideare', TRUE);

      if ($ideare)
         exit(json_encode(array('result' => TRUE, 'id' => $ideare, 'mensaje' => 'Se registro correctamente')));
      else
         exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione una marca')));
   }

   public function pdf($ideare) 
   {
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
      if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
      {
         $areas = $this->areas_m->listar();
            $i = 0;
            for ($n = 1; $n <= count($areas); $n++) {
               switch ($ideare) {
                  case $n:
                     $data = array(
                        'titulo' => 'LISTA DE ' . strtoupper($this->titulo) . ' ' . $areas[$i]->nomare,
                        'ambientes' => $this->ambientes_m->listar_ide($ideare));
                  break;
                  case 99:
                     $data = array(
                        'titulo' => 'LISTA DE ' . strtoupper($this->titulo),
                        'ambientes' => $this->ambientes_m->listar());
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
         $desico = $this->input->post('desico', TRUE);
         $nomico = $this->input->post('nomico', TRUE);
         
         if (empty($desico))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese una descripcion')));
         if (empty($nomico))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un nombre')));
         
         
         if ($this->iconos_m->insertar_buscar_nombre($desico))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el icono')));
         else {
            $resultado = $this->iconos_m->insertar($desico, $nomico);
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
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
      if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) {
         $id = $this->input->post('id', TRUE);
         $ambientes = $this->ambientes_m->actualizar($id);

            if ($id)
               exit(json_encode(array(
                  'result' => TRUE,
                  'dato_1' => $ambientes->ideamb,
                  'dato_2' => $ambientes->ideare,
                  'dato_3' => $ambientes->nomamb,
                  'dato_4' => $ambientes->desamb,
                  'mensaje' => 'Se registro correctamente')));
      }
      else
         redirect($this->url);
   }
    
   
   public function actualizar() 
   {
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      if ($this->session->userdata('esta_conectado') && $controlador['peract'] == TRUE) 
      {
         $ideamb = $this->input->post('dato_1', TRUE);
         $ideare = $this->input->post('dato_2', TRUE);
         $nomamb = $this->input->post('dato_3', TRUE);
         $desamb = $this->input->post('dato_4', TRUE);

         if (empty($nomamb))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese un nombre de ambiente')));
         if (empty($desamb))
            exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ingrese una descripcion de ambiente')));
            
         $areas = $this->ambientes_m->grabar($ideamb,$ideare, $nomamb, $desamb);

         if ($areas)
            exit(json_encode(array(
               'result' => TRUE, 'ideare' => $ideare,
               'mensaje' => 'Se grabo correctamente')));
         else
            exit(json_encode(array(
               'mensaje' => 'Error al grabar')));
        }
        else
         redirect($this->url);
   }

   public function eliminar()
   {
      $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
      if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) 
      {
         $ideamb = $this->input->post('eliide',TRUE);
            
         if($this->ambientes_m->eliminar_buscar_relacion($ideamb))
            exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación.')));
         else
         {
            $this->ambientes_m->eliminar($ideamb);
            exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se registro correctamente')));
         }
      }
      else
         redirect($this->url);
   }    

}

