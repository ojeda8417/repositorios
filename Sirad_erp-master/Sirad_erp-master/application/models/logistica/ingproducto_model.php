<?php 
/**
* Modelo Ingreso de producto
*/
class ingproducto_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert($IngProducto){
		$procedure="call sp_ins_logingprod(?,?,?,?,?,?)";

		$params =array(
			intval($IngProducto['nPersonal_id']),
			intval($IngProducto['nLocal_id']),
			intval($IngProducto['nIngProdMotivo']),
			$IngProducto['cIngProdDocSerie'],
			$IngProducto['cIngProdDocNro'],
			$IngProducto['cIngProdObsv']
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
	public function update($IngProducto,$id){	
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->where('nIngProd_id', $id);
		$this->db->update('log_ingprod', $IngProducto); 

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $id;
		}
	}

	public function get_IngProducto($nIngProd_id = FALSE)
	{
		if($nIngProd_id === FALSE )
		{
			$query = $this ->db->query ('SELECT * FROM log_ingprod_edit');
			return $query -> result_array();
		}
		$query = $this->db->query("SELECT * FROM log_ingprod_edit  where nIngProd_id =" .$nIngProd_id);
		return $query->row_array();
	}


	public function get_fromrange($Desde,$Hasta)
	{
		$query = $this->db->query("select * from log_ingprod_all where dIngProdFecReg between '".$Desde."' and '".$Hasta."'");
		return $query -> result_array();
	}


}

?>