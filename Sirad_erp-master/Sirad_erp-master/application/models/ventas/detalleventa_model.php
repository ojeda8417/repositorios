<?php 
	/**
	* 
	*/
	class detalleventa_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function insert_batch($data)
		{
			$this->db->insert_batch('ven_detventa',$data);

			if ($this->db->trans_status() === FALSE)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		public function get_detalles($nVenta_id)
		{
			$query = $this->db->query("SELECT * FROM ven_consultadetalleventa_byventa where nVenta_id=".$nVenta_id);
			return $query -> result_array();
		}
	}
?>