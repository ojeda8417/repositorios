<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class zonapersonal_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_zonapersonal',$data);

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

	function update($id, $data){
			
		$this->db->trans_begin();
		$this->db->where('nZonaPersonal_id',$id);	
		$this->db->update('ven_zonapersonal',$data);

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

	function drop($id, $data){
			
		$this->db->trans_begin();
		$this->db->where('nZonaPersonal_id',$id);	
		$this->db->update('ven_zonapersonal',$data);

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

	public function get_zonaspersonal($nZonaPersonal_id = FALSE)
	{
		if($nZonaPersonal_id === FALSE )
		{
			$query = $this ->db->query ('select * from ven_zonapersonal_all where nZonapersonalEst=1');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_zonapersonal', array('nZonaPersonal_id' => $nZonaPersonal_id));
		return $query->row_array();
	}
	/* condicion where nZonapersonalEst=1*/

}