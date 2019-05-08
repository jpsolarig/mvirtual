<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permenus_m extends CI_Model 
{
    public function __construct()
    {
	parent::__construct();
    }

    public function listar()
    {
        $this->db->select('*');
        $this->db->from('sistemas');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('permisos_menus', 'permisos_menus.idemen = menus.idemen');
        $this->db->join('roles', 'roles.iderol = permisos_menus.iderol');
        //$this->db->order_by("ordsis", "asc");
        return $this->db->get()->result();     
        
    }
    
    public function listar_ide($iderol)
    {
         $this->db->select('*');
        $this->db->from('sistemas');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('permisos_menus', 'permisos_menus.idemen = menus.idemen');
        $this->db->join('roles', 'roles.iderol = permisos_menus.iderol');
        $this->db->where('permisos_menus.iderol ='.$iderol);
        
         return $this->db->get()->result();         
     
    }
    
    public function listar_ide2($iderol,$idesis)
    {
        $this->db->select('*');
        $this->db->from('sistemas');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('permisos_menus', 'permisos_menus.idemen = menus.idemen');
        $this->db->join('roles', 'roles.iderol = permisos_menus.iderol');
        $this->db->where('permisos_menus.iderol ='.$iderol);
        $this->db->where('permisos_menus.idesis ='.$idesis);
        //$this->db->order_by('menus.ordmen', 'asc'); 
        return $this->db->get()->result();       
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
    public function insertar_buscar_menu($iderol, $idesis, $idemen) 
    {
        if (empty($iderol) or empty($idesis) or empty($idemen))
            return FALSE;
        return $this->db->where(array('iderol' => $iderol,'idesis' => $idesis,'idemen' => $idemen))->get('permisos_menus')->row();
    }    
    
   
    
    public function insertar($iderol,$idesis,$idemen,$estmen)
    {
        $query = array(
            'iderol'=>$iderol,
            'idesis'=>$idesis,
            'idemen'=>$idemen,
            'estmen'=>$estmen,
        );
        
        $resultado = $this->db->insert('permisos_menus', $query);
	if ($resultado)
		return true;
	return false;
       
        
        
        //usar print_r en result;
        
    }
    
     public function permisos($iderol,$idesis,$idemen,$estmen) 
    {
        if($estmen == 0)
        (int)$estmen = '1'; 
        else
        (int)$estmen = '0'; 
        
        $query = array('estmen' => $estmen);
        $this->db->where('iderol', $iderol);
        $this->db->where('idesis', $idesis);
        $this->db->where('idemen', $idemen);
        return $this->db->update('permisos_menus', $query);
                        
    }
   
     public function eliminar($iderol,$idesis,$idemen) 
    {
        if (empty($iderol) or empty($idesis)or empty($idemen))
            return FALSE;
        return $this->db->where(array('iderol' => $iderol,'idesis' => $idesis,'idemen' => $idemen))->delete('permisos_menus');
        
        //return $this->db->where(array('idesis' => $idesis,'iderol' => $iderol))->get('permisos_sistemas')->row();
    }    
    
    
   /* 
    public function listar_ide($idesis)
   {
      $this->db->select('idemen,nomsis,nommen,desmen,ordmen,menus.idesis,icomen');
      $this->db->from('menus');
      $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
      $this->db->where('sistemas.idesis ='.$idesis);
      $this->db->order_by("nommen", "asc"); 
         return $this->db->get()->result();       
   }
    
    
    /*
    public function listar_iderol($iderol,$idesis)
    {
        $this->db->select('*');
        $this->db->from('sistemas');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('permisos_menus', 'permisos_menus.idemen = menus.idemen');
        $this->db->join('roles', 'roles.iderol = permisos_menus.iderol');
        $this->db->where('permisos_menus.iderol ='.$iderol);
        $this->db->where('permisos_menus.idesis ='.$idesis);
        //$this->db->order_by('menus.ordmen', 'asc'); 
        return $this->db->get()->result();       
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
     public function permisos($iderol,$idesis,$idemen,$estmen) 
    {
        if($estmen == 0)
        (int)$estmen = '1'; 
        else
        (int)$estmen = '0'; 
        
        $query = array('estmen' => $estmen);
        $this->db->where('iderol', $iderol);
        $this->db->where('idesis', $idesis);
        $this->db->where('idemen', $idemen);
        return $this->db->update('permisos_menus', $query);
                        
    }
    
     public function buscar_menus($iderol,$idesis,$idemen) 
    {
        if (empty($iderol) or empty($idesis) or empty($idemen))
            return FALSE;
        return $this->db->where(array('iderol' => $iderol,'idesis' => $idesis,'idemen' => $idemen))->get('permisos_menus')->row();
    }    
    
   
    
   
    */
}