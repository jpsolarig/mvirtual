<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
    $this->db_e = $this->load->database('equipos', TRUE);
  }
    
  public function listar()
  {
    $this->db_e->select('ideequ,nomequ');
    $this->db_e->from('t_equipos');
    $this->db_e->order_by("nomequ", "asc");
    return $this->db_e->get()->result();     
  }
   
  public function insertar_buscar_nombre($nomequ) 
  {
    if (empty($nomequ))
      return FALSE;
    return $this->db_e->where(array('nomequ' => $nomequ))->get('t_equipos')->row();
  }    
    
  public function insertar($nomequ)
  {
    $query = array('nomequ'=>strtoupper($nomequ));
    $resultado = $this->db_e->insert('t_equipos', $query);
    if ($resultado)
      return true;
    return false;
  }
   
  public function actualizar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db_e->where(array('ideequ' => $id))->get('t_equipos')->row();
  }    
   
  public function grabar_actualizar($ideequ, $nomequ) {
    $query = array('nomequ'=>strtoupper($nomequ));
    return $this->db_e->where('ideequ', $ideequ)
                     ->update('t_equipos', $query);
  }
  
  public function eliminar_buscar_relacion($ideequ) 
  {
    if (empty($ideequ))
      return FALSE;
    return $this->db_e->where(array('ideequ' => $ideequ))->get('t_modelos_equipos')->row();
  }   
    
  public function eliminar($ideequ) 
  {
    if (empty($ideequ))
      return FALSE;
      return $this->db_e->where('ideequ',$ideequ)
    ->delete('t_equipos');
  }    
  
}