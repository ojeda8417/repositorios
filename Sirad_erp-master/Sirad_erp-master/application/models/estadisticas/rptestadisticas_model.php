<?php 
/**
* Modelo Ingreso de producto
*/
class rptestadisticas_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getVentas_ByClientes($Params){

		$procedure="call sp_ventas_bycliente_reporte(?,?,?,?)";

		$result = $this->db->query($procedure,$Params);
		//$id = $result->row_array()["id"];
		$query=$result -> result_array();
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $query;
		}
	}

	public function getProductos_Cantidad($Params){

		$procedure="call sp_productos_cantidad_reporte(?,?,?);";

		$result = $this->db->query($procedure,$Params);
		//$id = $result->row_array()["id"];
		$query=$result -> result_array();
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $query;
		}
	}

	public function get_IngresosEgresos($Params){

		$procedure="call sp_ingresoegreso_reporte(?,?);";

		$result = $this->db->query($procedure,$Params);
		//$id = $result->row_array()["id"];
		$query=$result -> result_array();
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $query;
		}
	}

	public function get_ProductoCantidad_ByCliente($Params){

		$procedure="call sp_productocantidad_bycliente_reporte(?,?,?);";

		$result = $this->db->query($procedure,$Params);
		//$id = $result->row_array()["id"];
		$query=$result -> result_array();
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $query;
		}
	}

	
}

?>