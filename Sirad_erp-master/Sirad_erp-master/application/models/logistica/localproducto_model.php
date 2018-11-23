<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class localproducto_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}
	
	public function insert_batch($data){

		$this->db->insert('local_producto',$data);
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

}