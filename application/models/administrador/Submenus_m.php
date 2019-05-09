<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Submenus_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function listar()
  {
    $this->db->select('idesubmen,nomsis,nommen,nomsubmen,dessubmen,urlsubmen,ordsubmen,desico');
    $this->db->from('submenus');
    $this->db->join('menus', 'menus.idemen = submenus.idemen');
    $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
    $this->db->join('iconos', 'iconos.ideico = submenus.ideico');
    $this->db->order_by("sistemas.nomsis,submenus.ordsubmen", "asc");
    return $this->db->get()->result();     
  }
    
  public function listar_ide($idesis)
  {
    $this->db->select('idesubmen,nomsis,nommen,nomsubmen,,dessubmen,urlsubmen,ordsubmen,desico');
    $this->db->from('submenus');
    $this->db->join('menus', 'menus.idemen = submenus.idemen');
    $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
    $this->db->join('iconos', 'iconos.ideico = submenus.ideico');
    $this->db->where('submenus.idesis ='.$idesis);
    $this->db->order_by('menus.nommen,submenus.ordsubmen', 'asc'); 
    return $this->db->get()->result();       
  }
    
  public function listar_ide2($idesis,$idemen)
  {
    $this->db->select('idesubmen,nomsis,nommen,nomsubmen,,dessubmen,urlsubmen,ordsubmen,desico');
    $this->db->from('submenus');
    $this->db->join('menus', 'menus.idemen = submenus.idemen');
    $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
    $this->db->join('iconos', 'iconos.ideico = submenus.ideico');
    $this->db->where('submenus.idesis ='.$idesis);
    $this->db->where('submenus.idemen ='.$idemen);
    $this->db->order_by('submenus.ordsubmen', 'asc'); 
    return $this->db->get()->result();       
  }
  
  public function listar_sistemas()
  {
    $this->db->select('idesis,nomsis');
    $this->db->from('sistemas');
    $this->db->order_by("nomsis", "asc");
    return $this->db->get()->result();     
  }
  
  public function listar_menus_ide($idesis)
  {
    $this->db->select('idemen,nommen');
    $this->db->from('menus');
    $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
    $this->db->where('sistemas.idesis ='.$idesis);
    $this->db->order_by("nommen", "asc");
    return $this->db->get()->result();       
  }
  
  public function listar_iconos()
  {
    $this->db->select('ideico,nomico');
    $this->db->from('iconos');
    $this->db->order_by("nomico", "asc");
    return $this->db->get()->result();     
  }
  
  public function insertar_buscar_nombre($idesis,$idemen,$nomsubmen) 
  {
    if (empty($idesis)&& empty($idemen)&& empty($nomsubmen))
      return FALSE;
    return $this->db->where(array('idesis' => $idesis,'idemen' => $idemen, 'nomsubmen' => $nomsubmen))->get('submenus')->row();
  }     
    
  public function insertar($idesis,$idemen,$nomsubmen,$dessubmen,$urlsubmen,$ideico,$ordsubmen)
  {
    $query = array(
      'idesis'=>$idesis,
      'idemen'=>$idemen,
      'nomsubmen'=>$nomsubmen,
      'dessubmen'=>$dessubmen,
      'urlsubmen'=>$urlsubmen,
      'ideico'=>$ideico,
      'ordsubmen'=>$ordsubmen,
    );
        
    $resultado = $this->db->insert('submenus', $query);
    if ($resultado)
      return true;
    return false;
  }
    
    public function actualizar($id) 
    {
        if (empty($id))
            return FALSE;
        return $this->db->where(array('idesubmen' => $id))->get('submenus')->row();
    }    
    
    public function grabar_actualizar($idesis, $idemen, $idesubmen, $nomsubmen, $dessubmen, $urlsubmen, $ideico, $ordsubmen) {

        $query = array(
            'nomsubmen'=>ucfirst(strtolower($nomsubmen)),
            'dessubmen'=>ucfirst(strtolower($dessubmen)),
            'urlsubmen'=>strtolower($urlsubmen),
            'ideico'=>strtolower($ideico),
            'ordsubmen'=>($ordsubmen),
 	);
        return $this->db->where(array('idesis' => $idesis,'idemen' => $idemen,'idesubmen' => $idesubmen,))
                        ->update('submenus', $query);
    }
    
    public function eliminar_buscar_relacion($id) 
   {
      if (empty($id))
         return FALSE;
      return $this->db->where(array('idesubmen' => $id))->get('permisos_submenus')->row();
   }   
  
   public function eliminar($id) 
   {
      if (empty($id))
         return FALSE;
      return $this->db->where('idesubmen',$id)->delete('submenus');
   }    
}