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
   
   public function actualizar($id) 
    {
        if (empty($id))
            return FALSE;
        return $this->db->where(array('ideico' => $id))->get('iconos')->row();
    }
    
    public function grabar_actualizar($ideico, $desico, $nomico) 
    {
      $query = array(
      'desico'=>($desico),
      'nomico'=>($nomico));
      
      return $this->db->where(array('ideico' => $ideico))
                      ->update('iconos', $query);
    }
    
    public function eliminar_buscar_relacion_sistemas($id) 
    {
      if (empty($id))
        return FALSE;
        return $this->db->where(array('ideico' => $id))->get('sistemas')->row();
    }   
    
     public function eliminar_buscar_relacion_menus($id) 
    {
      if (empty($id))
        return FALSE;
        return $this->db->where(array('ideico' => $id))->get('menus')->row();
       
    }   
    
     public function eliminar_buscar_relacion_submenus($id) 
    {
      if (empty($id))
        return FALSE;
        return $this->db->where(array('ideico' => $id))->get('submenus')->row();
    }   
    
    public function eliminar($id) 
    {
      if (empty($id))
        return FALSE;
      return $this->db->where('ideico',$id)->delete('iconos');
    }    
  
}

