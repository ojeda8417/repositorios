<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userlocal_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert_batch($data){
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->insert_batch('users_local',$data);

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

	function clear($user_id){
		$this->db->trans_start();	
		$this->db->trans_begin();
		
		$this->db->delete('users_local', array("users_id" => $user_id));

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

	public function get_byuser($user_id)
	{
		$query = $this->db->get_where('users_local', array('users_id' => $user_id));
		return $query -> result_array();
	}
}