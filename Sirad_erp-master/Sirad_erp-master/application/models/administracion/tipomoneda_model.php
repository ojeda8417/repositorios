<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tipomoneda_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_tipomoneda',$data);

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

		$this->db->where('nTipoMoneda',$id);
		$this->db->update('ven_tipomoneda',$data);

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

		public function get_tipomoneda($nTipoMoneda = FALSE)
	{
		if($nTipoMoneda === FALSE )
		{
			$query = $this ->db->query ('select * from ven_tipomodena_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_tipomoneda', array('nTipoMoneda' => $nTipoMoneda));
		return $query->row_array();
	}
	
}