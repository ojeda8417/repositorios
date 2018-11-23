<?php 
/**
* 
*/
class ofertaproducto_model extends CI_Model
{
	
	 public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$sql = 'CALL sp_ins_ofertaproducto(?,?,?,?,?)';
	    $params =array(
		intval($data['nProducto_id']),
		intval($data['idOferta']),
		intval($data['nOfertaProducto_id']),
		intval($data['band']),
		intval($data['descuento']));
		$result = $this->db->query($sql,$params);
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function update($nOfertaProducto_id, $data)
	{
		$this->db->trans_begin();
		$this->db->where('nOfertaProducto_id',$nOfertaProducto_id);
		$this->db->update('oferta_producto',$data);

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

}

 ?>