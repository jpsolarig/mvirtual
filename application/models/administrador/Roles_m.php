<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_m extends CI_Model 
{
    public function __construct()
    {
	parent::__construct();
    }

    public function listar()
    {
        $this->db->select('iderol,nomrol,desrol,ordrol');
        $this->db->from('roles');
        //$this->db->order_by("ordrol", "asc");
        return $this->db->get()->result();     
    }
    
    public function insertar_buscar_nombre($nomrol) 
    {
        if (empty($nomrol))
            return FALSE;
        return $this->db->where(array('nomrol' => $nomrol))->get('roles')->row();
    }    
    
    public function insertar($nomrol,$desrol,$ordrol)
    {
        $query = array(
            'nomrol'=>$nomrol,
            'desrol'=>$desrol,
            'ordrol'=>$ordrol,);
        $resultado = $this->db->insert('roles', $query);
        if ($resultado)
            return true;
        return false;
    }
    
    public function actualizar($id) 
    {
        if (empty($id))
            return FALSE;
        return $this->db->where(array('iderol' => $id))->get('roles')->row();
    }
    
    public function grabar_actualizar($iderol, $nomrol, $desrol, $ordrol) {

        $query = array(
            'nomrol'=>ucfirst(strtolower($nomrol)),
            'desrol'=>ucfirst(strtolower($desrol)),
            'ordrol'=>$ordrol,
 	);
        return $this->db->where(array('iderol' => $iderol))
                        ->update('roles', $query);
    }
    
   public function eliminar_buscar_relacion($id) 
    {
        if (empty($id))
            return FALSE;
        return $this->db->where(array('iderol' => $id))->get('usuarios')->row();
    }   
    
    public function eliminar($id) 
    {
        if (empty($id))
            return FALSE;
        return $this->db->where('iderol',$id)
		->delete('roles');
    }    
    
   
  
}