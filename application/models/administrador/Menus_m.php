<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function listar()
  {
    $this->db->select('idemen,nomsis,nommen,desmen,ordmen,menus.idesis,desico');
    $this->db->from('menus');
    $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
    $this->db->join('iconos', 'iconos.ideico = menus.ideico');
    $this->db->order_by("nomsis,ordmen", "asc");
    return $this->db->get()->result();     
  }
      
  public function listar_sistemas()
  {
    $this->db->select('idesis,nomsis');
    $this->db->from('sistemas');
    return $this->db->get()->result();     
  }
  
  public function listar_ide($idesis)
  {
    $this->db->select('idemen,nomsis,nommen,desmen,ordmen,menus.idesis,desico');
    $this->db->from('menus');
    $this->db->join('sistemas', 'sistemas.idesis = menus.idesis');
    $this->db->join('iconos', 'iconos.ideico = menus.ideico');
    $this->db->where('sistemas.idesis ='.$idesis);
    $this->db->order_by("nomsis,ordmen", "asc"); 
    return $this->db->get()->result();       
  }
  
  public function listar_iconos()
  {
    $this->db->select('ideico,desico');
    $this->db->from('iconos');
    return $this->db->get()->result();     
  }
 
  public function insertar_buscar_nombre($idesis,$nommen) 
  {
    if (empty($nommen))
      return FALSE;
    return $this->db->where(array('idesis' => $idesis, 'nommen' => $nommen))->get('menus')->row();
  }    
  
  public function insertar($idesis,$nommen,$desmen,$ordmen,$ideico)
  {
    $query = array('idesis'=>$idesis,'nommen'=>$nommen,'desmen'=>$desmen,'ordmen'=>$ordmen,'ideico'=>$ideico);
        
    $resultado = $this->db->insert('menus', $query);
    if ($resultado)
      return true;
    return false;
  }
  
  public function actualizar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where(array('idemen' => $id))->get('menus')->row();
  }    
   
  public function grabar_actualizar($idesis, $idemen, $nommen, $desmen, $ideico, $ordmen) {

    $query = array(
      'nommen'=>ucfirst(strtolower($nommen)),
      'desmen'=>ucfirst(strtolower($desmen)),
      'ideico'=>($ideico),
      'ordmen'=>($ordmen));
    return $this->db->where(array('idesis' => $idesis,'idemen' => $idemen,))
                        ->update('menus', $query);
  }
  
  public function eliminar_buscar_relacion($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where(array('idemen' => $id))->get('submenus')->row();
  }   
  
  public function eliminar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where('idemen',$id)->delete('menus');
  }    
  
}