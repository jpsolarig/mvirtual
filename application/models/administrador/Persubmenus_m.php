<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persubmenus_m extends CI_Model 
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
        $this->db->join('submenus', 'submenus.idemen = menus.idemen');
        $this->db->join('permisos_submenus', 'permisos_submenus.idesubmen = submenus.idesubmen');
        $this->db->join('roles', 'roles.iderol = permisos_submenus.iderol');
        //$this->db->order_by("submenus.ordsubmen", "asc");
        return $this->db->get()->result();     
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
     public function listar_ide($iderol)
    {
         $this->db->select('*');
        $this->db->from('sistemas');
       $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('submenus', 'submenus.idemen = menus.idemen');
        $this->db->join('permisos_submenus', 'permisos_submenus.idesubmen = submenus.idesubmen');
        $this->db->join('roles', 'roles.iderol = permisos_submenus.iderol');
        $this->db->where('permisos_submenus.iderol ='.$iderol);
        
         return $this->db->get()->result();         
     
    }
    
     public function listar_ide2($iderol,$idesis)
    {
        $this->db->select('*');
        $this->db->from('sistemas');
       $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('submenus', 'submenus.idemen = menus.idemen');
        $this->db->join('permisos_submenus', 'permisos_submenus.idesubmen = submenus.idesubmen');
        $this->db->join('roles', 'roles.iderol = permisos_submenus.iderol');
        $this->db->where('permisos_submenus.iderol ='.$iderol);
        $this->db->where('permisos_submenus.idesis ='.$idesis);
        //$this->db->order_by('menus.ordmen', 'asc'); 
        return $this->db->get()->result();       
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
     public function listar_ide3($iderol,$idesis,$idemen)
    {
        $this->db->select('*');
        $this->db->from('sistemas');
       $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('submenus', 'submenus.idemen = menus.idemen');
        $this->db->join('permisos_submenus', 'permisos_submenus.idesubmen = submenus.idesubmen');
        $this->db->join('roles', 'roles.iderol = permisos_submenus.iderol');
        $this->db->where('permisos_submenus.iderol ='.$iderol);
        $this->db->where('permisos_submenus.idesis ='.$idesis);
        $this->db->where('permisos_submenus.idemen ='.$idemen);
        //$this->db->order_by('menus.ordmen', 'asc'); 
        return $this->db->get()->result();       
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
    
    public function insertar_buscar_persubmenu($iderol, $idesis, $idemen, $idesubmen) 
    {
        if (empty($iderol) or empty($idesis) or empty($idemen) or empty($idesubmen))
            return FALSE;
        return $this->db->where(array('iderol' => $iderol,'idesis' => $idesis,'idemen' => $idemen,'idesubmen' => $idesubmen))->get('permisos_submenus')->row();
    }    
   
    public function insertar($iderol,$idesis,$idemen,$idesubmen)
    {
        $query = array(
            'iderol'=>$iderol,
            'idesis'=>$idesis,
            'idemen'=>$idemen,
            'idesubmen'=>$idesubmen,
            'estsubmen'=>FALSE,
            'perimp'=>FALSE,
            'perins'=>FALSE,
            'perexp'=>FALSE,
            'peract'=>FALSE,
            'pereli'=>FALSE,
        );
        
        $resultado = $this->db->insert('permisos_submenus', $query);
	if ($resultado)
		return true;
	return false;
       
        
        
        //usar print_r en result;
        
    }
    
     public function permisos($iderol,$idesis,$idemen,$idesubmen,$estsubmen,$perimp,$perins,$perexp,$peract,$pereli,$permiso) 
    {
        if($permiso ==="ver")
        { 
            if($estsubmen == FALSE) $estsubmen = TRUE; 
            else $estsubmen = FALSE; 
            $query = array('estsubmen' => $estsubmen);
            $this->db->where('perimp', $perimp);
            $this->db->where('perins', $perins);
            $this->db->where('perexp', $perexp);
            $this->db->where('peract', $peract);
            $this->db->where('pereli', $pereli);
           
        }
        
        if($permiso ==="imp")
        { 
            if($perimp == FALSE)$perimp = TRUE; 
            else $perimp = FALSE; 
            $query = array('perimp' => $perimp);
            $this->db->where('estsubmen', $estsubmen);
            $this->db->where('perins', $perins);
            $this->db->where('perexp', $perexp);
            $this->db->where('peract', $peract);
            $this->db->where('pereli', $pereli);
            
        }
        
        if($permiso ==="ins")
        { 
            if($perins == FALSE)$perins = TRUE; 
            else $perins = FALSE; 
            $query = array('perins' => $perins);
            $this->db->where('estsubmen', $estsubmen);
            $this->db->where('perimp', $perimp);
            $this->db->where('perexp', $perexp);
            $this->db->where('peract', $peract);
            $this->db->where('pereli', $pereli);
            
        }
        
        if($permiso ==="exp")
        { 
            if($perexp == FALSE)$perexp = TRUE; 
            else $perexp = FALSE; 
            $query = array('perexp' => $perexp);
            $this->db->where('estsubmen', $estsubmen);
            $this->db->where('perimp', $perimp);
            $this->db->where('perins', $perins);
            $this->db->where('peract', $peract);
            $this->db->where('pereli', $pereli);
            
        }
        
        if($permiso ==="act")
        { 
            if($peract == FALSE)$peract = TRUE; 
            else $peract = FALSE; 
            $query = array('peract' => $peract);
            $this->db->where('estsubmen', $estsubmen);
            $this->db->where('perimp', $perimp);
            $this->db->where('perins', $perins);
            $this->db->where('perexp', $peract);
            $this->db->where('pereli', $pereli);
            
        }
        
        if($permiso ==="eli")
        { 
            if($pereli == FALSE)$pereli = TRUE; 
            else $pereli = FALSE; 
            $query = array('pereli' => $pereli);
            $this->db->where('estsubmen', $estsubmen);
            $this->db->where('perimp', $perimp);
            $this->db->where('perins', $perins);
            $this->db->where('perexp', $peract);
            $this->db->where('peract', $peract);
            
        }
        
        
            $this->db->where('iderol', $iderol);
            $this->db->where('idesis', $idesis);
            $this->db->where('idemen', $idemen);
            $this->db->where('idesubmen', $idesubmen);
            return $this->db->update('permisos_submenus', $query);
        // echo '<pre>'; print_r($query); exit;                
    }
    
    public function eliminar($iderol,$idesis,$idemen,$idesubmen) 
    {
        if (empty($iderol) or empty($idesis) or empty($idemen) or empty($idesubmen))
            return FALSE;
        return $this->db->where(array('iderol' => $iderol,'idesis' => $idesis,'idemen' => $idemen, 'idesubmen' => $idesubmen))->delete('permisos_submenus');
        
        //return $this->db->where(array('idesis' => $idesis,'iderol' => $iderol))->get('permisos_sistemas')->row();
    }    
    
    
    /*
    
    
      public function permisos_imp($iderol,$idesis,$idemen,$idesubmen,$perimp) 
    {
        if($perimp == FALSE)
            $perimp = TRUE; 
        else
            $perimp = FALSE; 
        
        $query = array('perimp' => $perimp);
        $this->db->where('iderol', $iderol);
        $this->db->where('idesis', $idesis);
        $this->db->where('idemen', $idemen);
        $this->db->where('idesubmen', $idesubmen);
        return $this->db->update('permisos_submenus', $query);
                        
    }
    
    public function permisos_ins($iderol,$idesis,$idemen,$idesubmen,$perins) 
    {
        if($perins == FALSE)
            $perins = TRUE; 
        else
            $perins = FALSE; 
        
        $query = array('perins' => $perins);
        $this->db->where('iderol', $iderol);
        $this->db->where('idesis', $idesis);
        $this->db->where('idemen', $idemen);
        $this->db->where('idesubmen', $idesubmen);
        return $this->db->update('permisos_submenus', $query);
                        
    }
     * 
     */
}