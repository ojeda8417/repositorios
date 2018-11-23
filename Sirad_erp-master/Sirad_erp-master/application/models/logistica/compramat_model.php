<?php 
/**
* Modelo Ingreso de producto
*/
class compramat_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert($OrdCompra){
		$procedure="call sp_ins_compramateriales(?,?,?,?,?,?,?,?,?,?)";

		$params =array(
			$OrdCompra['nPersonal_id'],
			intval($OrdCompra['nProveedor_id']),
			$OrdCompra['nOrdComMatSubTotal'],
			$OrdCompra['nOrdComMatIGV'],
			$OrdCompra['nOrdComMatTotal'],
			$OrdCompra['cOrdComMatObsv'],
			$OrdCompra['nOrdComMatDesct'],
			$OrdCompra['cOrdComMatDocSerie'],
			$OrdCompra['cOrdComMatDocNro'],
			intval($OrdCompra['nOrdTipoDocumento'])
			);

		$result = $this->db->query($procedure,$params);
		$id = $result->row_array()["id"];
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

	public function get_fromrange($Desde,$Hasta)
	{
		$query = $this->db->query("select * from log_ordcommat_all where OrdComMatFecReg between '".$Desde."' and '".$Hasta."'");
		return $query -> result_array();
	}
	
	public function get_OrdCompraMat_views($nOrdenComMat_id = FALSE)
	{
		if($nOrdenComMat_id === FALSE )
		{
			$query = $this ->db->query ('select * from log_ordcommat_all;');
			return $query -> result_array();
		}
		$query = $this->db->query("SELECT * FROM log_ordcommat_all  where nOrdenComMat_id =" .$nOrdenComMat_id);
		return $query->row_array();
	}
	
}

?>