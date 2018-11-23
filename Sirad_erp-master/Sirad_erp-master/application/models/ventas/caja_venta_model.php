<?php 
/**
* 
*/
class caja_venta_model extends CI_Model
{
	
		function __construct()
		{
			parent::__construct();
		}

		public function insert($data)
		{
			$this->db->insert('caja_venta',$data);

			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}
			else
			{
				return true;
			}
		}

	}
?>