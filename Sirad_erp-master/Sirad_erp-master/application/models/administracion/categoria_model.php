<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoria_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_categoria',$data);

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

	function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->where('nCategoria_id',$id);
		$this->db->update('ven_categoria',$data);

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

	public function get_categorias($nCategoria_id = FALSE)
	{
		if($nCategoria_id === FALSE )
		{
			$query = $this ->db->query ('select * from ven_categoria_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_categoria', array('nCategoria_id' => $nCategoria_id));
		return $query->row_array();
	}

	public function get_categoria_activo()
	{
		$query = $this->db->get_where('ven_categoria', array('cCategoriaEst' => 1));
		return $query -> result_array();
	}
	
}