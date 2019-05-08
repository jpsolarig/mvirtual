<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function listar()
  {
    $this->db->select('ideusu,nomusu,corusu,nomrol,pasusu,estusu');
    $this->db->from('usuarios');
    $this->db->join('roles', 'roles.iderol = usuarios.iderol');
    $this->db->order_by("nomrol", "asc");
    return $this->db->get()->result();     
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
  }
   
  public function listar_ide($iderol)
  {
    $this->db->select('ideusu,nomusu,corusu,nomrol,pasusu,estusu');
    $this->db->from('usuarios');
    $this->db->join('roles', 'roles.iderol = usuarios.iderol');
    $this->db->where('roles.iderol ='.$iderol);
    //$this->db->order_by('menus.ordmen', 'asc'); 
    return $this->db->get()->result();       
  }
    
  public function insertar_buscar_usuario_por_rol($iderol,$corusu) 
  {
    if (empty($iderol)&& empty($corusu))
      return FALSE;
    return $this->db->where(array('iderol' => $iderol, 'corusu' => $corusu))->get('usuarios')->row();
  }    
    
  public function insertar($iderol,$nomusu,$corusu,$pasusu,$estusu)
  {
    $query = array('iderol'=>$iderol,'nomusu'=>$nomusu,'corusu'=>$corusu,'pasusu'=>md5($pasusu),'estusu'=>$estusu);
    $resultado = $this->db->insert('usuarios', $query);
    if ($resultado)return true;
      return false;
  }
    
  public function buscar_estado($ideusu,$estusu) 
  {
    if (empty($ideusu)&& empty($estusu))
      return FALSE;
    return $this->db->where(array('ideusu' => $ideusu, 'estusu' => $estusu))->get('usuarios')->row();
  }    
  
  
  
  public function actualizar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where(array('ideusu' => $id))->get('usuarios')->row();
  }    
   
  public function grabar_actualizar($ideusu, $iderol, $nomusu, $corusu, $pasusu, $estusu) {

      $query = array(
         'ideusu'=>($ideusu),
         'iderol'=>($iderol),
         'nomusu'=>($nomusu),
         'corusu'=>($corusu),
         'pasusu'=>($pasusu),
         'estusu'=>($estusu)
        );
      return $this->db->where(array('ideusu' => $ideusu,'iderol' => $iderol,))
                        ->update('usuarios', $query);
   }

  public function grabar_clave($ideusu, $pasusu) {

      $query = array(
         'ideusu'=>($ideusu),
         'pasusu'=>md5($pasusu),
        
        );
      return $this->db->where(array('ideusu' => $ideusu))
                        ->update('usuarios', $query);
   }
   
 
  
  public function eliminar($id) 
  {
    if (empty($id))
      return FALSE;
      return $this->db->where('ideusu',$id)->delete('usuarios');
  }    
   
   
}