<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ambientes_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
    $this->db_e = $this->load->database('equipos', TRUE);
  }

  public function listar()
  {
    $this->db_e->select('ideamb,desare,nomamb,desamb');
    $this->db_e->from('t_ambientes');
    $this->db_e->join('t_areas', 't_areas.ideare = t_ambientes.ideare');
    $this->db_e->order_by("t_ambientes.nomamb", "asc"); 
    return $this->db_e->get()->result();     
  }
    
  public function listar_areas()
  {
    $this->db_e->select('ideare,desare');
    $this->db_e->from('t_areas');
    return $this->db_e->get()->result();     
  }
   
  public function listar_ide($ideare)
  {
    $this->db_e->select('ideamb,desare,nomamb,desamb');
    $this->db_e->from('t_ambientes');
    $this->db_e->join('t_areas', 't_areas.ideare = t_ambientes.ideare');
    $this->db_e->where('t_areas.ideare ='.$ideare);
    $this->db_e->order_by('t_ambientes.nomamb', 'asc'); 
    return $this->db_e->get()->result();       
  }
  /*
    
   
  public function insertar_buscar_nombre($nomamb) 
  {
    if (empty($nomamb))
      return FALSE;
    return $this->db_e->where(array('nomamb' => $nomamb))->get('t_ambientes')->row();
  }   
  
  public function insertar($ideare,$nomamb,$desamb)
  {
    $query = array(
      'ideare'=>$ideare,
      'nomamb'=>strtoupper($nomamb),
      'desamb'=>strtoupper($desamb));
       
    $resultado = $this->db_e->insert('t_ambientes', $query);
    if ($resultado)
      return true;
    return false;
  }        
  
  public function actualizar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db_e->where(array('ideamb' => $id))->get('t_ambientes')->row();
  }    
  
  public function grabar($ideamb,$ideare,$nomamb,$desamb) 
  {
    $query = array(
      'ideare'=>$ideare,
      'nomamb'=>strtoupper($nomamb),
      'desamb'=>strtoupper($desamb));
    return $this->db_e->where(array('ideamb' => $ideamb))
      ->update('t_ambientes', $query);
  }
  
  public function eliminar_buscar_relacion($ideamb) 
  {
    if (empty($ideamb))
      return FALSE;
    return $this->db_e->where(array('ideamb' => $ideamb))->get('t_pcs')->row();
  }
  
  public function eliminar($ideamb) 
  {
    if (empty($ideamb))
      return FALSE;
    return $this->db_e->where('ideamb',$ideamb)
      ->delete('t_ambientes');
  }    
  
  /*
   public function insertar_llenar_ambiente($ideare)
   {
      $this->db_e->select('ideamb,nomamb');
      $this->db_e->from('t_ambientes');
      $this->db_e->join('t_areas', 't_areas.ideare = t_ambientes.ideare');
      $this->db_e->where('t_areas.ideare ='.$ideare);
      $this->db_e->order_by('t_ambientes.nomamb', 'asc'); 
      return $this->db_e->get()->result();       
   }
   
   
  
 
   
  
    
  
   
  
   
  
   
   public function listar_ambientes($id)
   {
      $this->db_e->select('ideamb,nomamb');
      $this->db_e->from('t_ambientes');
      $this->db_e->where('t_ambientes.ideare ='.$id);
      return $this->db_e->get()->result();  
        //echo '<pre>'; print_r($this->db_e->get()->result()); return;
   }
   */   
}

