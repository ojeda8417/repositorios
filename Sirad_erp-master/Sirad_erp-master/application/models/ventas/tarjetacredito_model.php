<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tarjetacredito_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_tarjcredito',$data);	

		$id_linea=$this->db->insert_id();	

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $id_linea;
		}
	}

	function insert_asigcredper($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('asigtcreditopersonal',$data);	

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