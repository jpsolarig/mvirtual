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

   
   public function validar_pdf()
  {
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
    if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
    {
      exit(json_encode(array('result'=>TRUE, 'titulo'=>strtolower($this->titulo))));
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
        'lis' => $this->iconos_m->listar(),
      );
      $this->crearPdf(strtolower($this->titulo),'porlandscape',$this->url,$data);    
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
      $sistemas = $this->iconos_m->actualizar($id);
              
      if ($id) 
        exit(json_encode(array(
          'result'=>TRUE,
          'dato_1'=>$sistemas->ideico,
          'dato_2'=>$sistemas->desico,
          'dato_3'=>$sistemas->nomico,
            
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
      $ideico = $this->input->post('dato_1',TRUE);
      $desico = $this->input->post('dato_2',TRUE);
      $nomico = $this->input->post('dato_3',TRUE);
      
      if (empty($desico))
        exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una descripcion')));
      $iconos = $this->iconos_m->grabar_actualizar($ideico,$desico,$nomico);
              
      if ($iconos) 
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
         $ideico = $this->input->post('eliide',TRUE);
            
         if($this->iconos_m->eliminar_buscar_relacion_sistemas($ideico))
            exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación en la tabla sistemas.')));
         else
         {
            if($this->iconos_m->eliminar_buscar_relacion_menus($ideico))
              exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación en la tabla menus.')));
            
            else 
            {
              if($this->iconos_m->eliminar_buscar_relacion_submenus($ideico))
                exit(json_encode(array('result'=>FALSE,'mensaje'=>'No se puede eliminar tiene una relación en la tabla submenus.')));
              else
              {  
                 $this->iconos_m->eliminar($ideico);
                  exit(json_encode(array('result'=>TRUE,'mensaje'=>'Se elimino correctamente')));
              }
            }  
         }  
        
      }
      else
         redirect($this->url);
   }    

}

