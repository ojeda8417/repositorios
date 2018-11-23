<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tipo_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_tipoproducto',$data);

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

        $this->db->where('nTipoProducto_id',$id);
		$this->db->update('ven_tipoproducto',$data);

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


 	public function get_tipoproductos($nTipoProducto_id = FALSE)
	{
		if($nTipoProducto_id === FALSE )
		{
			$query = $this ->db->query ('select * from ven_tipoproductos_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_tipoproducto', array('nTipoProducto_id' => $nTipoProducto_id));
		return $query->row_array();
	}

	public function get_tipoproductos_bycategoria($nCategoria_id)
	{
		//if($nCategoria_id === FALSE )
		//{
			$query = $this ->db->query ('select * from ven_tipoproductos_all where nCategoria_id='.$nCategoria_id);
			return $query -> result_array();
		//}
		//$query = $this->db->get_where('ven_tipoproducto', array('nCategoria_id' => $nCategoria_id));
		//return $query->row_array();
	}


}