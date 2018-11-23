<?php 
/**
* Modelo Ingreso de producto
*/
class ordpedido_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert($OrdPedido){
		$procedure="call sp_ins_ordenpedido(?,?,?,?,?,?,?,?)";

		$params =array(
			$OrdPedido['nPersonal_id'],
			$OrdPedido['cOrdPedSerie'],
			$OrdPedido['cOrdPedNro'],
			$OrdPedido['cOrdPedEnvEmail'],
			$OrdPedido['nLocal_id'],
			$OrdPedido["dOrdPedFecReg"],
			$OrdPedido["dOrdePedFecEnt"],			
			$OrdPedido['cOrdPedObsv']
			);
		

		$result = $this->db->query($procedure,$params);
		$id = $result->row_array()["last_id"];
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $id;
		}
	}

	public function get_ordenpedido()
	{
		$query = $this->db->query("SELECT * FROM log_ordped_all");
		return $query->result_array();
	}

	public function get_OrdPedido_Views($nOrdPed_id = FALSE)
	{
		if($nOrdPed_id === FALSE )
		{
			$query = $this ->db->query ('SELECT * FROM log_ordped_all');
			return $query -> result_array();
		}
		$query = $this->db->query("SELECT * FROM log_ordped_all  where nOrdPed_id =" .$nOrdPed_id);
		return $query->row_array();
	}
	
}

?>