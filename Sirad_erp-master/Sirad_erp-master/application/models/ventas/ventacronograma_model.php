<?php 
/**
* 
*/
class ventacronograma_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('ven_cronpago',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function update($nCronograma_id, $data)
	{
        $this->db->where('nCronograma_id',$nCronograma_id);
		$this->db->update('ven_cronpago',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function get_byCredito($nVenCredito_id)
	{
		$query = $this->db->query("SELECT * FROM ven_cronogramapago_all where nVenCredito_id=".$nVenCredito_id);
		return $query -> result_array();
	}

	public function get_byVenta($nVenta_id)
	{
		$query = $this->db->query("SELECT * FROM ven_listacronpago_by_venta where venta_id=".$nVenta_id);
		return $query -> result_array();
	}
}
 ?>