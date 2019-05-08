<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persistemas_m extends CI_Model 
{
    public function __construct()
    {
	parent::__construct();
    }

    public function listar()
    {
        $this->db->select('permisos_sistemas.iderol,permisos_sistemas.idesis,roles.nomrol,sistemas.nomsis,permisos_sistemas.estsis');
        $this->db->from('permisos_sistemas');
        $this->db->join('sistemas', 'sistemas.idesis = permisos_sistemas.idesis');
        $this->db->join('roles', 'roles.iderol = permisos_sistemas.iderol');
        $this->db->order_by("nomrol", "asc");
        return $this->db->get()->result();     
    }
    
    public function listar_ide($iderol)
    {
        $this->db->select('permisos_sistemas.iderol,permisos_sistemas.idesis,roles.nomrol,sistemas.nomsis,permisos_sistemas.estsis');
        $this->db->from('permisos_sistemas');
        $this->db->join('sistemas', 'sistemas.idesis = permisos_sistemas.idesis');
        $this->db->join('roles', 'roles.iderol = permisos_sistemas.iderol');
        $this->db->where('permisos_sistemas.iderol ='.$iderol);
        return $this->db->get()->result();       
    }
    
    public function insertar_buscar_sistema($idesis,$iderol) 
    {
        if (empty($idesis) or empty($iderol))
            return FALSE;
        return $this->db->where(array('idesis' => $idesis,'iderol' => $iderol))->get('permisos_sistemas')->row();
    }    
    
    public function insertar($idesis,$iderol,$estsis)
    {
        $query = array(
            'idesis'=>$idesis,
            'iderol'=>$iderol,
            'estsis'=>$estsis,
        );
        
        
        $resultado = $this->db->insert('permisos_sistemas', $query);
	if ($resultado)
		return true;
	return false;
    }
    
    public function permisos($iderol,$idesis,$estsis) 
    {
        if($estsis == 0)
        (int)$estsis = '1'; 
        else
        (int)$estsis = '0'; 
        
        $query = array('estsis' => $estsis);
        $this->db->where('iderol', $iderol);
        $this->db->where('idesis', $idesis);
        return $this->db->update('permisos_sistemas', $query);
                        
    }
    
    public function eliminar($iderol,$idesis) 
    {
        if (empty($iderol) or empty($idesis))
            return FALSE;
        return $this->db->where(array('iderol' => $iderol,'idesis' => $idesis))->delete('permisos_sistemas');
        
        //return $this->db->where(array('idesis' => $idesis,'iderol' => $iderol))->get('permisos_sistemas')->row();
    }    
    
    
}