<?php 
/**
* 
*/
class oferta_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->trans_begin();
		$this->db->insert('oferta',$data);

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


	public function update($nOferta_id, $data)
	{
		$this->db->trans_begin();
		$this->db->where('nOferta_id',$nOferta_id);
		$this->db->update('oferta',$data);

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

	public function get_ofertas($nOferta_id = FALSE)
	{
		if($nOferta_id === FALSE )
		{
			$query = $this ->db->query ('SELECT * FROM ven_oferta_all');
			return $query -> result_array();
		}
		$query = $this->db->query('SELECT * FROM ven_oferta_all  where nOferta_id ='.$nOferta_id);
		return $query->row_array();
	}
}
 ?>