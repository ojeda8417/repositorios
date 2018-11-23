<?php 
/**
* 
*/
class ventacredito_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('ven_credito',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		}
		else
		{
			return $this->db->insert_id();
		}
	}

	public function update($nVenCredito_id, $data)
	{
        $this->db->where('nVenCredito_id',$nVenCredito_id);
		$this->db->update('ven_credito',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function get_Creditos_ByClientes($nCliente_id){
		$query = $this->db->query("SELECT * FROM ven_credito_by_idcliente  where id_cliente =" .$nCliente_id);
		return $query->result_array();
	}

	public function get_byVenta($nVenta_id)
	{
		$query = $this->db->get_where('ven_credito', array('nVenta_id' => $nVenta_id));
		return $query->row_array();
	}
}
 ?>