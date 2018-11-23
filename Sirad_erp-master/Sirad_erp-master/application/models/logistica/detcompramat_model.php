<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detcompramat_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}
	
	public function insert_batch($data){

		$this->db->insert_batch('log_detcompra_mat',$data);
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


	public function get_DetOrdCompra($nOrdenComMat_id)
	{
		$query = $this->db->query("SELECT * FROM log_ordcommatdetalle_all  where nOrdenComMat_id =" .$nOrdenComMat_id);
		return $query->result_array();
	}

	/*public function get_OrdCompra()
	{
		$query = $this->db->query("SELECT * FROM log_ordcomdetalle_all");
		return $query->result_array();
	}*/

}