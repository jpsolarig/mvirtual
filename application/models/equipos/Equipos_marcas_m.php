<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos_marcas_m extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
    $this->db_e = $this->load->database('equipos', TRUE);
  }
    
  public function listar() 
  {
    $this->db_e->select('idemar,nommar,nomequ');
    $this->db_e->from('t_marcas_equipos');
    $this->db_e->join('t_equipos', 't_equipos.ideequ = t_marcas_equipos.ideequ');
    //$this->db_e->order_by("nommar", "asc");
    return $this->db_e->get()->result();     
  }
   
  public function listar_equipos()
  {
    $this->db_e->select('ideequ,nomequ');
    $this->db_e->from('t_equipos');
    return $this->db_e->get()->result();     
  }
   
  public function listar_ide($ideequ)
  {
    $this->db_e->select('idemar,nommar,nomequ');
    $this->db_e->from('t_marcas_equipos');
    $this->db_e->join('t_equipos', 't_equipos.ideequ = t_marcas_equipos.ideequ');
    $this->db_e->where('t_equipos.ideequ ='.$ideequ);
      //$this->db_e->order_by('t_ambientes.nomamb', 'asc'); 
    return $this->db_e->get()->result();       
  }
   
  public function insertar_buscar_nombre($nommar,$ideequ) 
  {
    if (empty($nommar))
      return FALSE;
    return $this->db_e->where(array('nommar' => $nommar,'ideequ' => $ideequ))->get('t_marcas_equipos')->row();
  }    
   
  public function insertar($ideequ,$nommar)
  {
    $query = array(
      'ideequ'=>$ideequ,
      'nommar'=>strtoupper($nommar));
    $resultado = $this->db_e->insert('t_marcas_equipos', $query);
      if ($resultado)
      return true;
     return false;
  }    
  
  public function actualizar($id)  
  {
    if (empty($id))
      return FALSE;
    return $this->db_e->where(array('idemar' => $id))->get('t_marcas_equipos')->row();
  }    
   
  public function grabar_actualizar($idemar,$nommar) 
  { 
    $query = array(
      'nommar'=>strtoupper($nommar));
      return $this->db_e->where('idemar', $idemar)
        ->update('t_marcas_equipos', $query);
  }
  
  
  /*
  public function insertar_listar_nombre($nomequ)
   {
      $this->db_e->select('idemar,nommar');
      $this->db_e->from('t_marcas_equipos');
      $this->db_e->join('t_equipos', 't_equipos.ideequ = t_marcas_equipos.ideequ');
      $this->db_e->like('t_equipos.nomequ', $nomequ);
      return $this->db_e->get()->result();       
   }
    /*
    
     * 
     * 
     */
  
   
  
   /*
   public function insertar_llenar_marcas($ideequ)
   {
      $this->db_e->select('idemar,nommar');
      $this->db_e->from('t_marcas_equipos');
      $this->db_e->join('t_equipos', 't_equipos.ideequ = t_marcas_equipos.ideequ');
      $this->db_e->where('t_equipos.ideequ ='.$ideequ);
      //$this->db_e->order_by('t_ambientes.nomamb', 'asc'); 
      return $this->db_e->get()->result();       
   }
   */
 
   
   public function eliminar_buscar_relacion($idemar) 
   {
      if (empty($idemar))
         return FALSE;
      return $this->db_e->where(array('idemar' => $idemar))->get('t_modelos_equipos')->row();
   }   
   
   public function eliminar($id) 
   {
      if (empty($id))
         return FALSE;
      return $this->db_e->where('idemar',$id)
         ->delete('t_marcas_equipos');
   }    
   /*
   public function listar_marcas($equipo)
   {
      $this->db_e->select('idemar,nommar');
      $this->db_e->from('t_marcas_equipos');
      $this->db_e->where('t_marcas_equipos.nommar ='.$id);
      return $this->db_e->get()->result();  
        //echo '<pre>'; print_r($this->db_e->get()->result()); return;
   }
   
   public function listar_nombre() 
   {
      $this->db_e->select('idemar,nommar');
      $this->db_e->from('t_marcas_equipos');
        //$this->db_e->order_by("nommar", "asc");
      return $this->db_e->get()->result();     
   }
    * 
    */
}