<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Importar_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
    $this->db_a = $this->load->database('asistencias', TRUE);
  }

  public function listar()
  {
    $this->db_a->select('ideare,desare');
    $this->db_a->from('areas');
    //$this->db_p->order_by("ordsis", "asc");
    return $this->db_a->get()->result();
  }
  
  function select()
 {
  $this->db_a->order_by('id', 'DESC');
  $query = $this->db_a->get('marcaciones');
  return $query;
 }

 function insert($data)
 {
  $this->db_a->insert_batch('marcaciones', $data);
 }
  /*
  public function insertar_buscar_nombre($nomsis) 
  {
    if (empty($nomsis))
      return FALSE;
    return $this->db->where(array('nomsis' => $nomsis))->get('sistemas')->row();
  }   
    
  public function insertar($nomsis,$dessis,$urlsis,$ordsis,$csssis,$icosis)
  {
    $query = array(
            'nomsis'=>ucwords(strtolower($nomsis)),
            'dessis'=>$dessis,
            'urlsis'=>$urlsis,
            'ordsis'=>$ordsis,
            'csssis'=>$csssis,
            'icosis'=>$icosis,
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
    
    public function grabar_actualizar($idesis, $nomsis, $dessis, $urlsis, $ordsis, $csssis,$icosis ) 
    {
        $query = array(
            'nomsis'=>ucfirst(strtolower($nomsis)),
            'dessis'=>ucfirst(strtolower($dessis)),
            'urlsis'=>strtolower($urlsis),
            'ordsis'=>$ordsis,
            'csssis'=>$csssis,
            'icosis'=>$icosis,
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
        return $this->db->where('idesis',$id)
		->delete('sistemas');
    }    
  */
}