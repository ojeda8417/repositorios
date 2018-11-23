<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AbstractFactory_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert_simple($nombre_tabla,$data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert($nombre_tabla,$data);

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
	
	/*
	$this->db->query('AN SQL QUERY...');
	$this->db->query('ANOTHER QUERY...');
	$this->db->query('AND YET ANOTHER QUERY...');
	*/
	
}