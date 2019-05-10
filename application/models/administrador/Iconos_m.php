<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iconos_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function listar()
  {
    $this->db->select('ideico,desico,nomico');
    $this->db->from('iconos');
    //$this->db->order_by("t_ambientes.nomamb", "asc"); 
    return $this->db->get()->result();     
  }
   
   public function insertar_buscar_nombre($desico) 
   {
      if (empty($desico))
         return FALSE;
      return $this->db->where(array('desico' => $desico))->get('iconos')->row();
   }   
  
   public function insertar($desico, $nomico)
   {
      $query = array(
         'desico'=>strtoupper($desico),
         'nomico'=>strtoupper($nomico));
        
      $resultado = $this->db->insert('iconos', $query);
      if ($resultado)
         return true;
      return false;
   }        
   
  /*
   
  
  /*
  public function listar_categorias()
  {
    $this->db->select('idecatico,descatico');
    $this->db->from('categorias_iconos');
    return $this->db->get()->result();     
  }
   
   public function listar_ide($ideare)
   {
      $this->db_s->select('ideamb,nomare,nomamb,desamb');
      $this->db_s->from('t_ambientes');
      $this->db_s->join('t_areas', 't_areas.ideare = t_ambientes.ideare');
      $this->db_s->where('t_areas.ideare ='.$ideare);
      $this->db_s->order_by('t_ambientes.nomamb', 'asc'); 
      return $this->db_s->get()->result();       
   }
   
   public function insertar_llenar_ambiente($ideare)
   {
      $this->db_s->select('ideamb,nomamb');
      $this->db_s->from('t_ambientes');
      $this->db_s->join('t_areas', 't_areas.ideare = t_ambientes.ideare');
      $this->db_s->where('t_areas.ideare ='.$ideare);
      $this->db_s->order_by('t_ambientes.nomamb', 'asc'); 
      return $this->db_s->get()->result();       
   }
   
   
  
    
  
   
   public function actualizar($id) 
   {
      if (empty($id))
         return FALSE;
      return $this->db_s->where(array('ideamb' => $id))->get('t_ambientes')->row();
   }    
    
   public function grabar($ideamb,$ideare,$nomamb,$desamb) 
   {
      $query = array(
         'ideare'=>$ideare,
         'nomamb'=>strtoupper($nomamb),
         'desamb'=>strtoupper($desamb));
      return $this->db_s->where(array('ideamb' => $ideamb))
         ->update('t_ambientes', $query);
   }
   
   public function eliminar_buscar_relacion($ideamb) 
   {
        if (empty($ideamb))
            return FALSE;
        return $this->db_s->where(array('ideamb' => $ideamb))->get('t_pcs')->row();
   }
   
   public function eliminar($ideamb) 
   {
      if (empty($ideamb))
         return FALSE;
      return $this->db_s->where('ideamb',$ideamb)
         ->delete('t_ambientes');
   }    
   
   public function listar_ambientes($id)
   {
      $this->db_s->select('ideamb,nomamb');
      $this->db_s->from('t_ambientes');
      $this->db_s->where('t_ambientes.ideare ='.$id);
      return $this->db_s->get()->result();  
        //echo '<pre>'; print_r($this->db_s->get()->result()); return;
   }
    */
}

