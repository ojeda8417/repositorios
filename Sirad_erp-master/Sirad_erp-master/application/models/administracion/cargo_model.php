<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cargo_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_cargo',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

        $this->db->where('nCargo_id',$id);
		$this->db->update('ven_cargo',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}


 	public function get_cargos($nCargo_id = FALSE)
	{
		if($nCargo_id === FALSE )
		{
			$query = $this ->db->query ('select * from ven_cargo_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_cargo', array('nCargo_id' => $nCargo_id));
		return $query->row_array();
	}


}