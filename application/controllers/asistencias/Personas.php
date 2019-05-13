<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Personas extends CMS_Controller 
{
  public function __construct() 
  {
    parent::__construct();
    $this->titulo = 'Personas';
    $this->nomsis = 'Asistencias';
    $this->nommen = 'Personal';
    $this->nomsubmen = 'Personas';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
    $this->iderol = $this->session->userdata('iderol');
    //$this->load->model('administrador/sistemas_m');
    //$this->load->model('administrador/menus_m');
    //$this->load->model('administrador/submenus_m');
    
    $this->load->model('asistencias/personas_m');
    
    $this->url = "asistencias/personas/";
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
      
    $are = $this->personas_m->listar_areas();
    $selare = $this->selected($are);
    
    
    foreach ($selare as $value) {
      if ($value->ideare === $valor)
        $value->sel = 'selected';
    }
    
    /*
    $ico = $this->submenus_m->listar_iconos();
    $selico = $this->selected($ico);
    */
    
    /*
    $selmen = NULL;
    $valor2 = NULL;
      
    if($valor != 'T')
    {
      $men = $this->submenus_m->listar_menus_ide($valor);
      $selmen = $this->selected($men);

      $valor2 === 'T'; 
        
      foreach ($selmen as $value) {
        if ($value->idemen === $valor2)
          $value->sel = 'selected';
      }
    }  
     */ 
     
     
    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
    else {
      if ($valor == "T")
        $lista = $this->personas_m->listar();
      else
        $lista = $this->personas_m->listar_ide($valor);
            
      $this->data = array(
        'url' => $this->url,
        'titulo' => $this->titulo,
        'menus' => $menus,
        'submenus' => $submenus,
        'lis' => $lista,
        'selare' => $selare,
        //'selmen' => $selmen,
        //'selico' => $selico,
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
          'js/'.$this->url.'lista2.js',  
          'js/'.$this->url.'llenar_menus.js',  
          'js/'.$this->url.'insertar.js',
          'js/'.$this->url.'exportar2.js',
          'js/'.$this->url.'actualizar1.js',
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
      
      
    $sis = $this->sistemas_m->listar();
    $selsis = $this->selected($sis);

    foreach ($selsis as $value) {
      if ($value->idesis === $valor)
        $value->sel = 'selected';
    }
      
    $men = $this->menus_m->listar_ide($valor);
    $selmen = $this->selected($men);
    
    $ico = $this->submenus_m->listar_iconos(3);
    $selico = $this->selected($ico);
        
    foreach ($selmen as $value) {
      if ($value->idemen === $valor2)
        $value->sel = 'selected';
    }
      
    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide, 'ide2' => $ide2)));
    else {
      
     
      
      $lista = $this->submenus_m->listar_ide2($valor,$valor2);
            
    $this->data = array(
      'url' => $this->url,
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $lista,
      'selsis' => $selsis,
      'selmen' => $selmen,
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
          'js/'.$this->url.'lista2.js',  
          'js/'.$this->url.'llenar_menus.js',  
          'js/'.$this->url.'insertar.js',
          'js/'.$this->url.'exportar2.js',
          'js/'.$this->url.'actualizar1.js',
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
    $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
    if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
    {
      $idesis  = $this->input->post('idesis',TRUE);
      $idemen  = $this->input->post('idemen',TRUE);
      $nomsubmen  = $this->input->post('nomsubmen',TRUE);
      $dessubmen  = $this->input->post('dessubmen',TRUE);
      $urlsubmen  = $this->input->post('urlsubmen',TRUE);
      $ideico = $this->input->post('ideico',TRUE);
      $ordsubmen  = $this->input->post('ordsubmen',TRUE);
            
      if (empty($idesis))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Seleccione un sistema')));}
      if (empty($idemen))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Seleccione un menu')));}
      if (empty($nomsubmen))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un nombre del submenu')));}
      if (empty($dessubmen))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un descripcion del submenu')));}
      if (empty($urlsubmen))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un url del submenu')));}
      if (empty($ideico))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un icono')));}  
      if (empty($ordsubmen))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un orden del submenu')));}
      if($this->submenus_m->insertar_buscar_nombre($idesis,$idemen,$nomsubmen))
        {exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ya existe el submenu')));}
      else
      {
        $resultado = $this->submenus_m->insertar($idesis,$idemen,$nomsubmen,$dessubmen,$urlsubmen,$ideico,$ordsubmen);
        if ($resultado) 
        { exit(json_encode(array('result'=>TRUE, 'mensaje'=>'Se registro correctamente !!!')));}
        else
        { exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Error al insertar')));}
      }    
    }
    else
    {redirect($this->url);}
  } 
 
    public function validar_pdf() 
    {
      $idesis = $this->input->post('idesis', TRUE);
      
      
      if ($idesis)
         exit(json_encode(array('result' => TRUE, 'id' => $idesis, 'mensaje' => 'Se registro correctamente')));
      else
         exit(json_encode(array('result' => FALSE, 'mensaje' => 'Seleccione un rol')));
    }

    
    
   public function pdf($idesis) 
   {
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
      
      if ($this->session->userdata('esta_conectado') && $controlador['perexp'] == TRUE) 
      {
         $sistemas = $this->sistemas_m->listar();
            $i = 0;
            for ($n = 1; $n <= count($sistemas); $n++) {
               switch ($idesis) {
                  case $n:
                     $data = array(
                        'titulo' => 'LISTA DE ' . strtoupper($this->titulo) . ' ' . $sistemas[$i]->nomsis,
                        'lis' => $this->submenus_m->listar_ide($idesis));
                  break;
                  case 99:
                     $data = array(
                        'titulo' => 'LISTA DE ' . strtoupper($this->titulo),
                        'lis' => $this->submenus_m->listar());
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
            $submenus = $this->submenus_m->actualizar($id);
              
            if ($id) 
            exit(json_encode(array(
                'result'=>TRUE,
                'dato_1'=>$submenus->idesis,
                'dato_2'=>$submenus->idemen,
                'dato_3'=>$submenus->idesubmen,
                'dato_4'=>$submenus->nomsubmen,
                'dato_5'=>$submenus->dessubmen,
                'dato_6'=>$submenus->urlsubmen,
                'dato_7'=>$submenus->ideico,
                'dato_8'=>$submenus->ordsubmen,
                'mensaje'=>'Se actualizo correctamente')));
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
         $idesubmen = $this->input->post('dato_3',TRUE);
         $nomsubmen = $this->input->post('dato_4', TRUE);
         $dessubmen = $this->input->post('dato_5', TRUE);
         $urlsubmen = $this->input->post('dato_6', TRUE);
         $icosubmen = $this->input->post('dato_7', TRUE);
         $ordsubmen = $this->input->post('dato_8', TRUE);
         
       
            if (empty($nomsubmen))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un nombre')));
            if (empty($dessubmen))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una descripción')));
            if (empty($urlsubmen))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese una url')));
            if (empty($icosubmen))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un icono'))); 
            if (empty($ordsubmen))
                exit(json_encode(array('result'=>FALSE, 'mensaje'=>'Ingrese un orden')));

         $submenus = $this->submenus_m->grabar_actualizar($idesis,$idemen,$idesubmen,$nomsubmen,$dessubmen,$urlsubmen,$icosubmen,$ordsubmen);

         if ($submenus)
            exit(json_encode(array(
               'result' => TRUE,'mensaje' => 'Se grabo correctamente')));
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
         

            if ($this->submenus_m->eliminar_buscar_relacion($id))
               exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede eliminar tiene una relación.')));
            else {
               $delete = $this->submenus_m->eliminar($id);
               exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se elimino correctamente')));
            }
      }
      else
         redirect($this->url);
   }
    
    
    
    }

    /* Fin Usuarios */
    /* Ubicacion: ./application/controllers/admin/Usuarios.php */

    
