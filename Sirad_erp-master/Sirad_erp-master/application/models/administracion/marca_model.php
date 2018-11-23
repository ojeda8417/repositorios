<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class marca_model extends CI_Model {

	
	public function __construct() {
		parent::__construct();
	}

	public function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_marca',$data);

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

	public function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->where('nMarca_id',$id);
		$this->db->update('ven_marca',$data);

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

	public function get_marcas($nMarca_id = FALSE)
	{
		if($nMarca_id === FALSE )
		{
			$query = $this ->db->query ('select * from ven_marca_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_marca', array('nCategoria_id' => $nMarca_id));
		return $query->row_array();
	}
    
    function get_activos(){
    	$query= $this->db->get_where('ven_marca', array('cMarcaEst' =>1));
    	return $query ->result_array();

    }
	
}