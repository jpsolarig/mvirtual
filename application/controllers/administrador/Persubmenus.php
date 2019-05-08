<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Persubmenus extends CMS_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->titulo = 'SubMenu';
    $this->nomsis = 'Administrador';
    $this->nommen = 'Permisos';
    $this->nomsubmen = 'Menus';
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
        
    $this->iderol = $this->session->userdata('iderol');
    $this->load->model('administrador/persubmenus_m');
    $this->load->model('administrador/sistemas_m');
    $this->load->model('administrador/roles_m');
    $this->load->model('administrador/menus_m');
    $this->load->model('administrador/submenus_m');
    $this->url = "administrador/persubmenus/";
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
        $lista = $this->persubmenus_m->listar();
      else
        $lista = $this->persubmenus_m->listar_ide($valor);
            
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
            'js/'.$this->url.'lista4.js',    
            'js/'.$this->url.'permisos.js',    
              //      'js/'.$this->url.'exportar2.js',
              //    'js/'.$this->url.'mensajes.js',
              //    'js/'.$this->url.'insertar.js',
              //    'js/'.$this->url.'actualizar1.js',
              //    'js/'.$this->url.'eliminar.js'
                
            ),
              'csss' => array(
          'css/'.$this->url.'lista.css'), 
        
            // 'jss' => array('js/lista1.js','js/lista3.js','js/exportar2.js','js/llenar_menus.js','js/llenar_submenus.js','js/mensajes.js','js/insertar.js','js/permisos_submenus.js','js/eliminar.js')
            //'jss' => array('js/lista1.js','js/lista2.js','js/exportar2.js','js/llenar_menus.js','js/mensajes.js','js/insertar.js','js/actualizar1.js','js/eliminar.js')
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
      
      if($valor2 != 'T')
      {
        $men = $this->menus_m->listar_ide($valor2);
        $selmen = $this->selected($men);
      }
      
         if($valor != 'T' && $valor2 != 'T')
         {    
            if ($ide)
                exit(json_encode(array('result' => TRUE, 'ide' => $ide, 'ide2' => $ide2)));
            else  
            {
                $lista = $this->persubmenus_m->listar_ide2($valor,$valor2);
       
                $this->data = array(
                    'url' => $this->url,
                    'titulo' => $this->titulo,
                    'menus' => $menus,
                    'submenus' => $submenus,
                    'lis' => $lista,
                    'selrol' => $selrol,
                    'selsis2' => $selsis2,
                    'selmen' => $selmen,
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
                        'js/'.$this->url.'permisos.js', 
                        'js/'.$this->url.'lista4.js',
                  //'js/'.$this->url.'exportar2.js',
                  //'js/'.$this->url.'mensajes.js',
                  //'js/'.$this->url.'insertar.js',
                  //'js/'.$this->url.'actualizar1.js',
                  //'js/'.$this->url.'eliminar.js'
                        ),
                      'csss' => array(
          'css/'.$this->url.'lista.css'), 
                    //'jss' => array('js/lista1.js','js/lista3.js','js/lista4.js','js/exportar2.js','js/llenar_menus.js','js/llenar_submenus.js','js/mensajes.js','js/insertar.js','js/permisos_submenus.js','js/eliminar.js'));
                    //'jss' => array('js/lista1.js','js/lista3.js','js/exportar2.js','js/llenar_menus.js','js/mensajes.js','js/insertar.js','js/actualizar1.js','js/eliminar.js')
                    );
                
            if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE)
                $this->load->view('plantilla', $this->data);
            else
                redirect('escritorio');
            }
         }
         else {
            redirect($this->url);
         }
   }
   
  public function index3() 
  {
    $this->lista3('','','');
  }
   
  public function lista3($valor,$valor2,$valor3) 
  {
      $sistema = $this->permisos_nombre_del_sistema($this->nomsis, $this->estsis, $this->iderol);
      $menus = $this->permisos_menus_del_sistemas($this->nomsis, $this->estmen, $this->iderol);
      $submenus = $this->permisos_submenus_del_sistema($this->nomsis, $this->estsubmen, $this->iderol);
      $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

      $ide = $this->input->post('ide', TRUE);
      $ide2 = $this->input->post('ide2', TRUE);
      $ide3 = $this->input->post('ide3', TRUE);
      
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
      
        if($valor3 != 'T')
        {
            $men = $this->menus_m->listar_ide($valor2);
            $selmen = $this->selected($men);
            
            foreach ($selmen as $value) {
                if ($value->idemen === $valor3)
                $value->sel = 'selected';
            }
        }
      
         if($valor != 'T' && $valor2 != 'T' && $valor3 != 'T' )
         {    
            if ($ide)
                exit(json_encode(array('result' => TRUE, 'ide' => $ide, 'ide2' => $ide2, 'ide3' => $ide3)));
            else  
            {
                $lista = $this->persubmenus_m->listar_ide3($valor,$valor2,$valor3);
       
                $this->data = array(
                    'url' => $this->url,
                    'titulo' => $this->titulo,
                    'menus' => $menus,
                    'submenus' => $submenus,
                    'lis' => $lista,
                    'selrol' => $selrol,
                    'selsis2' => $selsis2,
                    'selmen' => $selmen,
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
                        'js/'.$this->url.'permisos.js', 
                        'js/'.$this->url.'lista4.js',
                        ),
                    'csss' => array(
          'css/'.$this->url.'lista.css'), 
                    );
                    //'jss' => array('js/lista1.js','js/lista3.js','js/exportar2.js','js/llenar_menus.js','js/mensajes.js','js/insertar.js','js/actualizar1.js','js/eliminar.js'));
                
            if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE)
                $this->load->view('plantilla', $this->data);
            else
                redirect('escritorio');
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
                        'lis' => $this->persubmenus_m->listar_ide($iderol));
                  break;
                  case 99:
                     $data = array(
                        'titulo' => 'PERMISOS ' . strtoupper($this->titulo),
                        'lis' => $this->persubmenus_m->listar());
                  break;
               }
               $i++;
            }
         $this->crearPdf($this->titulo, 'porlandscape', $this->url, $data);
      }
      else
         redirect($this->url);
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
   
    public function llenar_submenus()
   {
      $controlador = $this->permisos_controlador($this->nomsis,$this->nommen,$this->nomsubmen,$this->estsubmen,$this->iderol);
        
      if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) 
      {
         $id = $this->input->post('id',TRUE);
         $id1 = $this->input->post('id1',TRUE);
         $modelos = $this->submenus_m->listar_ide2($id,$id1);
         $nommod[] = "<option value='0'>SELECCIONAR</option>";
         foreach($modelos as $m)
         {
          $nommod[] = "<option value=".$m -> idesubmen.">".$m -> nomsubmen."</option>";
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
            $idesubmen = $this->input->post('idesubmen', TRUE);
            

             if (empty($iderol))
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un Rol')));
            if (empty($idesis))
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un sistema')));
            if (empty($idemen))
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un menu')));
            if (empty($idesubmen))
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un sub menu')));



                if ($this->persubmenus_m->insertar_buscar_persubmenu($iderol, $idesis, $idemen, $idesubmen)) {
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el permiso')));
            } else {
                if ($idesis == 1) {
                    exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede asignar este permiso')));
                } else {
                    $resultado = $this->persubmenus_m->insertar($iderol,$idesis,$idemen,$idesubmen);
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
    
    public function permiso()
    {
       $iderol = $this->input->post('iderol',TRUE);
       $idesis = $this->input->post('idesis',TRUE);
       $idemen = $this->input->post('idemen',TRUE);
       $idesubmen = $this->input->post('idesubmen',TRUE);
       $estsubmen = $this->input->post('estsubmen',TRUE);
       $perimp = $this->input->post('perimp',TRUE);
       $perins = $this->input->post('perins',TRUE);
       $perexp = $this->input->post('perexp',TRUE);
       $peract = $this->input->post('peract',TRUE);
       $pereli = $this->input->post('pereli',TRUE);
       $permiso = $this->input->post('permiso',TRUE);
       
       $permisos = $this->persubmenus_m->permisos($iderol,$idesis,$idemen,$idesubmen,$estsubmen,$perimp,$perins,$perexp,$peract,$pereli,$permiso);
              
       if ($permisos) 
            exit(json_encode(array(
                'result'=>TRUE,
                
                )));	
    }
    
      public function eliminar() {
        $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
        if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) {
            $iderol = $this->input->post('eliide', TRUE);
            $idesis = $this->input->post('eliide2', TRUE);
            $idemen = $this->input->post('eliide3', TRUE);
            $idesubmen = $this->input->post('eliide4', TRUE);
            
            if ($iderol == 1 and $idesis == 1)
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede eliminar')));
            else {
                $delete = $this->persubmenus_m->eliminar($iderol, $idesis, $idemen, $idesubmen);
                exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se elimino correctamente')));
            }
        }
        else
            redirect($this->url);
    }
    
}

/* Fin Usuarios */
/* Ubicacion: ./application/controllers/admin/Usuarios.php */
