<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colores_m extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select('idecol,descol');
        $this->db->from('colores');
        //$this->db->order_by("ordsis", "asc");
        return $this->db->get()->result();     
    }
   
    
    public function insertar_buscar_nombre($descol) 
    {
        if (empty($descol))
            return FALSE;
        return $this->db->where(array('descol' => $descol))->get('colores')->row();
    }   
    
    public function insertar($descol)
    {
        $query = array('descol'=>$descol);
        $resultado = $this->db->insert('colores', $query);
        if ($resultado)
            return true;
        return false;
    }
    
    public function actualizar($id) 
    {
        if (empty($id))
            return FALSE;
        return $this->db->where(array('idecol' => $id))->get('colores')->row();
    }
    
    public function grabar_actualizar($idecol, $descol) 
    {
      $query = array('descol'=>$descol);
      return $this->db->where(array('idecol' => $idecol))
                      ->update('colores', $query);
    }
    
  public function eliminar_buscar_relacion($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where(array('idecol' => $id))->get('sistemas')->row();
  }   
    
  public function eliminar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where('idecol',$id)->delete('colores');
  }    
  
}