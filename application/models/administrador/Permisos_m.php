<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos_m extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function lista_sistemas_rol_estado($estsis,$iderol)	
    {	
        $this->db->select('sistemas.nomsis,sistemas.dessis,sistemas.urlsis,colores.descol,desico');
        $this->db->from('sistemas');
        $this->db->join('iconos', 'iconos.ideico = sistemas.ideico');
        $this->db->join('colores', 'colores.idecol = sistemas.idecol');
        $this->db->join('permisos_sistemas', 'permisos_sistemas.idesis = sistemas.idesis');
        $this->db->where('permisos_sistemas.estsis ='.$estsis);
        $this->db->join('roles', 'roles.iderol = permisos_sistemas.iderol');
        $this->db->where('roles.iderol ='.$iderol);
        $this->db->order_by("ordsis", "asc");
        return $this->db->get()->result();
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
    public function permisos_nombre_del_sistema($nomsis,$estsis,$iderol)	
    {	
        $this->db->select('sistemas.nomsis,permisos_sistemas.estsis,roles.iderol');
        $this->db->from('sistemas');
        $this->db->where('sistemas.nomsis ='.'"'.$nomsis.'"');
        $this->db->join('permisos_sistemas', 'permisos_sistemas.idesis = sistemas.idesis');
        $this->db->where('permisos_sistemas.estsis ='.$estsis);
        $this->db->join('roles', 'roles.iderol = permisos_sistemas.iderol');
        $this->db->where('roles.iderol ='.$iderol);
        $this->db->order_by("ordsis", "asc");
        return $this->db->get()->row_array();
        //echo '<pre>'; print_r($this->db->get()->row_array()); exit;
    }
    
    public function permisos_menus_del_sistemas($nomsis,$estmen,$iderol)	
    {	
        $this->db->select('menus.nommen,iconos.desico');
        $this->db->from('sistemas');
        $this->db->where('sistemas.nomsis ='.'"'.$nomsis.'"');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('iconos', 'iconos.ideico = menus.ideico');
        $this->db->join('permisos_menus', 'permisos_menus.idemen = menus.idemen AND permisos_menus.idesis = menus.idesis');
        
        $this->db->where('permisos_menus.estmen ='.$estmen);
        $this->db->join('roles', 'roles.iderol = permisos_menus.iderol');
        $this->db->where('roles.iderol ='.$iderol);
        $this->db->order_by("ordmen", "asc");
        return $this->db->get()->result();    
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
    public function permisos_submenus($nomsis,$estsubmen,$iderol)	
    {	
            
        $this->db->select('submenus.nomsubmen,submenus.urlsubmen,menus.nommen,iconos.desico');
        $this->db->from('sistemas');
        $this->db->where('sistemas.nomsis ='.'"'.$nomsis.'"');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->join('submenus', 'submenus.idemen = menus.idemen');
        $this->db->join('iconos', 'iconos.ideico = submenus.ideico');
        $this->db->join('permisos_submenus', 'permisos_submenus.idemen = submenus.idemen AND permisos_submenus.idesubmen = submenus.idesubmen AND permisos_submenus.idesis = submenus.idesis');
        $this->db->join('roles', 'roles.iderol = permisos_submenus.iderol');
        $this->db->where('roles.iderol ='.$iderol);
        $this->db->where('permisos_submenus.estsubmen ='.$estsubmen);
        $this->db->order_by("ordsubmen", "asc");
        return $this->db->get()->result();
        //echo '<pre>'; print_r($this->db->get()->result()); exit;
    }
    
    public function permisos_controlador($nomsis,$nommen,$nomsubmen,$estsubmen,$iderol)	
    {	
        //$nombre = ucwords(strtolower($nombre));
        //$estper = 1; 
        //$iderol = $this->session->userdata('iderol');
        
        
        
        $this->db->select('permisos_submenus.estsubmen,permisos_submenus.perimp,permisos_submenus.perins,permisos_submenus.perexp,permisos_submenus.peract,permisos_submenus.pereli');
        $this->db->from('sistemas');
        $this->db->where('sistemas.nomsis ='.'"'.$nomsis.'"');
        $this->db->join('menus', 'menus.idesis = sistemas.idesis');
        $this->db->where('menus.nommen ='.'"'.$nommen.'"');
        $this->db->join('submenus', 'submenus.idemen = menus.idemen');
        $this->db->where('submenus.nomsubmen ='.'"'.$nomsubmen.'"');
        $this->db->join('permisos_submenus', 'permisos_submenus.idemen = submenus.idemen AND permisos_submenus.idesubmen = submenus.idesubmen AND permisos_submenus.idesis = submenus.idesis');
        $this->db->where('permisos_submenus.estsubmen ='.$estsubmen);
        $this->db->join('roles', 'roles.iderol = permisos_submenus.iderol');
        $this->db->where('roles.iderol ='.$iderol);
        
        
        
        return $this->db->get()->row_array();
        //echo '<pre>'; print_r($this->db->get()->row_array()); exit;
        
    }
    
    public function insertar_buscar_sistema($idesis,$iderol) 
    {
        if (empty($idesis) or empty($iderol))
            return FALSE;
        return $this->db->where(array('idesis' => $idesis,'iderol' => $iderol))->get('permisos_sistemas')->row();
    }    
}

//echo '<pre>'; print_r($query); exit;