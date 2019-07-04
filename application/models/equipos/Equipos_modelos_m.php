<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Equipos_modelos_m extends CI_Model 
{
   public function __construct()
   {
      parent::__construct();
      $this->db_e = $this->load->database('equipos', TRUE);
  }

   public function listar()
   {
      $this->db_e->select('idemod,nommod,nommar,nomequ');
      $this->db_e->from('t_modelos_equipos');
      $this->db_e->join('t_marcas_equipos', 't_marcas_equipos.idemar = t_modelos_equipos.idemar');
      $this->db_e->join('t_equipos', 't_equipos.ideequ = t_modelos_equipos.ideequ');
        //$this->db->order_by("nomar", "asc"); 
      return $this->db_e->get()->result();     
   }
   
   public function listar_ide($idemar)
   {
      $this->db_e->select('idemod,nommar,nommod,nomequ');
       $this->db_e->from('t_modelos_equipos');
      $this->db_e->join('t_marcas_equipos', 't_marcas_equipos.idemar = t_modelos_equipos.idemar');
       $this->db_e->join('t_equipos', 't_equipos.ideequ = t_modelos_equipos.ideequ');
      $this->db_e->where('t_marcas_equipos.idemar ='.$idemar);
        //$this->db_e->order_by('t_ambientes.nomamb', 'asc'); 
      return $this->db_e->get()->result();       
   }
   
   public function insertar_buscar_nombre($nommod) 
   {
      if (empty($nommod))
         return FALSE;
      return $this->db_e->where(array('nommod' => $nommod))->get('t_modelos_equipos')->row();
   }
   
   public function insertar($ideequ, $idemar,$nommod)
   {
      $query = array(
         'ideequ'=>$ideequ,
         'idemar'=>$idemar,
         'nommod'=>strtoupper($nommod));
      $resultado = $this->db_e->insert('t_modelos_equipos', $query);
      if ($resultado)
         return true;
      return false;
   }
   
   public function actualizar($id) 
   {
      if (empty($id))
         return FALSE;
      return $this->db_e->where(array('idemod' => $id))->get('t_modelos_equipos')->row();
   }    
   
   public function actualizar_grabar($idemod,$idemar,$nommod) 
   {
      $query = array(
         'idemar'=>strtoupper($idemar),
         'nommod'=>strtoupper($nommod));
      return $this->db_e->where(array('idemod' => $idemod))
         ->update('t_modelos_equipos', $query);
   }
   
    public function eliminar_buscar_relacion($idemod) 
    {
        if (empty($idemod)){return FALSE;}
        $equipo = $this->db_e->where(array('idemod' => $idemod))->get('t_pcs')->row();
        if(isset($equipo)){return $equipo;}
      
    }   
   
    
    public function eliminar($idemod) 
   {
      if (empty($idemod))
         return FALSE;
      return $this->db_e->where('idemod',$idemod)
         ->delete('t_modelos_equipos');
   }    
   

}

