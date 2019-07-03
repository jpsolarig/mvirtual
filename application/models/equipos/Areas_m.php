<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
    $this->db_e = $this->load->database('equipos', TRUE); 
  }
    
  public function listar()
  {
    $this->db_e->select('ideare,desare');
    $this->db_e->from('t_areas');
    //$this->db_p->order_by("ordsis", "asc");
    return $this->db_e->get()->result();     
  }
   
  public function insertar_buscar_nombre($desare) 
  {
    if (empty($desare))
      return FALSE;
    return $this->db_e->where(array('desare' => $desare))->get('t_areas')->row();
  }    
    
  public function insertar($desare)
  {
    $query = array('desare'=>strtoupper($desare));
        
    $resultado = $this->db_e->insert('t_areas', $query);
      if ($resultado)
        return true;
      return false;
  }
  
  /*  
  public function actualizar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db_e->where(array('ideare' => $id))->get('t_areas')->row();
  }    
    
  public function grabar_actualizar($ideare, $nomare) {
    $query = array('nomare'=>strtoupper($nomare));
    return $this->db_e->where('ideare', $ideare)
                     ->update('t_areas', $query);
  }
   
  public function eliminar_buscar_relacion($ideare) 
  {
    if (empty($ideare))
      return FALSE;
    return $this->db_e->where(array('ideare' => $ideare))->get('t_ambientes')->row();
  }   
    
  public function eliminar($ideare) 
  {
    if (empty($ideare))
      return FALSE;
    return $this->db_e->where('ideare',$ideare)
      ->delete('t_areas');
  }    
   * 
   */
}