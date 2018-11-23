<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tipoigv_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_tipoigv',$data);

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

		$this->db->where('nTipoIGV',$id);
		$this->db->update('ven_tipoigv',$data);

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

	function get_tipoIGV($nTipoIGV = FALSE){
		if($nTipoIGV === FALSE )
		{
			$query = $this ->db->query ('SELECT * FROM ven_tipoigv_all');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_tipoigv', array('nTipoIGV' => $nTipoIGV));
		return $query->row_array();
	}

	function get_activo(){
		$query = $this->db->get_where('ven_tipoigv', array('cTipoIGVEst' => 1));
		return $query -> result_array();
	}
	
}