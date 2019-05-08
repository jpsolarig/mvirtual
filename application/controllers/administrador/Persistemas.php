<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persistemas extends CMS_Controller 
{
  public function __construct() 
  {
    parent::__construct();
        
    $this->titulo = 'Sistemas';
        
    $this->nomsis = 'Administrador';
    $this->nommen = 'Permisos';
    $this->nomsubmen = 'Sistemas';
        
    $this->estsis = TRUE;
    $this->estmen = TRUE;
    $this->estsubmen = TRUE;
        
    $this->iderol = $this->session->userdata('iderol');
        
    $this->load->model('administrador/persistemas_m');
    $this->load->model('administrador/sistemas_m');
    $this->load->model('administrador/roles_m');
    $this->url = "administrador/persistemas/";
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
    $rol = $this->roles_m->listar();
    $selrol = $this->selected($rol);

    foreach ($selrol as $value) {
      if ($value->iderol === $valor)
        $value->sel = 'selected';
    }

    $sis = $this->sistemas_m->listar();
    $selsis = $this->selected($sis);

    foreach ($selsis as $value) {
      if ($value->idesis === $valor)
        $value->sel = 'selected';
    }
        
    if ($ide)
      exit(json_encode(array('result' => TRUE, 'ide' => $ide)));
    else {
      if ($valor == "T")
        $lista = $this->persistemas_m->listar();
      else
    
    $lista = $this->persistemas_m->listar_ide($valor);

    $this->data = array(
      'url' => $this->url,
      'titulo' => $this->titulo,
      'menus' => $menus,
      'submenus' => $submenus,
      'lis' => $lista,
      'selrol' => $selrol,
      'insselsis' => $selsis,
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
        'js/'.$this->url.'permisos_sistemas.js',
        'js/'.$this->url.'eliminar.js'),
        'csss' => array(
          'css/'.$this->url.'lista.css'), 
        );  
        /*        'jss' => array('js/lista1.js','js/exportar2.js','js/mensajes.js','js/insertar.js','js/actualizar1.js','js/eliminar.js','js/permisos_sistemas.js')
                    //'jss' => array('js/'.$this->url.'exportar.js','js/'.$this->url.'actualizar.js','js/'.$this->url.'colorp.js')
            );*/
        }
        if ($this->session->userdata('esta_conectado') && $sistema['estsis'] == TRUE && $controlador['estsubmen'] == TRUE)
            $this->load->view('plantilla', $this->data);
        else
            redirect('escritorio');
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
                        'lis' => $this->persistemas_m->listar_ide($iderol));
                  break;
                  case 99:
                     $data = array(
                        'titulo' => 'PERMISOS ' . strtoupper($this->titulo),
                        'lis' => $this->persistemas_m->listar());
                  break;
               }
               $i++;
            }
         $this->crearPdf($this->titulo, 'porlandscape', $this->url, $data);
      }
      else
         redirect($this->url);
   }

    public function insertar() {
        $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);

        if ($this->session->userdata('esta_conectado') && $controlador['perins'] == TRUE) {
            $idesis = $this->input->post('idesis', TRUE);
            $iderol = $this->input->post('iderol', TRUE);
            $estsis = FALSE;

            if (empty($idesis))
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un sistema')));
            if (empty($iderol))
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Por favor, seleccione un Rol')));


            if ($this->persistemas_m->insertar_buscar_sistema($idesis, $iderol)) {
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'Ya existe el permiso')));
            } else {
                if ($idesis == 1) {
                    exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede asignar este permiso')));
                } else {
                    $resultado = $this->persistemas_m->insertar($idesis, $iderol, $estsis);
                    if ($resultado)
                        exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se registro correctamente !!!')));
                    else
                        exit(json_encode(array('result' => FALSE, 'mensaje' => 'Error al insertar')));
                }
            }
        }
        else {
            redirect('administrador/sistemas');
        }
    }
    
     public function permisos() {
        $iderol = $this->input->post('iderol', TRUE);
        $idesis = $this->input->post('idesis', TRUE);
        $estsis = $this->input->post('estsis', TRUE);
        $permisos = $this->persistemas_m->permisos($iderol, $idesis, $estsis);

        if ($permisos)
            exit(json_encode(array(
                'result' => TRUE,
                'iderol' => $iderol,
                'idesis' => $idesis,
                'estsis' => $estsis,)));
    }
    
    public function eliminar() {
        $controlador = $this->permisos_controlador($this->nomsis, $this->nommen, $this->nomsubmen, $this->estsubmen, $this->iderol);
        if ($this->session->userdata('esta_conectado') && $controlador['pereli'] == TRUE) {
            $iderol = $this->input->post('eliide', TRUE);
            $idesis = $this->input->post('eliide2', TRUE);

            if ($iderol == 1 and $idesis == 1)
                exit(json_encode(array('result' => FALSE, 'mensaje' => 'No se puede eliminar')));
            else {
                $delete = $this->persistemas_m->eliminar($iderol, $idesis);
                exit(json_encode(array('result' => TRUE, 'mensaje' => 'Se elimino correctamente')));
            }
        }
        else
            redirect($this->url);
    }
    
    

}

/* Fin Usuarios */
/* Ubicacion: ./application/controllers/admin/Usuarios.php */
