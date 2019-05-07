<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistemas_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function listar()
  {
    $this->db->select('idesis,nomsis,dessis,urlsis,ordsis,desico,descol');
    $this->db->from('sistemas');
    $this->db->join('colores', 'colores.idecol = sistemas.idecol');
    $this->db->join('iconos', 'iconos.ideico = sistemas.ideico');
    $this->db->order_by("ordsis", "asc");
    return $this->db->get()->result();     
  }
   
  public function listar_colores()
  {
    $this->db->select('idecol,descol');
    $this->db->from('colores');
    return $this->db->get()->result();     
  }
  
  public function listar_iconos($ideico)
  {
    $this->db->select('ideico,desico');
    $this->db->from('iconos');
    $this->db->where('iconos.ideico ='.$ideico);
    return $this->db->get()->result();     
  }
  
  /*
  public function insertar_buscar_nombre($nomsis) 
  {
    if (empty($nomsis))
      return FALSE;
      return $this->db->where(array('nomsis' => $nomsis))->get('sistemas')->row();
  }   
    
  public function insertar($nomsis,$dessis,$urlsis,$ordsis,$idecol,$ideico)
  {
    $query = array(
      'nomsis'=>ucwords(strtolower($nomsis)),
      'dessis'=>$dessis,
      'urlsis'=>$urlsis,
      'ordsis'=>$ordsis,
      'idecol'=>$idecol,
      'ideico'=>$ideico,
    );
    $resultado = $this->db->insert('sistemas', $query);
    if ($resultado)
      return true;
    return false;
  }
    
  public function actualizar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where(array('idesis' => $id))->get('sistemas')->row();
  }
    
  public function grabar_actualizar($idesis, $nomsis, $dessis, $urlsis, $ordsis, $idecol,$ideico) 
  {
    $query = array(
      'nomsis'=>ucfirst(strtolower($nomsis)),
      'dessis'=>ucfirst(strtolower($dessis)),
      'urlsis'=>strtolower($urlsis),
      'ordsis'=>$ordsis,
      'idecol'=>$idecol,
      'ideico'=>$ideico,
      );
    return $this->db->where(array('idesis' => $idesis))
                        ->update('sistemas', $query);
  }
    
  public function eliminar_buscar_relacion($id) 
  {
    if (empty($id))
      return FALSE;
        return $this->db->where(array('idesis' => $id))->get('menus')->row();
      return $this->db->where(array('idesis' => $id))->get('permisos_sistemas')->row();
  }   
    
  public function eliminar($id) 
  {
    if (empty($id))
      return FALSE;
    return $this->db->where('idesis',$id)->delete('sistemas');
  }    
  */
}