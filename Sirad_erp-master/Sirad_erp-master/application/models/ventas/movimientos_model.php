<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class movimientos_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_movimiento',$data);		

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

	public function get_fromrange($Desde,$Hasta)
	{
		$query = $this->db->query("SELECT * FROM  ven_lista_movimiento where dMovimientoFecReg between '".$Desde."' and '".$Hasta."'");
		return $query -> result_array();
	}

	
}