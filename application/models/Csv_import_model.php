<?php
class Csv_import_model extends CI_Model
{
	public function __construct()
  {
    parent::__construct();
    $this->db_a = $this->load->database('asistencias', TRUE);
  }
  
  function select()
	{
		$this->db_a->order_by('idemar', 'DESC');
		$query = $this->db_a->get('marcaciones');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('marcaciones', $data);
	}
}
