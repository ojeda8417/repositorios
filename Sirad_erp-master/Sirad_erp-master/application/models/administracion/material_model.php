<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class material_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('material',$data);
		$id_Material=$this->db->insert_id();

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $id_Material;
		}
	}

	public function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

        $this->db->where('nMaterial_id',$id);
		$this->db->update('material',$data);

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


 	public function get_material($nMaterial_id = FALSE)
	{
		if($nMaterial_id === FALSE )
		{
			$query = $this ->db->query ('select * from adm_material_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('material', array('nMaterial_id' => $nMaterial_id));
		return $query->row_array();
	}

	public function get_material_bylocal($idLocal=FALSE)
	{
		$query = $this ->db->query ('select * from adm_material_all where nLocal_id='.$idLocal);
		return $query -> result_array();
	}


}