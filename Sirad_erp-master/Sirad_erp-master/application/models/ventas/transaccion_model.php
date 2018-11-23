<?php 
/**
* 
*/
class transaccion_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('ven_transaccion',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function get_byVenta($nVenta_id)
	{
		$query = $this->db->get_where('ven_transaccion', array('nVenta_id' => $nVenta_id));
		return $query->row_array();
	}
}
?>